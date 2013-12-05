<!DOCTYPE html>
<html lang="en">

<?php
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
		<h2>Edit predefined values</h2>
		<?php
		if(isset($_GET['request'])){
			if($_GET['request']=='fail'){
			echo "<div class='alert alert-error'><h4>An error occurred with the request</h4>";
			echo "<span class='label label-important'>NOTICE</span> Ensure none of the fields were left empty</span></div>";
			}
			else if($_GET['request']=='success'){
			echo "<div class='alert alert-success'><h4>The change was successfully made</h4></div>";
			}
		}
		?>
		<div class="row">
		<div class="span3">
		<div class="alert alert-info"><h4>Complexity</h4></div>	
		<table class="table table-condensed">
			<tr><th>Value</th><th></th><th>Update</th><th>Delete</th></tr>
		<?php
			$query = "SELECT * FROM Complexity";
			$result = mysql_query($query) or die("Query failed : " . mysql_error());
			while($row = mysql_fetch_array($result))
			{
				echo "<form action='modifyComplexity.php' method='post'><tr>";
				echo "<td><input type='text' name='NewName' style='width:30px' value='".$row['Name']."' ></td>";
				echo "<td><input type='hidden' name='Id' value='".$row['Id']."'></td>";
				echo "<td><button class='btn btn-primary' type='submit'><i class='icon-pencil'></i></a></td>";
				echo "<td><a href='modifyComplexity.php?request=delete&id=".$row['Id']."' class='btn btn-danger' name='delete'><i class='icon-trash'></i></a></td>";
				echo "</tr></form>";
			}
?>	
		<form action="modifyComplexity.php" method="post">
		<tr><td><input type='text' style="width:30px" name='Name'></td><td></td><td><button class="btn btn-success" href type="submit"><i class="icon-plus"></i></button></td></tr>
		</form>
		</table>	
	</div>
	<div class="span5">	

		<div class="alert alert-info"><h4>Product Type and Multiplier</h4></div>
                <table class="table table-condensed">
			<tr><th>Product</th><th>Multiplier</th><th></th><th>Update</th><th>Delete</th></tr>
		<?php

			$query = "SELECT * FROM Product_type";
			$result = mysql_query($query);
			while($row = mysql_fetch_array($result))
			{
				echo "<form action='modifyProduct.php' method='post'><tr>";
				echo "<td><input type='text' name='NewName' style='width:100px' value='".$row['Name']."' ></td>";
				echo "<td><input type='text' name='NewMultiplier' style='width:30px' value='".$row['Multiplier']."'></td>";
				echo "<td><input type='hidden' name='Id' value='".$row['Id']."'></td>";
				echo "<td><button class='btn btn-primary' type='submit'><i class='icon-pencil'></i></a></td>";
				echo "<td><a href='modifyProduct.php?request=delete&id=".$row['Id']."' class='btn btn-danger' name='delete'><i class='icon-trash'></i></a></td>";
				echo "</tr></form>";
			}
?>
		<form action="modifyProduct.php" method="post">
		<tr><td><input type="text" name="Name" style="width:100px"></td><td><input type="text" name="Multiplier" style="width:30px"></td><td></td><td><button class="btn btn-success" href type="submit"><i class="icon-plus"></i></button></td></tr>
		</form>
		</table>
	</div>
	<div class="span4">
		<div class="alert alert-info"><h4>Subcategory</h4></div>
                <table class="table table-condensed">
			<tr><th>Subcategory</th><th></th><th>Update</th><th>Delete</th></tr>
		<?php

			$query = "SELECT * FROM Subcategory";
			$result = mysql_query($query);
			while($row = mysql_fetch_array($result))
			{
				echo "<form action='modifySubcategory.php' method='post'><tr>";
				echo "<td><input type='text' name='NewName' style='width:100px' value='".$row['Name']."' ></td>";
				echo "<td><input type='hidden' name='Id' value='".$row['Id']."'></td>";
				echo "<td><button class='btn btn-primary' type='submit'><i class='icon-pencil'></i></a></td>";
				echo "<td><a href='modifySubcategory.php?request=delete&id=".$row['Id']."' class='btn btn-danger' name='delete'><i class='icon-trash'></i></a></td>";
				echo "</tr></form>";
			}
?>
		<form action="modifySubcategory.php" method="post">
		<tr><td><input type="text" name="Name" style="width:100px"></td><td></td><td><button class="btn btn-success" href type="submit"><i class="icon-plus"></i></button></td></tr>
		</form>
		</table>
		</div>
</div>
<div class="row">
<?php
			$query = "SELECT * FROM Price_per_hour";
			$result = mysql_query($query);
			$row = mysql_fetch_assoc($result);
?>
	<div class="span5">
	<div class="alert alert-info"><h4>Per Hour Charge</h4></div>
	<div class="row">
	<form action="modifyCost.php" method="post" class="form-inline">
		<label style="margin-left:20px">Labor</label>
		<div class="input-prepend" >
		<span class="add-on" style="float:left;">$</span>
		<input type="text" name="Labor" style="width:60px;" value="<?php echo $row['Labor']; ?>">
		</div>
		<label>Engineering</label>	
		<div class="input-prepend">
		<span class="add-on" style="float:left;">$</span>
		<input type="text" name="Engineering" style="width:60px;" value="<?php echo $row['Engineering']; ?>">
		</div>
		<button type="submit" class="btn btn-primary"><i class="icon-pencil"></i></button>
	</form>
	</div>
	</div>

<?php
	$query = "SELECT * FROM Country WHERE Name='USA'";
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	$usa = $row['Multiplier'];
	$query = "SELECT * FROM Country WHERE Name='Canada'";
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	$canada = $row['Multiplier'];
	$query = "SELECT * FROM Country WHERE Name='Mexico'";
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	$mexico = $row['Multiplier'];

?>
	<div class="span6">
	<div class="alert alert-info"><h4>Multiplier by Country</h4></div>
	<div class="row">
	<form action="modifyMultiplier.php" method="post" class="form-inline">
		<label style="margin-left:20px;">USA</label>
		<input type="text" name="USA" style="width:60px; " value="<?php echo $usa; ?>">
		<label >Canada</label>
		<input type="text" name="Canada" style="width:60px;" value="<?php echo $canada; ?>">
		<label >Mexico</label>
		<input type="text" name="Mexico" style="width:60px;" value="<?php echo $mexico; ?>">
		<button type="submit" class="btn btn-primary"><i class="icon-pencil"></i></button>
	</form>
	</div>
	</div>
	<a href="./homepage.php" class="btn" style="float:right;">Exit</a>
</div>

</div>
	
  </body>
 </html>
  
