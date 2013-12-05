<?php
include('includeStuff.php');
session_start();

require_once("config.php");
$con = mysql_connect($dbhost, $dbuser, $dbpass);
if(!$con)
{
  die('could not connect: ' . mysql_error());
}

mysql_select_db($dbname, $con);

if(isset($_POST['Labor']) && isset($_POST['Engineering'])) //Update request
{
	$labor = $_POST['Labor'];
	$engineering = $_POST['Engineering'];
	$query = "UPDATE Price_per_hour SET Labor=".$labor.", Engineering=".$engineering;
	$result = mysql_query($query);
}

if(!$result)
	header('Location:'.$_SERVER['HTTP_REFERER'].'?request=fail');
else 
	header('Location: ./predefinedEdit.php?request=success');
?>
