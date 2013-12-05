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



    $(document).ready(function(){
      var total = parseFloat($("#Material").val()) + parseFloat($("#Labor").val()) + parseFloat($("#Engineering").val());
      $("#Install").val(total);
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
   $(function(){
    $("#Material, #Labor, #Engineering").change(function(){
      total = parseFloat($("#Material").val()) + parseFloat($("#Labor").val()) + parseFloat($("#Engineering").val());
      $("#Install").val(total);
  /*  $("#HVL").change(function(){
      if($("#HVL").is(":checked")){
                        <?php

                        ?>
  }*/


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
  <h2>Edit TAG</h2>
<?php
  if(isset($_GET['insert'])){
?>
  <div class="alert alert-error" >An error occured editing the TAG <br/>
  <span class="label label-important">NOTICE</span>
    Tag Number, labor cost, engineering cost, material cost, and lead time are all required fields </div>
  <!--<button onclick="history.go(-1);" class="btn btn-primary">Back</button>-->

<?php
  }
      $tempTnum2 = $_GET['TagNum'];
      $tempRevNum = $_GET['RevNum'];

      $query = "SELECT * From Tag JOIN Subcategory ON Cat_id = ID 
      Where  $tempTnum2 = Number AND $tempRevNum = Revision";

      $result = mysql_query($query) or die("Query failed : " . mysql_error());

      if($row = mysql_fetch_assoc($result))
      {
      echo '<hr/>';

        echo '<div class="row">';
          echo '<form class="form-inline" style="margin-left:20px;" action="processTag.php" method="post" >';
              echo '<label style="margin-left:0px;" >Tag Number</label>';
              echo '<label style="margin-left:10px;">Rev #</label>';
              echo '<label style="margin-left:25px;">Date</label>';
        echo '<label style="margin-left:40px;">Subcategory</label>';
              echo '<label style="margin-left:10px;">Complexity</label>';
        echo '<label style="margin-left:5px;">Lead Time</label>';

          echo '<div class="span10">';
              echo '<input type="text" placeholder="" style="width:60px;" name="TNum" readonly value="'. $row['Number']  .' ">';
              $temp = $row['Revision']+1;
              echo '<input type="text" placeholder="" style="width:45px;" name="Rev#" readonly value="'. $temp  .' "> ';            
        echo '<input type="text" placeholder="" style="width:60px;" name="Date" value="', print_r(date("m/j/y")), '" readonly="readonly">';
                echo '<select style="width:120px;" name="Cat" value="'. $row['Name']  .' ">';
          
      $query1 = "SELECT * FROM Subcategory";
      $result1 = mysql_query($query1) or die("Query failed : " . mysql_error());

      while($row1 = mysql_fetch_assoc($result1))
      {
        echo '<option value="' . $row1['Id'] . '">' . $row1['Name'] . '</option>';
      } 
           
                echo '</select>';
        echo '<select style="width:50px;" name="Complexity">';
 
      $query2 = "SELECT * FROM Complexity";
      $result2 = mysql_query($query2) or die("Query failed : " . mysql_error());
            
            while($row2 = mysql_fetch_assoc($result2))
      {
                    echo '<option value="' . $row2['Id'] . '">' . $row2['Name'] . '</option>';
      }   
    
              echo '</select> ';
              echo '<input type="text" placeholder="" style="width:60px;" name="LeadTime" value="'. $row['Lead_time']  .' ">';
            
              echo '<br>';
              echo '<label style="margin-left:10px;">TAG Description:</label><br>';
              echo '<textarea style="width:535px;" name="TagDesc" rows="1">'. $row['Tag_desc']  .'</textarea>';

              echo '<br>';
              echo '<label style="margin-left:10px;">TAG Notes:</label><br>';
              echo '<textarea style="width:535px;" name="TagNotes" rows="1">'. $row['Tag_notes']  .'</textarea>';

              echo '<br>';
              echo '<label style="margin-left:10px;">Price Notes:</label><br>';
              echo '<textarea style="width:535px;" name="PriceNotes" rows="1">'. $row['Price_notes']  .'</textarea>';
              echo '<br>';

	      $HVL = '';
	      $HVLCC = '';
	      $METALCLAD = '';
	      $MVMCC = '';

	      $query = "SELECT Product_name FROM Price_map WHERE Tag_num=".$row['Number']." AND Product_name='HVL' AND Rev_num=".$row['Revision'];
	      $result = mysql_query($query);
	      $x = mysql_fetch_assoc($result);
	      if($x['Product_name']=='HVL') $HVL = 'checked="checked"';

	      $query = "SELECT Product_name FROM Price_map WHERE Tag_num=".$row['Number']." AND Product_name='HVL/CC' AND Rev_num=".$row['Revision'];
	      $result = mysql_query($query);
	      if($result) $HVLCC = 'checked="checked"' ;

	      $query = "SELECT Product_name FROM Price_map WHERE Tag_num=".$row['Number']." AND Product_name='Metal Clad' AND Rev_num=".$row['Revision'];
	      $result = mysql_query($query);
	      if($result) $METALCLAD = 'checked="checked"';

	      $query = "SELECT Product_name FROM Price_map WHERE Tag_num=".$row['Number']." AND Product_name='MVMCC' AND Rev_num=".$row['Revision'];
	      $result = mysql_query($query);
	      if($result) $MVMCC = 'checked="checked"';
	      
               echo '<label class="checkbox" style="margin-left:10px;">';
                echo '<input type="checkbox"> Click Box to Make TAG Permanantly Obsolete';
                echo '</label>';
                echo '<br>';
          echo '<label class="label" style="margin-left:10px;">Product Lines Tag May Be Applied To:</label>';
    echo '<br>';
                echo '<label style="margin-left:125px;">USA$</label>';
                echo '<label style="margin-left:75px;">Canada$</label>';
                echo '<label style="margin-left:50px;">Mexico$</label>';

                echo '<br>';
                echo '<label class="checkbox">';
                echo '<input type="checkbox" name="HVL" id="HVL"'.$HVL.'> HVL';
    echo '</label>';

          echo '<input type="text" id="HVL-USA" name="HVL-USA" placeholder=""  style="width:100px; margin-left:41px;">';
                echo '<input type="text" id="HVL-CANADA"  name="HVL-CANADA" placeholder="" style="width:100px;">';
                echo '<input type="text" id="HVL-MEXICO" name="HVL-MEXICO" placeholder="" style="width:100px;">';

                echo '<br>';
                echo '<label class="checkbox">';
                echo '<input type="checkbox" name="HVL" id="HVLCC" '.$HVLCC.'> HVL/CC';
                echo '</label>';

                echo '<input type="text" id="HVLCC-USA" name="HVLCC-USA" placeholder="" style="width:100px;  margin-left:17px;">';
                echo '<input type="text" id="HVLCC-CANADA" name="HVLCC-CANADA" placeholder="" style="width:100px;">';
                echo '<input type="text" id="HVLCC-MEXICO" name="HVLCC-MEXICO" placeholder="" style="width:100px;">';

                echo '<br>';
                echo '<label class="checkbox">';
                echo '<input type="checkbox" id="MetalClad" name="MetalClad" '.$METALCLAD.'> Metal Clad';
                echo '</label>';

                echo '<input type="text" id="METALCLAD-USA" name="METALCLAD-USA" placeholder="" style="width:100px;">';
                echo '<input type="text" id="METALCLAD-CANADA" name="METALCLAD-CANADA" placeholder="" style="width:100px;">';
                echo '<input type="text" id="METALCLAD-MEXICO" name="METALCLAD-MEXICO" placeholder="" style="width:100px;">';

                echo '<br>';
                echo '<label class="checkbox">';
                echo '<input type="checkbox" id="MVMCC" name="MVMCC"'.$MVMCC.'> MVMCC';
                echo '</label>';

                echo '<input type="text" id="MVMCC-USA" name="MVMCC-USA" placeholder="" style="width:100px; margin-left:16px;">';
                echo '<input type="text" id="MVMCC-CANADA" name="MVMCC-CANADA" placeholder="" style="width:100px;">';
                echo '<input type="text" id="MVMCC-MEXICO" name="MVMCC-MEXICO" placeholder="" style="width:100px;">';

            

          echo '</div>';
          




          echo '<div class="span4">';
            echo '<span class="label" style="margin-left:10px;">Pricing Information:</span><br>';

      echo '<label style="margin-left:10px;">Material:</label>';
      echo '<div class="input-prepend" style="float:right;">';
             echo '<span class="add-on" style="float:left;">$</span>'; 
              echo '<input type="text" id="Material" placeholder="" style="width:100px; float:right;" name="Material" value="'. $row['Material_cost']  .'" > ';
      echo '</div> <br/>';

            echo '<label style="margin-left:10px;">Labor:</label> ';
      echo '<div class="input-prepend" style="float:right;">';
              echo '<span class="add-on" style="float:left;">$</span>';
        echo '<input type="text" id="Labor" placeholder="" style="width:100px;" name="Labor" value="'. $row['Labor_cost']  .'"> ';
      echo '</div> <br/>';
             
      echo '<label style="margin-left:10px;">Engineering:</label>';
            echo '<div class="input-prepend" style="float:right;">';
              echo '<span class="add-on" style="float:left;">$</span>';
        echo '<input type="text" id="Engineering" placeholder="" style="width:100px;" name="Engineering" value="'. $row['Engineering_cost']  .'">';
            echo '</div>';
            echo '<hr style="color:black;">';
      echo '<label style="margin-left:10px;">Install Cost:</label>';
            echo '<div class="input-prepend" style="float:right;">';
              echo '<span class="add-on" style="float:left;">$</span>';
        echo '<input type="text" id="Install" placeholder="" style="width:100px; float:right;" name="InstallCost" readonly value="'. $row['Install_cost']  .'"> <br>';
            echo '</div>';

            echo '<br><br><br>';
       }?>   
      <input type="text" placeholder="" name="Creator" style="width:120px; float:right;" value="<?php echo $_SESSION['user']->FName.' '.$_SESSION['user']->LName; ?>" readonly>
            <label style="margin-left:10px; float:left;">TAG Member:</label> <br>    
      <input type="text" placeholder="" style="width:120px; float:right;" name="Expires" value="<?php print_r(date('m/j/y', strtotime("+3 months"))) ?>"> 
      <label style="margin-left:10px; float:left;">Price Expires:</label><br><br><br>

            <button href class="btn btn-inverse" style="width:162px;" type="submit" name="revise">Save</button><br>
            <button href class="btn btn-info" style="width:162px;">Add Attachment</button><br>
	  </form>
	  <button href class="btn btn-warning" style="width:162px;" id="attachment">Upload Attachment</button> 
		<div id="upload_attachment" >
		<form action="upload_file.php" method="post" enctype="multipart/form-data" class="form-inline">
		<label for="file">File:</label>
		<input type="file" name="file" id="file"><br>
		<input type="hidden" name="Tag" value="<?php echo $row['Number']; ?>">
		<input type="submit" name="submit" value="Submit">
		</form>
		</div>
    </div>
	<br>
	<div class="row" style="margin-left:30px; margin-top:10px; float:left;">
	<div class="label" style="margin-left:25px;">Applied FO:</div><br>
	<table class=" table table-condensed">
	<tr><th>Tag Number</th><th>Applied FO Number</th><th>Notes to next engineer</th><th>Type</th></tr>
<?php
	$tag = $row['Number'];
	$query = "SELECT * FROM Applied_FO WHERE Tag_num=".$row['Number'];
	$result = mysql_query($query);

	
	while($row = mysql_fetch_assoc($result))
	{
		echo '<tr><td>'.$tag.'</td><td>'.$row['FO_num'].'</td><td>'.$row['Notes'].'</td><td>'.$row['Type'].'</td></tr>';	
	}
?>
	<form action="insertFO.php" method="post">
	<tr><td><input type="text" name="Tag" style="width:30px;" value="<?php echo $tag; ?>" readonly></td>
		<td><input type="text" name="FO"></td><td><textarea rows="1" style="width:300px;" name="Notes"></textarea></td>
		<td><label class="checkbox"><input type="checkbox" name="TypeQuote">Quote</label></td>
		<td><label style="margin-left=0px;" class="checkbox"><input type="checkbox" name="TypeFO">FO</label></td></tr>
	</table>
	<button type="submit" class="btn btn-success" style="float:right;"><i class="icon-plus"></i>Apply FO</button>
	</form>
	</div>	
	</div>
        <a href="./homepage.php" class="btn" style="float:right;">Exit</a>

      </div>

    </body>

</html>
            
