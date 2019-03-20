<?php 
    require_once('../../connection/dbconnection.php');
    session_start();
   
		$username = $_SESSION['username'];
	if(!isset($_SESSION['username']))
	{
		header('location:../../index.php');
		exit;
	}
	
?>




<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Blissed</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="../../Public/css/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../../Public/css/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../../Public/css/css/style.min.css" rel="stylesheet">
    
  </head>

  <body>
   
  <?php
        include('../../components/admintopnav.php');
      ?>

    

    <div class = "row">
      <?php
        include('../../components/adminnavbar.php');
      ?>
    </div>
  

  
    <div class ="container">
      <div class = "row">
        <div class = "col-lg-12 col-md-4 col-sm-4">
          <center><img src = "../../Public/Assets/Images/login.png" ></center>
        </div>
      </div>
    </div>

      
    <br>
    <br>
  
    <main>
      <div class="container">
        <center><p><b> Welcome : <?php echo "$username"?> </b></p></center>
      </div>
    </main>
  
  </body>
  <br>
  <br>
  <br>
  

  <!--Footer-->
  
  <div class = 'row'>
    <div class="col-lg-12 col-md-12 col-sm-12">
      <?php include('../../components/footer.php');?>
    </div>
  </div>
 
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>


</html>