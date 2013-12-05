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

if(isset($_GET['request'])) //Delete request
{
	$id = $_GET['id'];

	$query = "DELETE FROM Product_type WHERE Id='".$id."'";
	$result = mysql_query($query);
}
else if(isset($_POST['NewName'])) //Update request
{
	$name = $_POST['NewName'];
	$mult = $_POST['NewMultiplier'];
	$id = $_POST['Id'];
	$query = "UPDATE Product_type SET Name='".$name."', Multiplier=".$mult." WHERE Id=".$id;
	$result = mysql_query($query);
}
else //Insert request
{
	$name = $_POST['Name'];
	$mult = $_POST['Multiplier'];	
	$query = "INSERT INTO Product_type (Name, Multiplier) VALUES('".$name."',".$mult.")";
        $result = mysql_query($query);	
}	

if(!$result)
	header('Location:'.$_SERVER['HTTP_REFERER'].'?request=fail');
else 
	header('Location: ./predefinedEdit.php');
?>
