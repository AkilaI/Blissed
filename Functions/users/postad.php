<?php 
include('../../config/detmanage.php');


$keys = array_keys($err);
$desired_keys = array('edate','img');

foreach($desired_keys as $desired_key){
   if(in_array($desired_key, $keys)) continue;  // already set
   $err[$desired_key] = '';
}

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
  <title>User Home</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="../../Public/css/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../../Public/css/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="../../Public/css/css/style.min.css" rel="stylesheet">
  <link href="../../Public/css/customstyles.css" rel="stylesheet">
   <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}

</style>
</head>

<body>
  <!-- Navbar -->
  <?php
    include('../../components/usertopnavbar.php');
  ?>
  
  <main style="padding-top: 200px">
    <span class = "col-lg-2 col-md-12">
      <div class="container">
        <div class="bootstrap-iso">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <form method="post" action="postad.php" enctype="multipart/form-data">                    
                             
                  <div class="form-group ">
                      <label class="control-label " for="mprice">
                      Advertisement
                      </label><span class="asteriskField">
                      *
                      </span>
                      <input class="form-control" id="image" name="image" type="file"/>
                      <?php 
                          echo '<span style = "color:red;">'; echo $err['img']; echo '</span>';
                      ?>
                  </div>

                  <div class="form-group ">
                      <label class="control-label requiredField" for="edate">
                      End Date
                      <span class="asteriskField">
                      *
                      </span>
                      </label>
                      <input class = "form-control" id="edate" name="edate" type="date"> 
        
                      <?php 
                          echo '<span style = "color:red;">'; echo $err['edate']; echo '</span>';
                      ?>
                  </div>

                  <br>
                  <div class="form-group">
                    <div>
                      <button class="btn btn-primary " name="post_ad" type="submit">
                      Post Ad
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>


      </div>
    </span>
  </main>

</body>
<br>
<br>
<br>
<br>

  <!--Footer-->
  <div class = 'row'>
    <div class="col-lg-12 col-md-12 col-sm-12">
      <?php include('../../components/footer.php');?>
    </div>
  </div>
 
 <!--Footer-->


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