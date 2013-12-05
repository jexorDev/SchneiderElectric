<?php
include('includeStuff.php');
session_start();
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

      .content
      {
        background-color: #FAFAFA;
        background-image: linear-gradient(to bottom, #FFFFFF, #F2F2F2);
        background-repeat: repeat-x;
        border: 1px solid #D4D4D4;
        border-radius: 4px;
        margin: 10% 25% 10% 25%;
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
          <!-- Button to trigger modal -->
      <div class="content">
     <form action="login.php" method="post" style="margin:0px;">
    <!-- Modal -->
              <div class="modal-header">
                  
              <h3 id="myModalLabel">Login:</h3>
              </div>
              <div class="modal-body">     
                <input name="user_ID" class="input-xlarge" type="text" placeholder="User Name (login id)">
                <br>       
                <input name="user_password" class="input-xlarge" type="password" placeholder="password">
              <div class="modal-footer">
                <button class="btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn-primary">Submit</button>
              </div>
            
            <?php  if( isset($_GET['login'])){    
               ?>

	      <span style="float:left; font-weight:bold;">
		<div class="alert alert-error">
                  Login failed: either username or password are incorrect		
                </div>
              </span>

              <?php 
                }
               ?>
               
            </div>
         
        </form> 
      </div>
    </body>

</html>
            
