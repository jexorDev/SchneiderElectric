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
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
else
  {
  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];

move_uploaded_file($_FILES["file"]["tmp_name"],
"upload/" . $_FILES["file"]["name"]);
echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
  }
	$tag = $_POST['Tag'];

	$query = "INSERT INTO Attachment (Tag_num, Path) VALUES(".$tag.",'upload/".$_FILES['file']['name']."')";
	$result = mysql_query($query);
	if(!$result)
	{
		header('Location:'.$_SERVER['HTTP_REFERER'].'?attach=fail');
	}
	else
		header('Location:'.$_SERVER['HTTP_REFERER']);
?>

    </body>

</html>
            

