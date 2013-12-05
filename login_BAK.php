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

$tempID = "'" . $_POST['user_ID'] . "'";
$tempPW = "'" . $_POST['user_password'] . "'";

$query = "SELECT * FROM User Where Id = $tempID AND Password = $tempPW ";
$result = mysql_query($query) or die("Query failed : " . mysql_error());

if($row = mysql_fetch_assoc($result))
{
			$user = new user;
			$user->Id = $row['Id'];
			$user->Password = $row['Password'];
			$user->Session_exp = $row['Session_exp'];
			$user->FName = $row['FName'];
			$user->LName = $row['LName'];
			$_SESSION['user'] = $user;
}	

if(isset($_SESSION['user']))	
   header( 'Location:'. 'homepage.php' );

else
	header( 'Location:'. $_SERVER['HTTP_REFERER'].'?login=fail') ;
?>
