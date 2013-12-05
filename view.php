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
	$(function(){
		$(document).ready(function(){
			var install = $("#Install").val() ;
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
        <h2>View TAG</h2>
      <hr/>

        <div class="row">
          <form class="form-inline" style="margin-left:20px;">
              <label>Tag Number</label>
              <label style="margin-left:35px;">Rev #</label>
              <label style="margin-left:25px;">Date</label>
              <label style="margin-left:40px;">Sub - Category</label>
              <label style="margin-left:35px;">Complexity</label>
              <label style="margin-left:10px;">Lead Time</label>
          </form>
          <div class="span10">
            <?php
            $tempTnum2 = $_GET['TNum2'];
            $tempRevNum = $_GET['RevNum'];

            $query = "SELECT * From Tag JOIN Subcategory ON Cat_id = ID 
            Where  $tempTnum2 = Number AND $tempRevNum = Revision";

            $result = mysql_query($query) or die("Query failed : " . mysql_error());

            if($row = mysql_fetch_assoc($result))
	    {
	      $tagNum = $row['Number'];
              echo '<form class="form-inline">';
           
              echo '<input type="text" placeholder="" style="width:15px;"   name="TNum"     readonly value="07">';
              echo '<input type="text" placeholder="" style="width:60px;"   name="TNum2"    readonly value="'. $row['Number']  .' ">';             
              echo '<input type="text" placeholder="" style="width:45px;"   name="Rev#"     readonly value="'. $row['Revision']  .' ">';            
              echo '<input type="text" placeholder="" style="width:60px;"   name="Date"     readonly value="'. $row['Date']  .' ">';              
              echo '<input type="text" placeholder="" style="width:120px;"  name="SubCat"   readonly value="'. $row['Name']  .' ">';              
              echo '<input type="text" placeholder="" style="width:60px;"   name="Compl"    readonly value="'. $row['Complexity_id']  .' ">';              
              echo '<input type="text" placeholder="" style="width:60px;"   name="LeadTime" readonly value="'. $row['Lead_time']  .' ">';
            
              echo '<br>';
              echo '<label style="margin-left:10px;">TAG Description:</label><br>';
              echo '<textarea style="width:535px;" name="Desc" rows="1" readonly>' . $row['Tag_desc'] . '</textarea>';

              echo '<br>';
              echo '<label style="margin-left:10px;">TAG Notes:</label><br>';
              echo '<textarea style="width:535px;" name="Notes" rows="1" readonly>' . $row['Tag_notes'] . '</textarea>';

              echo '<br>';
              echo '<label style="margin-left:10px;">Price Note:</label><br>';
              echo '<textarea style="width:535px;" name="PriceNote" rows="1" readonly>' . $row['Price_notes'] . '</textarea>';
              echo '<br>';
              echo '<label style="margin-left:10px;">Product Lines Tag May Be Applied To:</label>';
               
               echo '<label class="checkbox" style="margin-left:75px;">';
                echo '<input type="checkbox" readonly> Click Box to Make TAG Permanantly Obsolete';
                echo '</label>';

                echo '<br><br>';

                echo '<label style="margin-left:125px;">USA$</label>';
                echo '<label style="margin-left:75px;">Canada$</label>';
                echo '<label style="margin-left:50px;">Mexico$</label>';

		echo '<br>';
	      $HVL = '';
	      $HVLCC = '';
	      $METALCLAD = '';
	      $MVMCC = '';

	      $query = "SELECT Product_name FROM Price_map WHERE Tag_num=".$row['Number']." AND Product_name='HVL' AND Rev_num=".$tempRevNum;
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

?>
           <label class="checkbox">
	   <input type="checkbox" name="HVL" id="HVL" <?php echo $HVL;?>> HVL
		</label>

        	<input type="text" id="HVL-USA" name="HVL-USA" placeholder=""  style="width:100px; margin-left:41px;">
                <input type="text" id="HVL-CANADA"  name="HVL-CANADA" placeholder="" style="width:100px;">
                <input type="text" id="HVL-MEXICO" name="HVL-MEXICO" placeholder="" style="width:100px;">

                <br>
                <label class="checkbox">
		<input type="checkbox" name="HVL" id="HVLCC" <?php echo $HVLCC; ?>> HVL/CC
                </label>

                <input type="text" id="HVLCC-USA" name="HVLCC-USA" placeholder="" style="width:100px;  margin-left:17px;">
                <input type="text" id="HVLCC-CANADA" name="HVLCC-CANADA" placeholder="" style="width:100px;">
                <input type="text" id="HVLCC-MEXICO" name="HVLCC-MEXICO" placeholder="" style="width:100px;">

                <br>
                <label class="checkbox">
		<input type="checkbox" id="MetalClad" name="MetalClad" <?php echo $METALCLAD; ?>> Metal Clad
                </label>

                <input type="text" id="METALCLAD-USA" name="METALCLAD-USA" placeholder="" style="width:100px;">
                <input type="text" id="METALCLAD-CANADA" name="METALCLAD-CANADA" placeholder="" style="width:100px;">
                <input type="text" id="METALCLAD-MEXICO" name="METALCLAD-MEXICO" placeholder="" style="width:100px;">

                <br>
                <label class="checkbox">
		<input type="checkbox" id="MVMCC" name="MVMCC" <?php echo $MVMCC; ?>> MVMCC
                </label>

                <input type="text" id="MVMCC-USA" name="MVMCC-USA" placeholder="" style="width:100px; margin-left:16px;">
                <input type="text" id="MVMCC-CANADA" name="MVMCC-CANADA" placeholder="" style="width:100px;">
                <input type="text" id="MVMCC-MEXICO" name="MVMCC-MEXICO" placeholder="" style="width:100px;">

                   
<?php
            echo '</form>';
          echo '</div>';

          echo '<div class="span4">';
            echo '<form class="form-inline">';
            echo '<label style="margin-left:10px;">Pricing Information:</label><br>';

            echo '<label style="margin-left:10px;">Material:</label>';
            echo '<input type="text" placeholder="" style="width:120px; float:right;" readonly value="' . $row['Material_cost'] . '"> <br>';

            echo '<label style="margin-left:10px;" >Labor:</label>';
            echo '<input type="text" placeholder="" id="Labor" style="width:120px; float:right;" readonly value="' . $row['Labor_cost'] . '"> <br>';

            echo '<label style="margin-left:10px;" >Engineering:</label>';
            echo '<input type="text" placeholder="" id="Engineering" style="width:120px; float:right;" readonly value="' . $row['Engineering_cost'] . '"> <br>';

            echo '<hr style="color:black;">';
            echo '<label style="margin-left:10px;" >Install Cost:</label>';
            echo '<input type="text" placeholder="" id="Install" style="width:120px; float:right;" readonly value="' . $row['Install_cost'] . '"> <br>';

            echo '<br><br><br>';

            
            echo '<input type="text" placeholder="" style="width:120px; float:right;" readonly="NULL" value="' . $row['Created_by'] . '">';
            echo '<label style="margin-left:10px; float:right;">TAG Member:</label> <br>';

            
            echo '<input type="text" placeholder="" style="width:120px; float:right;" readonly value="' . $row['Price_expires'] . '"> ';
            echo '<label style="margin-left:10px; float:right;">Price Expires:</label><br><br><br>';

            echo '</form>';
            


            


            echo '<FORM METHOD="LINK" ACTION="editTag.php">';

              echo '<input  placeholder="" style="width:60px;"  type="hidden" name="TagNum"    value="'. $row['Number']  .'"> ';           
              echo '<input  placeholder="" style="width:45px;"  type="hidden" name="RevNum"   value="'. $row['Revision']  .'">'; 

             echo '<INPUT TYPE="submit" class="btn btn-inverse" VALUE="Make Revision to Tag" style="width:162px;" >';
           echo ' </FORM>';
} 
            ?>
            <FORM METHOD="LINK" ACTION="./homepage.php">
             <INPUT TYPE="submit" class="btn btn-info" VALUE="Go To Datasheet" style="width:162px;">
            </FORM> 

            <FORM METHOD="LINK" ACTION="./homepage.php">
             <INPUT TYPE="submit" class="btn btn-warning" VALUE="Review Attachments" style="width:162px;">
            </FORM> 
<?php
	$query = "SELECT * FROM Attachment WHERE Tag_num=".$tagNum;
		  $result = mysql_query($query);

		  while($row=mysql_fetch_assoc($result))
		  {
			  echo '<a href="./'.$row['Path'].'">'.$row['Path'].'</a>';
			  echo '<br>';
		  }
?>        
          
          </div>
	</div>
	<table class=" table table-condensed">
	<tr><th>Tag Number</th><th>Applied FO Number</th><th>Notes to next engineer</th><th>Type</th></tr>
<?php
	$query = "SELECT * FROM Applied_FO WHERE Tag_num=".$tagNum;
	$result = mysql_query($query);

	
	while($row = mysql_fetch_assoc($result))
	{
		echo '<tr><td>'.$row['Tag_num'].'</td><td>'.$row['FO_num'].'</td><td>'.$row['Notes'].'</td><td>'.$row['Type'].'</td></tr>';	
	}
?>
	</table>
        <a href="./homepage.php" class="btn" style="float:right;">Exit</a>

      </div>

    </body>

</html>
            
