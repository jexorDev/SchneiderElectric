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
        <h2>Proc tag</h2>
      <hr/>


<!--begin QA testing-->
<?php
require_once("config.php");
$con = mysql_connect($dbhost, $dbuser, $dbpass);
if(!$con)
{
  die('could not connect: ' . mysql_error());
}

mysql_select_db($dbname, $con);
$query = "INSERT INTO Tag (Number, Revision, Date, Labor_cost, Engineering_cost, Lead_time, Price_expires, Tag_notes, Tag_desc, Material_cost, Price_notes, Install_cost, Cat_id, Complexity_id, Created_by) VALUES("
	.$_POST['TNum'].","
	.$_POST['Rev#'].",'"
        .date('Y-m-j')."',"	
	.$_POST['Labor'].","
	.$_POST['Engineering'].","
	.$_POST['LeadTime'].",'"
        .date("Y-m-j", strtotime($_POST['Expires']))."','"	
	.$_POST['TagNotes']."','"
	.$_POST['TagDesc']."',"
	.$_POST['Material'].",'"
	.$_POST['PriceNotes']."',"
	.$_POST['InstallCost'].","
	.$_POST['Cat'].","
	.$_POST['Complexity'].",'"
	.$_POST['Creator']."')";

$result1 = mysql_query($query);


if($_POST['AppliedFO']!='') //also want to insert an applied FO
{
	$tag = $_POST['TNum'];
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
		$query = "INSERT INTO Applied_FO VALUES(".$tag.",".$fo.",'".$notes."', '')";
		$result = mysql_query($query);
	}

}


if(!$result1)
{
	header('Location:'.$_SERVER['HTTP_REFERER'].'&insert=fail');
}
else
{
	//May be better to put this code above if statement
	if(isset($_POST['HVL']))
	{
		$query = "INSERT INTO Price_map VALUES('USA', 'HVL',".$_POST['TNum'].",".$_POST['Rev#'].",".$_POST['HVL-USA'].")";
		$result = mysql_query($query);
		$query = "INSERT INTO Price_map VALUES('Canada', 'HVL',".$_POST['TNum'].",".$_POST['Rev#'].",".$_POST['HVL-CANADA'].")";
		$result = mysql_query($query);
		$query = "INSERT INTO Price_map VALUES('Mexico', 'HVL',".$_POST['TNum'].",".$_POST['Rev#'].",".$_POST['HVL-MEXICO'].")";
		$result = mysql_query($query);

	}
	if(isset($_POST['HVLCC']))
	{
		$query = "INSERT INTO Price_map VALUES('USA', 'HVLCC',".$_POST['TNum'].",".$_POST['Rev#'].",".$_POST['HVLCC-USA'].")";
		$result = mysql_query($query);
		$query = "INSERT INTO Price_map VALUES('Canada', 'HVLCC',".$_POST['TNum'].",".$_POST['Rev#'].",".$_POST['HVLCC-CANADA'].")";
		$result = mysql_query($query);
		$query = "INSERT INTO Price_map VALUES('Mexico', 'HVLCC',".$_POST['TNum'].",".$_POST['Rev#'].",".$_POST['HVLCC-MEXICO'].")";
		$result = mysql_query($query);

	}
	if(isset($_POST['MetalClad']))
	{
		$query = "INSERT INTO Price_map VALUES('USA', 'Metal Clad',".$_POST['TNum'].",".$_POST['Rev#'].",".$_POST['METALCLAD-USA'].")";
		$result = mysql_query($query);
		$query = "INSERT INTO Price_map VALUES('Canada', 'Metal Clad',".$_POST['TNum'].",".$_POST['Rev#'].",".$_POST['METALCLAD-CANADA'].")";
		$result = mysql_query($query);
		$query = "INSERT INTO Price_map VALUES('Mexico', 'Metal Clad',".$_POST['TNum'].",".$_POST['Rev#'].",".$_POST['METALCLAD-MEXICO'].")";
		$result = mysql_query($query);
	}
	if(isset($_POST['MVMCC']))
	{
		$query = "INSERT INTO Price_map VALUES('USA', 'MVMCC',".$_POST['TNum'].",".$_POST['Rev#'].",".$_POST['MVMCC-USA'].")";
		$result = mysql_query($query);
		$query = "INSERT INTO Price_map VALUES('Canada', 'MVMCC',".$_POST['TNum'].",".$_POST['Rev#'].",".$_POST['MVMCC-CANADA'].")";
		$result = mysql_query($query);
		$query = "INSERT INTO Price_map VALUES('Mexico', 'MVMCC',".$_POST['TNum'].",".$_POST['Rev#'].",".$_POST['MVMCC-MEXICO'].")";
		$result = mysql_query($query);
	}
	header('Location:'.'homepage.php'.'?insert=true');
}
?>



        <a href="./homepage.php" class="btn" style="float:right;">Exit</a>

      </div>

    </body>

</html>
            
