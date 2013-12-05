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
        <h2>Edit TAG</h2>
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
            <form class="form-inline">
            <!-- add a value="" attribute for text in field -->
              <input type="text" placeholder="" style="width:15px;" name="TNum">
              <input type="text" placeholder="" style="width:60px;" name="TNum2">             
              <input type="text" placeholder="" style="width:45px;" name="Rev#">             
              <input type="text" placeholder="" style="width:60px;" name="Date">              
              <input type="text" placeholder="" style="width:120px;" name="SubCat">              
              <input type="text" placeholder="" style="width:60px;" name="Compl">              
              <input type="text" placeholder="" style="width:60px;" name="LeadTime">
            
              <br>
              <label style="margin-left:10px;">TAG Description:</label><br>
              <textarea style="width:535px;" name="Desc" rows="1"></textarea>

              <br>
              <label style="margin-left:10px;">TAG Notes:</label><br>
              <textarea style="width:535px;" name="Note" rows="1"></textarea>

              <br>
              <label style="margin-left:10px;">Price Note:</label><br>
              <textarea style="width:535px;" name="PriceNote" rows="1"></textarea>
              <br>
              <label style="margin-left:10px;">Product Lines Tag May Be Applied To:</label>
               
               <label class="checkbox" style="margin-left:75px;">
                <input type="checkbox"> Click Box to Make TAG Permanantly Obsolete
                </label>

                <br><br>

                <label style="margin-left:125px;">USA$</label>
                <label style="margin-left:75px;">Canada$</label>
                <label style="margin-left:50px;">Mexico$</label>

                <br>
                <label class="checkbox">
                <input type="checkbox"> HVL
                </label>

                <input type="text" placeholder="" style="width:100px; margin-left:41px;">
                <input type="text" placeholder="" style="width:100px;">
                <input type="text" placeholder="" style="width:100px;">

                <br>
                <label class="checkbox">
                <input type="checkbox"> HVL/CC
                </label>

                <input type="text" placeholder="" style="width:100px;  margin-left:17px;">
                <input type="text" placeholder="" style="width:100px;">
                <input type="text" placeholder="" style="width:100px;">

                <br>
                <label class="checkbox">
                <input type="checkbox"> Metal Clad
                </label>

                <input type="text" placeholder="" style="width:100px;">
                <input type="text" placeholder="" style="width:100px;">
                <input type="text" placeholder="" style="width:100px;">

                <br>
                <label class="checkbox">
                <input type="checkbox"> MVMCC
                </label>

                <input type="text" placeholder="" style="width:100px; margin-left:16px;">
                <input type="text" placeholder="" style="width:100px;">
                <input type="text" placeholder="" style="width:100px;">

            

            </form>
          </div>





          <div class="span4">
            <form class="form-inline">
            <label style="margin-left:10px;">Pricing Information:</label><br>

            <label style="margin-left:10px;">Material:</label>
            <input type="text" placeholder="" style="width:120px; float:right;"> <br>

            <label style="margin-left:10px;">Labor:</label>
            <input type="text" placeholder="" style="width:120px; float:right;"> <br>

            <label style="margin-left:10px;">Engineering:</label>
            <input type="text" placeholder="" style="width:120px; float:right;"> <br>

            <hr style="color:black;">
            <label style="margin-left:10px;">Install Cost:</label>
            <input type="text" placeholder="" style="width:120px; float:right;"> <br>

            <br><br><br>

            
            <input type="text" placeholder="" style="width:120px; float:right;">
            <label style="margin-left:10px; float:right;">TAG Member:</label> <br>

            
            <input type="text" placeholder="" style="width:120px; float:right;"> 
            <label style="margin-left:10px; float:right;">Price Expires:</label><br><br><br>

            <button href class="btn btn-inverse" style="width:162px;">Save</button><br>
            <button href class="btn btn-info" style="width:162px;">Add Attachment</button><br>
          </form>
	  </div>
	
	</div>
        <a href="./homepage.php" class="btn" style="float:right;">Exit</a>

      </div>

    </body>

</html>
            
