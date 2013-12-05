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

if(isset($_POST['USA']) && isset($_POST['Canada']) && isset($_POST['Mexico'])) //Update request
{
	$usa = $_POST['USA'];
	$canada = $_POST['Canada'];
	$mexico = $_POST['Mexico'];

	$query = "UPDATE Country SET Multiplier=".$usa." WHERE Name='USA'";
	$result = mysql_query($query);
	$query = "UPDATE Country SET Multiplier=".$canada." WHERE Name='Canada'";
	$result = mysql_query($query);
	$query = "UPDATE Country SET Multiplier=".$mexico." WHERE Name='Mexico'";
	$result = mysql_query($query);

}

if(!$result)
	header('Location:'.$_SERVER['HTTP_REFERER'].'?request=fail');
else 
	header('Location: ./predefinedEdit.php?request=success');
?>
