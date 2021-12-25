<?php
$dbhost='localhost';
$dbname='mydb';
$dbtablename='mydb';
$dbuser='root';

mysql_connect($dbhost,$dbuser)or die(mysql_error());
mysql_select_db($dbname)or die (mysql_error());
if($_POST['name']!=NULL&&$_POST['score']!=NULL)
{
	echo 'Mydb Update';
	$name=$_POST['name'];
	$score=(int)$_POST['score'];
	$query="insert into $dbtablename(id,name,score)values (null,'$name',$score)";
	$result=mysql_query($query)or die (mysql_error());
	
}

?>