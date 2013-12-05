<!DOCTYPE html>
<html lang="en">

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
	$(function(){
		$("#Material, #Labor, #Engineering").change(function(){
			var total = parseFloat($("#Material").val()) + parseFloat($("#Labor").val()) + parseFloat($("#Engineering").val());
			$("#Install").val(total);
	/*	$("#HVL").change(function(){
			if($("#HVL").is(":checked")){
                        <?php

                        ?>
	}*/


	        	var USA_mult = <?php 
					$query = "SELECT Multiplier FROM Country WHERE Name='USA'";
		                        $result = mysql_query($query) or die("Query failed : " . mysql_error());
					$row = mysql_fetch_assoc($result);
					echo $row['Multiplier'];
					?>;
			var Mexico_mult = <?php
					$query = "SELECT Multiplier FROM Country WHERE Name='Mexico'";
		                        $result = mysql_query($query) or die("Query failed : " . mysql_error());
					$row = mysql_fetch_assoc($result);
					echo $row['Multiplier'];
					?>;
			var Canada_mult = <?php
					$query = "SELECT Multiplier FROM Country WHERE Name='Canada'";
		                        $result = mysql_query($query) or die("Query failed : " . mysql_error());
					$row = mysql_fetch_assoc($result);
					echo $row['Multiplier'];
					?>;	
			var HVL_mult = <?php
					$query = "SELECT Multiplier FROM Product_type WHERE Name='HVL'";	
					$result = mysql_query($query);
					$row = mysql_fetch_assoc($result);
					echo $row['Multiplier'];
					?>;
			var HVLCC_mult = <?php
					$query = "SELECT Multiplier FROM Product_type WHERE Name='HVL/CC'";	
					$result = mysql_query($query);
					$row = mysql_fetch_assoc($result);
					echo $row['Multiplier'];
	                                ?>;
			var MetalClad_mult = <?php
					$query = "SELECT Multiplier FROM Product_type WHERE Name='Metal Clad'";	
					$result = mysql_query($query);
					$row = mysql_fetch_assoc($result);
					echo $row['Multiplier'];
	                                ?>;
			var MVMCC_mult = <?php
					$query = "SELECT Multiplier FROM Product_type WHERE Name='MVMCC'";	
					$result = mysql_query($query);
					$row = mysql_fetch_assoc($result);
					echo $row['Multiplier'];
?>;
/*
			USA_mult = ParseFloat(USA_mult);
			Mexico_mult = ParseFloat(Mexico_mult);
			Canada_mult = ParseFloat(Canada_mult);
			HVL_mult = ParseFloat(HVL_mult);
			HVLCC_mult = ParseFloat(HVLCC_mult);
			MetalClad_mult = ParseFloat(MetalClad_mult);
			MVMCC_mult = ParseFloat(MVMCC_mult);
 */
			

                        var install = parseFloat($("#Install").val()).toFixed(2);
			$("#HVL-USA").val(USA_mult*HVL_mult*install);
			$("#HVL-CANADA").val(Canada_mult*HVL_mult*install);
			$("#HVL-MEXICO").val(Mexico_mult*HVL_mult*install);

			$("#HVLCC-USA").val(USA_mult*HVLCC_mult*install);
			$("#HVLCC-CANADA").val(Canada_mult*HVLCC_mult*install);
			$("#HVLCC-MEXICO").val(Mexico_mult*HVLCC_mult*install);

			$("#METALCLAD-USA").val(USA_mult*MetalClad_mult*install);
			$("#METALCLAD-CANADA").val(Canada_mult*MetalClad_mult*install);
			$("#METALCLAD-MEXICO").val(Mexico_mult*MetalClad_mult*install);
			
           		$("#MVMCC-USA").val(USA_mult*MVMCC_mult*install);
           		$("#MVMCC-CANADA").val(Canada_mult*MVMCC_mult*install);
           		$("#MVMCC-MEXICO").val(Mexico_mult*MVMCC_mult*install);

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
	<h2>Insert New TAG</h2>
<?php
	if(isset($_GET['insert'])){
?>
	<div class="alert alert-error" >An error occured creating the new TAG <br/>
	<span class="label label-important">NOTICE</span>
		Tag Number, labor cost, engineering cost, material cost, and lead time are all required fields </div>
	<!--<button onclick="history.go(-1);" class="btn btn-primary">Back</button>-->

<?php
	}
	$query = "SELECT MAX(Number) as Tag FROM Tag";
	$result = mysql_query($query);
	$nextTag = mysql_fetch_assoc($result);
	$nextTag = $nextTag['Tag']+1;
?>
      <hr/>

        <div class="row">
	  <form class="form-inline" style="margin-left:20px;" action="processTag.php" method="post" >
		<div class="row form-inline" style="margin-left:20px;">
              <label style="margin-left:0px;" >Tag Number</label>
              <label style="margin-left:10px;">Rev #</label>
              <label style="margin-left:25px;">Date</label>
	      <label style="margin-left:40px;">Subcategory</label>
              <label style="margin-left:10px;">Complexity</label>
	      <label style="margin-left:5px;">Lead Time</label>
		</div>
          <div class="span10">
            <!-- add a value="" attribute for text in field -->
	    <input type="text" placeholder="" style="width:60px;" name="TNum" value="<?php echo $nextTag; ?>" readonly>
              <input type="text" placeholder="" style="width:45px;" name="Rev#" value="0" readonly="readonly">             
	      <input type="text" placeholder="" style="width:60px;" name="Date" value="<?php print_r(date("m/j/y")); ?>" readonly="readonly">
                <select style="width:120px;" name="Cat">
		      <?php
			$query = "SELECT * FROM Subcategory";
			$result = mysql_query($query) or die("Query failed : " . mysql_error());

			while($row = mysql_fetch_assoc($result))
			{
			  echo '<option value="' . $row['Id'] . '">' . $row['Name'] . '</option>';
			}	
		       ?>
                </select>
	      <select style="width:50px;" name="Complexity">
		<?php
		  $query = "SELECT * FROM Complexity";
		  $result = mysql_query($query) or die("Query failed : " . mysql_error());
	          
	          while($row = mysql_fetch_assoc($result))
		  {
                    echo '<option value="' . $row['Id'] . '">' . $row['Name'] . '</option>';
		  }	  
		?>
              </select> 
              <input type="text" placeholder="" style="width:60px;" name="LeadTime">
            
              <br>
              <label style="margin-left:10px;">TAG Description:</label><br>
              <textarea style="width:535px;" name="TagDesc" rows="1"></textarea>

              <br>
              <label style="margin-left:10px;">TAG Notes:</label><br>
              <textarea style="width:535px;" name="TagNotes" rows="1"></textarea>

              <br>
              <label style="margin-left:10px;">Price Notes:</label><br>
              <textarea style="width:535px;" name="PriceNotes" rows="1"></textarea>
              <br>

               
               <label class="checkbox" style="margin-left:10px;">
                <input type="checkbox"> Click Box to Make TAG Permanantly Obsolete
                </label>
                <br>
	        <label class="label" style="margin-left:10px;">Product Lines Tag May Be Applied To:</label>
		<br>
                <label style="margin-left:125px;">USA$</label>
                <label style="margin-left:75px;">Canada$</label>
                <label style="margin-left:50px;">Mexico$</label>

                <br>
                <label class="checkbox">
                <input type="checkbox" name="HVL" id="HVL"> HVL
		</label>

        	<input type="text" id="HVL-USA" name="HVL-USA" placeholder=""  style="width:100px; margin-left:41px;">
                <input type="text" id="HVL-CANADA"  name="HVL-CANADA" placeholder="" style="width:100px;">
                <input type="text" id="HVL-MEXICO" name="HVL-MEXICO" placeholder="" style="width:100px;">

                <br>
                <label class="checkbox">
                <input type="checkbox" name="HVL" id="HVLCC"> HVL/CC
                </label>

                <input type="text" id="HVLCC-USA" name="HVLCC-USA" placeholder="" style="width:100px;  margin-left:17px;">
                <input type="text" id="HVLCC-CANADA" name="HVLCC-CANADA" placeholder="" style="width:100px;">
                <input type="text" id="HVLCC-MEXICO" name="HVLCC-MEXICO" placeholder="" style="width:100px;">

                <br>
                <label class="checkbox">
                <input type="checkbox" id="MetalClad" name="MetalClad"> Metal Clad
                </label>

                <input type="text" id="METALCLAD-USA" name="METALCLAD-USA" placeholder="" style="width:100px;">
                <input type="text" id="METALCLAD-CANADA" name="METALCLAD-CANADA" placeholder="" style="width:100px;">
                <input type="text" id="METALCLAD-MEXICO" name="METALCLAD-MEXICO" placeholder="" style="width:100px;">

                <br>
                <label class="checkbox">
                <input type="checkbox" id="MVMCC" name="MVMCC"> MVMCC
                </label>

                <input type="text" id="MVMCC-USA" name="MVMCC-USA" placeholder="" style="width:100px; margin-left:16px;">
                <input type="text" id="MVMCC-CANADA" name="MVMCC-CANADA" placeholder="" style="width:100px;">
                <input type="text" id="MVMCC-MEXICO" name="MVMCC-MEXICO" placeholder="" style="width:100px;">

            

          </div>

          <div class="span4">
            <span class="label" style="margin-left:10px;">Pricing Information:</span><br>

	    <label style="margin-left:10px;">Material:</label>
	    <div class="input-prepend" style="float:right;">
              <span class="add-on" style="float:left;">$</span> 
              <input type="text" id="Material" placeholder="" style="width:100px; float:right;" name="Material" value="0" > 
	    </div> <br/>

            <label style="margin-left:10px;">Labor:</label> 
	    <div class="input-prepend" style="float:right;">
              <span class="add-on" style="float:left;">$</span>
	      <input type="text" id="Labor" placeholder="" style="width:100px;" name="Labor" value="0"> 
	    </div> <br/>
             
	    <label style="margin-left:10px;">Engineering:</label>
            <div class="input-prepend" style="float:right;">
              <span class="add-on" style="float:left;">$</span>
	      <input type="text" id="Engineering" placeholder="" style="width:100px;" name="Engineering" value="0">
            </div>
            <hr style="color:black;">
	    <label style="margin-left:10px;">Install Cost:</label>
            <div class="input-prepend" style="float:right;">
              <span class="add-on" style="float:left;">$</span>
	      <input type="text" id="Install" placeholder="" style="width:100px; float:right;" name="InstallCost" readonly> <br>
            </div>

            <br><br><br>
          
	    <input type="text" placeholder="" name="Creator" style="width:120px; float:right;"
			 value="<?php echo $_SESSION['user']->FName.' '.$_SESSION['user']->LName; ?>" readonly>
            <label style="margin-left:10px; float:left;">TAG Member:</label> <br>    
	    <input type="text" placeholder="" style="width:120px; float:right;" name="Expires" value="<?php print_r(date('m/j/y', strtotime("+3 months"))) ?>"> 
	    <label style="margin-left:10px; float:left;">Price Expires:</label><br><br><br>
		
	


            <button href class="btn btn-inverse" style="width:162px;" type="submit" name="revise">Insert TAG</button><br>
            <button href class="btn btn-info" style="width:162px;">Go To Datasheet</button><br>
	   

	  </div>
	
	</div>
	<br>
	<div class="label" style="margin-left:25px;">Applied FO:</div>
	<div class="row form-inline" style="margin-left:10px;">
		<label>Tag Number </label>
		<label>FO Number </label>
		<label style="margin-left:20px;">Notes to Next Engineer </label>	 <br>
		<input type="text" style="width:60px;" name="TagNum" value="<?php echo $nextTag; ?>" readonly>
		<input type="text" style="width:80px;" name="AppliedFO">
		<textarea name="Notes" rows="1"></textarea><br>
		<label class="checkbox">
		<input type="checkbox" name="TypeQuote">Quote
		</label>
		<label class="checkbox" style="margin-left:30px;">
		<input type="checkbox" name="TypeFO">Factory order
		</label>
	</div>
	</form>
<!--
	<div class="row">
	<form class="form-inline" action="insertFO.php" method="post">
		<label>Tag Number: </label>
		<input type="text" style="width:60px;" name="TagNum">
		<label>FO Number Applied To: </label>
		<input type="text" style="width:80px;" name="AppliedFO">
		<label>Notes to Next Engineer: </label>	
		<input type="text" name="Notes">
		<button type="submit" class="btn btn-success"><i class="icon-plus"></i></button>
	</form>
	</div>

-->
	<br>
	 <!-- <button href class="btn btn-warning" style="width:162px;" id="attachment">Upload Attachment</button> 
		<div id="upload_attachment" >
		<form action="upload_file.php" method="post" enctype="multipart/form-data" class="form-inline">
		<label for="file">File:</label>
		<input type="file" name="file" id="file"><br>
		<input type="hidden" name="Tag" value="<?php //echo $nextTag; ?>">
		<input type="submit" name="submit" value="Submit">
		</form>
		</div> -->
      <a href="./homepage.php" class="btn" style="float:right;">Exit</a>

      </div>
    </body>

</html>
            
