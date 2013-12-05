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

if(isset($_GET['request']))//Delete request
{
	$id = $_GET['id'];
	$query = "DELETE FROM Groups WHERE Id='".$id."'";
	$result = mysql_query($query);
}
else
{
	$query = "INSERT INTO Groups (Name) VALUES('" . $_POST['groupName'] . "')";

	//echo $_POST['groupID'] . " " . $_POST['groupName'] . "<br>";

	$result = mysql_query($query);	
}

if(!result)
	header('Location:'.$_SERVER['HTTP_REFERER'].'?request=fail');
else
	header('Location: ./maintenance.php');

?>
