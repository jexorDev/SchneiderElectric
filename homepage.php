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
        background-image: linear-gradient(to bottom, #070707, #090909);
        background-repeat: repeat-x;
        border: 1px solid #000000;
        border-radius: 4px;
        margin-left:31%;
        margin-right:31%;
        margin-top:10%;
        padding: 10px;
       /* box-shadow: 2px 2px 5px #888888;*/

      }


      .btn-green /* Tag Search */
      {
        color:white;
        border: 1px solid #090909;
        border-radius: 4px;
        height:60px;
        width: 140px;
        background: rgb(28, 184, 65); /* this is a green */
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
      }
      .btn-blue /* Tag insert */
      {
        color:white;
        border: 1px solid #090909;
        border-radius: 4px;
        height:60px;
        width: 140px;
        background: rgb(66, 184, 221); /* this is a blue */
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
      }
      .btn-orange /* Tag view */
      {
        color:white;
        border: 1px solid #090909;
        border-radius: 4px;
        height:60px;
        width: 240px;
        background: rgb(223, 117, 20); /* this is an orange */
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
      }
      .btn-maroon /* log? */
      {
        color:white;
        border: 1px solid #090909;
        border-radius: 4px;
        height:60px;
        width: 140px;
       
        background: rgb(202, 60, 60); /* this is a maroon */
      }
      .btn-maroon2 /* maintain */
      {
        color:white;
        border: 1px solid #090909;
        border-radius: 4px;
        height:60px;
        width: 140px;
        background: rgb(202, 60, 60); /* this is a maroon */
      }
      .btn-maroon3 /* sixth criteria value? */
      {
        color:white;
        border: 1px solid #090909;
        border-radius: 4px;
        height:60px;
        width: 140px;
        background: rgb(202, 60, 60); /* this is a maroon */
      }

      .span2
      {
        margin-right:10px;
      }

    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>


    <body>
      <div class="navbar navbar-inverse" >
        <div class="navbar-inner">
        <a class="brand" href="#">Welcome, <?php echo $_SESSION['user']->FName . ' ' . $_SESSION['user']->LName ;?></a>
        
        <FORM METHOD="LINK" ACTION="./logout.php">
             <INPUT TYPE="submit" class="btn btn-danger" VALUE="End Session" style="width:140px; float:right;">
	    </FORM>
        </div>
      </div>


      <div class="content">


<?php
	if(isset($_GET['insert'])){
?>
	<div class="alert alert-success" >TAG was successfully created</div>
<?php
	}	
?>
        <div class="row">
<!-- For everyone who can log in.. -->
          <div class="span2" >
            <FORM METHOD="LINK" ACTION="./search.php">
             <INPUT TYPE="submit" class="btn-green" VALUE="Search Tag" style="width:140px;">
            </FORM>
           
          </div>

          <div class="span2" >
            <FORM METHOD="LINK" ACTION="./insert.php">
             <INPUT TYPE="submit" class="btn-blue" VALUE="Insert Tag" style="width:140px;">
            </FORM>
            
          </div>

          <div class="span2" >
            <FORM METHOD="LINK" ACTION="./view2.php">
             <INPUT TYPE="submit" class="btn-orange" VALUE="View Tag" style="width:140px;">
            </FORM>
          </div>

        </div>


        <div class="row">

<!-- For administrators.. -->
<?php

$query = "SELECT Name FROM Groups AS G
       		JOIN Group_map AS GM ON GM.Group_id=G.Id WHERE GM.User_id='".$_SESSION['user']->Id."' AND G.Name='Administrator'";
$result = mysql_query($query) or die("Query failed : " . mysql_error());
$row = mysql_fetch_assoc($result);
if($row['Name']=='Administrator'){
?>
	  <div class="span2" >
	    <form method="LINK" action="./log.php">
            <input type="submit" class="btn-maroon" value="Log" style="width:140px;">
            </form>
     </div>

          <div class="span2" >
            <form method="LINK" action="./maintenance.php">
            <input type="submit" class="btn-maroon2" value="Maintenance Page" style="width:140px;">
            </form>
          </div>

          <div class="span2" >
            <form method="LINK" action="./predefinedEdit.php">
            <input type="submit" class="btn-maroon2" value="Predefined values" style="width:140px;">
            </form>

          </div> 

        </div>
      </div> 
<?php
}
?>
    </body>

</html>
            
