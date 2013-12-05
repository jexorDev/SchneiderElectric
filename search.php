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
        
        <!-- Labels for fields below -->
      <form class="form-inline" style="margin-left:0px;">
          <label>Tag Number</label>
          <label style="margin-left:35px;">Rev #</label>
          <label style="margin-left:25px;">Date</label>
          <label style="margin-left:40px;">Description</label>
          <label style="margin-left:60px;">Sub - Category</label>
          <label style="margin-left:40px;">HVL</label>
          <label style="margin-left:5px;">HVL/CC</label>
          <label style="margin-left:15px;">M.C.</label>
          <label style="margin-left:15px;">MVMCC</label>
          <label style="margin-left:5px;">Notes</label>
          <label style="margin-left:80px;">Install Cost</label>
          <label style="margin-left:5px;">Price Note</label>
          <label style="margin-left:5px;">Created By:</label>
         
      </form>

      <form action="searchStuff.php" method="post" class="form-inline">
            <!-- add a value="" attribute for text in field -->
          <input type="text" placeholder="" style="width:15px;"   name="TNum"         >
          <input type="text" placeholder="" style="width:60px;"   name="TNum2"        >             
          <input type="text" placeholder="" style="width:45px;"   name="Rev#"         >             
          <input type="text" placeholder="" style="width:60px;"   name="Date"         >  
          <input type="text" placeholder="" style="width:120px;"  name="Desc"         >            
          <input type="text" placeholder="" style="width:120px;"  name="SubCat"       >  
          <input type="text" placeholder="" style="width:35px;"   name="HVL"          >
          <input type="text" placeholder="" style="width:35px;"   name="HVL/CC"       >
          <input type="text" placeholder="" style="width:35px;"   name="MetalClad"    >
          <input type="text" placeholder="" style="width:35px;"   name="MVMCC"        >  
          <input type="text" placeholder="" style="width:120px;"  name="Notes"        >  
          <input type="text" placeholder="" style="width:60px;"   name="InstallCost"  >  
          <input type="text" placeholder="" style="width:60px;"   name="PriceNote"    >
          <input type="text" placeholder="" style="width:60px;"   name="CreatedBy"    >      
          

          <button class="btn-primary" style="float:right;">Search</button>
      </form>



      <hr/>
      <a href="./homepage.php" class="btn" style="float:right;">Exit</a>
      </div>

    </body>

</html>
            
