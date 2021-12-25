<?php
session_start();
include("db.inc.php");
 
if(!isset($_SESSION['account']) || $_SESSION['account'] == '')
{
 header('Location: login.php');
}
 
$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die('Could not connect: ' . mysqli_error($db));
$msg = '';
 
if(isset($_POST) && $_POST)
{
 $action = $_POST['action'];
 $id = quotes($_POST['id']);
 $disabled = quotes($_POST['disabled']);
 
 if($action == "delete")
 {
  $sql = "DELETE FROM `test`.`user` WHERE `id` = '$id';";
  if($result = $db->query($sql))
  {
   $msg = '已刪除編號 ' + $id + ' 的使用者資料！';
  }
 }
 else if($action == "disabled")
 {
  if($disabled != "0" && $disabled != "1")
   $disabled = "0";
 
  $sql = "UPDATE `test`.`user` SET `disabled`='$disabled' WHERE `id`='$id';";
  $result = $db->query($sql);
 }
 
}
 
$sql = "SELECT * FROM `test`.`user`";
$result = $db->query($sql);
 
?>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
  function btn_delete(id)
  {
   if(!confirm('確定要刪除編號' + id + '的使用者資料？'))
    return;
   $("#form1_action").val("delete");
   $("#form1_id").val(id);
   $("#form1").submit();
  }
 
  function btn_disabled(id, disabled)
  {
   $("#form1_action").val("disabled");
   $("#form1_id").val(id);
   $("#form1_disabled").val(disabled);
   $("#form1").submit();
  }
 </script>
</head>
<body>
 <table style="width: 100%;">
  <tr>
   <th colspan="11">會員帳號資訊</th>
  </tr>
  <tr>
   <td></td>
   <td colspan="2">帳號管理</td>
   <td>啟用狀態</td>
   <td>帳號</td>
   <td>姓名</td>
   <td>性別</td>
   <td>年齡</td>
   <td>身高</td>
   <td>體重</td>
   <td>E-mail</td>
  </tr>
<?PHP
while($row=$result->fetch_array(MYSQLI_ASSOC))
{
?>
  <tr>
   <td><?PHP echo $row["id"];?></td>
   <td><input type="button" value="<?PHP echo ($row["disabled"] == "0" ? "禁用" : "啟用"); ?>" onclick="btn_disabled(<?PHP echo "'$row[id]','".($row["disabled"]=="0"?"1":"0")."'";?>);"/></td>
   <td><input type="button" value="刪除" onclick="btn_delete('<?PHP echo "$row[id]";?>')" /></td>
   <td><?PHP echo ($row["disabled"] == "0" ? "啟用中" : "禁用中"); ?></td>
   <td><?PHP echo $row["account"]; ?></td>
   <td><?PHP echo $row["name"]; ?></td>
   <td><?PHP echo ($row["sexid"] == "0" ? "男" : "女"); ?></td>
   <td><?PHP echo $row["age"]; ?></td>
   <td><?PHP echo $row["height"]; ?></td>
   <td><?PHP echo $row["weight"]; ?></td>
   <td><?PHP echo $row["email"]; ?></td>
  </tr>
<?PHP
}
$result->close();
 
$sql = "SELECT `sexid`, COUNT(*) AS CNT FROM `test`.`user` GROUP BY `sexid`;";
$result = $db->query($sql)
?>
 </table>
 <hr />
 <table style="width: 100%;">
  <tr>
   <th colspan="2">性別統計</th>
  </tr>
<?PHP
$sexid_rows=array();
while($row=$result->fetch_array(MYSQLI_ASSOC))
{
 $sexid_rows[]=$row;
?>
  <tr>
   <td><?PHP echo ($row["sexid"] == "0" ? "男" : "女");?></td>
   <td><?PHP echo $row["CNT"];?></td>
  </tr>
<?PHP
}
$result -> close();
?>
  <tr>
   <td colspan="2">
    <div id="sexid_piechart" style="width: 900px; height: 500px;"></div>
   </td>
  </tr>
 </table>
 <hr />
 <table style="width: 100%;">
  <tr>
   <th colspan="2">年齡統計</th>
  </tr>
<?PHP
$sql  = "
SELECT
 age_range, COUNT(*) AS CNT
FROM
 (
  SELECT
   CASE
    WHEN age <= 10 THEN '1~10歲'
    WHEN age BETWEEN 11 AND 20 THEN '11~20歲'
    WHEN age BETWEEN 21 AND 30 THEN '21~30歲'
    WHEN age BETWEEN 31 AND 40 THEN '31~40歲'
    WHEN age BETWEEN 41 AND 50 THEN '41~50歲'
    WHEN age > 50 THEN '50歲以上'
   END AS age_range
  FROM
   `test`.`user`
 ) AS tmp
GROUP BY age_range
";
$age_rows=array();
$result = $db->query($sql);
while($row=$result->fetch_array(MYSQLI_ASSOC))
{
 $age_rows[]=$row;
?>
  <tr>
   <td><?PHP echo $row["age_range"];?></td>
   <td><?PHP echo $row["CNT"];?></td>
  </tr>
<?PHP
}
?>
  <tr>
   <td colspan="2">
    <div id="agerange_piechart" style="width: 900px; height: 500px;"></div>
   </td>
  </tr>
 </table>
 
<script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart()
 {
  var data = google.visualization.arrayToDataTable([
    ['性別', '人數']
<?PHP
for($i=0; $i<count($sexid_rows); $i++)
{
 echo "    ,['".($sexid_rows[$i]["sexid"] == "0" ? "男性" : "女性")."',".$sexid_rows[$i]["CNT"]."]\n";
}
?>
   ]);
  var options = {
   title: "性別統計"
  };
 
  var chart = new google.visualization.PieChart(document.getElementById('sexid_piechart'));
  chart.draw(data, options);
 
  data = google.visualization.arrayToDataTable([
    ['年齡', '人數']
<?PHP
for($i=0; $i<count($age_rows); $i++)
{
 echo "    ,['".$age_rows[$i]["age_range"]."',".$age_rows[$i]["CNT"]."]\n";
}
?>
   ]);
  options = {
   title: "年齡統計"
  };
  chart = new google.visualization.PieChart(document.getElementById('agerange_piechart'));
  chart.draw(data, options);
 }
</script>
<form action="list.php" method="POST" id="form1">
 <input type="hidden" name="action" id="form1_action" value="" />
 <input type="hidden" name="id" id="form1_id" value="" />
 <input type="hidden" name="disabled" id="form1_disabled" value="" />
</form>
</body>
</html>
<?PHP
$db->close();
?>