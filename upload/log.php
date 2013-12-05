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
		<h2>Log File</h2>
		<hr style="height: 3px; border-width: 0; background-color: #4fa600;">
		
		<?php
			$query = "SELECT * FROM Log";
			$result = mysql_query($query) or die("Query failed : " . mysql_error());
			echo "<table class='table'>
				<tr>
					<th>#</th>
					<th>Username</th>
					<th>IP Address</th>
					<th>Machine Name</th>
					<th>Attempt Date</th>
				</tr>";
			$i = 1;	
			while($row = mysql_fetch_array($result))
			{
				echo "<tr>";
				echo "<td>" . $i . "</td>";
				echo "<td>" . $row['Username'] . "</td>";
				echo "<td>" . $row['IP_address'] . "</td>";
				echo "<td>" . $row['Machine_name'] . "</td>";
				echo "<td>" . $row['Attempt_date'] . "</td>";
				echo "</tr>";
				$i++;
			}
			
			echo "</table>";
			mysql_close($con);
		?>	
	
	</div>

	
  </body>
 </html>
  