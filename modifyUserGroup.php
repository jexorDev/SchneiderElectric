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
	$userId = $_GET['userId'];
	$groupId = $_GET['groupId'];

//	echo $userId . " " . $groupId . "<br>";
	$query = "DELETE FROM Group_map WHERE User_id='".$userId."' and Group_id='".$groupId."'";
	$result = mysql_query($query);
}


else //Insert request
{
	$userId = $_POST['userId'];
	$groupName = $_POST['group'];
//	$groupid = $_POST['Id'];
	$groupId = "Select Id from Groups where Name='".$groupName."'";
	$my_result = mysql_query($groupId);
	$row = mysql_fetch_array($my_result);
//	echo $userId . " " . $groupName ." " . $row['Id'] . " " . " <h4>Something</h4>";
	$query = "INSERT INTO Group_map VALUES('".$userId."', ".$row['Id'].")";
    $result = mysql_query($query);	
}	

if(!$result)
	header('Location:'.$_SERVER['HTTP_REFERER'].'?request=fail');
else 
	header('Location: ./maintenance.php');

?>
