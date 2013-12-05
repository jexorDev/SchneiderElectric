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

if(isset($_POST['AppliedFO'])) //request from insert tag page
{
	$tag = $_POST['TagNum'];
	$fo = $_POST['AppliedFO'];
	$notes = $_POST['Notes'];

	if(isset($_POST['TypeQuote']))
	{
		$query = "INSERT INTO Applied_FO VALUES(".$tag.",".$fo.",'".$notes."', 'Quote')";
		$result = mysql_query($query);
	}
	if(isset($_POST['TypeFO']))
	{
		$query = "INSERT INTO Applied_FO VALUES(".$tag.",".$fo.",'".$notes."', 'FO')";
		$result = mysql_query($query);
	}
	if(!isset($_POST['TypeFO']) && !isset($_POST['TypeQuote']))
	{
		$query = "INSERT INTO Applied_FO VALUES(".$tag.",".$fo.",'".$notes."', 'FO')";
		$result = mysql_query($query);
	}


}
else //request from edit tag page
{
	$tag = $_POST['Tag'];
	$fo = $_POST['FO'];
	$notes = $_POST['Notes'];

	if(isset($_POST['TypeQuote']))
	{
		$query = "INSERT INTO Applied_FO VALUES(".$tag.",".$fo.",'".$notes."', 'Quote')";
		$result = mysql_query($query);
	}
	if(isset($_POST['TypeFO']))
	{
		$query = "INSERT INTO Applied_FO VALUES(".$tag.",".$fo.",'".$notes."', 'FO')";
		$result = mysql_query($query);
	}
	if(!isset($_POST['TypeFO']) && !isset($_POST['TypeQuote']))
	{
		$query = "INSERT INTO Applied_FO VALUES(".$tag.",".$fo.",'".$notes."', 'FO')";
		$result = mysql_query($query);
	}
}

if(!$result)
	header('Location:'.$_SERVER['HTTP_REFERER'].'&request=fail');
else{
	header('Location:'.$_SERVER['HTTP_REFERER']);

}
?>
