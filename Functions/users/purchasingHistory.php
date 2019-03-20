<?php 
require_once('../../connection/dbconnection.php');
session_start();

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
</head>

<body>
  <!-- Navbar -->
  <?php
    include('../../components/usertopnavbar.php');
  ?>
  
  <main style="padding-top: 100px">
      <span class = "col-lg-2 col-md-12">
        <div class="container">
          <br>
          <?php

          $u1 = $_GET['name'];
          $view_query = "SELECT * FROM products WHERE buyer='$u1' AND productStatus='Yes'";
          $disp = mysqli_query($conn, $view_query);
          ?>
          <div class = "row">
          <?php
            $counter = 0;
            while ($row=mysqli_fetch_array($disp)){

              $cur_date = date("Y-m-d");
              $edate = $row['endDate'];
              
              ?>
            
                <div class="card" style="width:520px; margin:10px;">
                  <div class = "row">
                    <div class = "col-lg-4 col-md-4">
            
                    <?php

                      echo"<img src=http://localhost/blissed/Public/Assets/upimages/".$row['image']." width = '170px' height = '200px'>";
                    ?>
                  </div>
                  <div class = "col-lg-8 col-md-8">
                    <h4 class = "text-center">
                      <?php
                        echo " Details ";
                        echo "<br>";
                      ?>
                    </h4>
                    <?php
                      $name=$row['productID'];
                      echo "Product Brand: " .$row['productName'];
                      echo "<br>";
                      echo "Product model: " .$row['model'];
                      echo "<br>";
                      echo "Description: " .$row['description'];
                      echo "<br>";
                      echo "Quantity: " .$row['quantity'];
                      echo "<br>";
                      echo "Seller: " .$row['user'];
                      echo "<br>";
                      echo "Start Date: " .$row['startDate'];
                      echo "<br>";
                      echo "End Date: " .$row['endDate'];
                      echo "<br>";
                      echo "<br>";
                      echo "<b>";
                      echo "Price: Rs " .$row['price'];
                      echo "</b>"; 
                      echo "<br>"; 
                    ?>
                  </div>
                </div>
              </div>
              <br>
              <br>
              <?php
              $counter++;
            }
            ?>

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
  <div class = 'row' style="padding-top: 300px">
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