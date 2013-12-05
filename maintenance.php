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
		<h2>User/Group Maintenance Page</h2>
		<hr style="height: 3px; border-width: 0; background-color: #4fa600;">
		
		<div class="alert alert-info" style="background-color:#87d300;"><h4 style="color:#810043;">Groups</h4></div>

		<?php
			$query = "SELECT * FROM Groups";
			$result = mysql_query($query) or die("Query failed : " . mysql_error());
			echo "<table class='table table-condensed'>
				<tr>
					<th>Group Name</th>
					<th>Delete Group</th>
				</tr>";
			$i = 1;	
			while($row = mysql_fetch_array($result))
			{
				echo "<tr>";
				echo "<td>" . $row['Name'] . "</td>";
				echo "<td><a href='modifyGroup.php?request=delete&id=".$row['Id']."' class='btn btn-danger' name='delete'><i class='icon-trash'></i></a></td>";
				echo "</tr>";
				$i++;
			}
			
			echo "</table>";
		//	mysql_close($con);
		
			
		
		?>

		
		<h4>Create A New Group</h4>
		<form class="form-inline" action="modifyGroup.php" method="post">
			<label>Group Name</label>
			<!-- add a value="" attribute for text in field -->
			<input type="text" placeholder="" style="width:100px;" name="groupName">                 
			<button class="btn btn-success" style="margin-left:10px" type="submit"><i class="icon-plus"></i></button>
		</form>
	
		
		<div class="alert alert-info" style="background-color:#87d300;"><h4 style="color:#000000;">Users</h4></div>

		<?php
			$query = "SELECT User_id, Name, Group_id FROM Group_map JOIN Groups on Groups.Id=Group_map.Group_id";
			$result = mysql_query($query) or die("Query failed : " . mysql_error());
			echo "<table class='table table-condensed'>
				<tr>
					<th>User ID</th>
					<th>Group</th>
					<th>Delete User From Group</th>
				</tr>";
			$i = 1;	
			while($row = mysql_fetch_array($result))
			{
				echo "<tr>";
				echo "<td>" . $row['User_id'] . "</td>";
				echo "<td>" . $row['Name'] . "</td>";
				echo "<td><a href='modifyUserGroup.php?request=delete&userId=".$row['User_id']."&groupId=".$row['Group_id']."' class='btn btn-danger' name='delete'><i class='icon-trash'></i></a></td>";
				echo "</tr>";
				$i++;
			}
			
			echo "</table>";
		//	mysql_close($con);
		
			
		
		?>

		<h4>Add User to Group</h4>
		<form class="form-inline" action="modifyUserGroup.php" method="post">
			<label>User ID</label>
			<!-- add a value="" attribute for text in field -->              		
			<?php
				$query= "Select Id from User";
				$result =  mysql_query($query);
				echo "<select name='userId' id='userId'>";
				while ($select_query_array=   mysql_fetch_array($result) )
				{
				   echo "<option>".htmlspecialchars($select_query_array["Id"])."</option>";
				}
				echo "</select>";
			?>
			<label>Group Name</label>
			<!-- add a value="" attribute for text in field -->              		
			<?php
				$query= "Select Id, Name from Groups";
				$result =  mysql_query($query);
				echo "<select name='group' id='group'>";
				while ($select_query_array=   mysql_fetch_array($result) )
				{
				   echo "<option>".htmlspecialchars($select_query_array["Name"])."</option>";
					//echo "<option value='".$row['Id']."' >".$row['Name']."</option>";
				}
				echo "</select>";
			?>
			<button class="btn btn-success" style="margin-left:10px" type="submit"><i class="icon-plus"></i></button>
		</form>			
	</div>

	
  </body>
 </html>
  