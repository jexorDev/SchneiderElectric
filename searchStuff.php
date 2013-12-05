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
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <script src="./js/jquery.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/font-awesome.min.css">

    <script type="text/javascript">
var TNum;
var RNum;

$(document).ready(function(){
  $(".list").click(function(){
    TNum = $(this).attr('TagNum');
    RNum = $(this).attr('RevNum');
    window.location = "view.php?TNum2="+TNum+"&RevNum="+RNum;
  });
}); 



    </script>

    <style type="text/css">
      html
      {
        height: 100%;
      }

      body 
      {
        height: 100%;
        background: url( "./images/low_contrast_linen.png") repeat scroll 0 0 transparent;    
      }

      a:hover i 
      {
        text-decoration: none;
      }

      .content
      {
        background-color: #FAFAFA;
        background-image: linear-gradient(to bottom, #FFFFFF, #F2F2F2);
        background-repeat: repeat-x;
        border: 1px solid #D4D4D4;
        border-radius: 4px;
        margin: 0px 0px 0px 0px;
        padding: 10px;
        box-shadow: 2px 2px 5px #888888;
      }


    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>


    <body>
      <div class="hero-unit">
        <h2>Search</h2>
      <hr/>
<?php

$tempTnum2 = $_POST['TNum2'];
$tempRevNum = $_POST['Rev#'];
$tempDate = $_POST['Date'];
$tempDesc = $_POST['Desc'];
$tempName = $_POST['SubCat'];
$tempTagNotes = $_POST['Notes'];
$tempInstallCost = $_POST['InstallCost'];
$tempPriceNotes = $_POST['PriceNote'];
$tempCreatedBy = $_POST['CreatedBy'];

echo '<table class="table table-hover">';
echo '<th>Tag</th>';
echo '<th>Rev</th>';
echo '<th>Date</th>';
echo '<th>Description</th>';
echo '<th>Sub Category</th>';
echo '<th>Notes</th>';
echo '<th>Install Cost</th>';
echo '<th>Price Note</th>';
echo '<th>Created By</th>';

$count = 0;
$query1 = "SELECT * From Tag JOIN Subcategory ON Cat_id = ID Where 
    ";

  if($tempTnum2 != '')
  {
    $query1 = $query1 . $tempTnum2 . "= Number";
    $count = 1;
  }

  if($tempRevNum != '')
  {
    if($count == 1)
      $query1 = $query1 . " AND " . $tempRevNum . "= Revision";
    else
      $query1 = $query1 . $tempRevNum . "= Revision";
    $count = 1;
  }

  if($tempDate != '')
  {
    if($count == 1)
      $query1 = $query1 . " AND STR_TO_DATE('" . $tempDate . "' ,'%m/%d/%Y') = Date";
    else
      $query1 = $query1 . "STR_TO_DATE('" . $tempDate . "' ,'%m/%d/%Y') = Date";
    $count = 1;
  }

  if($tempDesc != '')
  {
    if($count == 1)
      $query1 = $query1 . " AND '" . $tempDesc . "'= Tag_desc";
    else
      $query1 = $query1 . "'" . $tempDesc . "' = Tag_desc";
    $count = 1;
  }

  if($tempName != '')
  {
    if($count == 1)
      $query1 = $query1 . " AND '" . $tempName . "'= Name";
    else
      $query1 = $query1 . "'" . $tempName . "' = Name";
    $count = 1;
  }

  if($tempTagNotes != '')
  {
    if($count == 1)
      $query1 = $query1 . " AND '" . $tempTagNotes . "'= Tag_notes";
    else
      $query1 = $query1 . "'" . $tempTagNotes . "' = Tag_notes";
    $count = 1;
  }

  if($tempInstallCost != '')
  {
    if($count == 1)
      $query1 = $query1 . " AND " . $tempInstallCost . "= Install_cost";
    else
      $query1 = $query1 . $tempInstallCost . "= Install_cost";
    $count = 1;
  }

  if($tempPriceNotes != '')
  {
    if($count == 1)
      $query1 = $query1 . " AND '" . $tempPriceNotes . "'= Price_notes";
    else
      $query1 = $query1 . "'" . $tempPriceNotes . "' = Price_notes";
    $count = 1;
  }

  if($tempCreatedBy != '')
  {
    if($count == 1)
      $query1 = $query1 . " AND '" . $tempCreatedBy . "'= Created_by";
    else
      $query1 = $query1 . "'" . $tempCreatedBy . "' = Created_by";
    $count = 1;
  }

  if($count == 0)
    $query1 = $query1 . " 1 ";

$result1 = mysql_query($query1);
while($row = mysql_fetch_assoc($result1))
{
  echo '<tr class="list" TagNum="' . $row['Number'] . '" RevNum="' . $row['Revision'] . ' ">';
  echo '<td>', $row['Number'], '</td>';
  echo '<td>', $row['Revision'], '</td>';
  echo '<td>', $row['Date'], '</td>';
  echo '<td>', $row['Tag_desc'], '</td>';
  echo '<td>', $row['Name'], '</td>';
  echo '<td>', $row['Tag_notes'], '</td>';
  echo '<td>', $row['Install_cost'], '</td>';
  echo '<td>', $row['Price_notes'], '</td>';
  echo '<td>', $row['Created_by'], '</td>';
  echo '</tr>';
}

echo '</table>';
?>



    
    <hr/>
    <a href="./search.php" class="btn" style="float:right;">Back</a>
    </div>
  </body>

</html>