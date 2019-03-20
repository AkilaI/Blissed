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
  <script type="text/javascript">

function bid(id)
{
  if(confirm('Sure Participate?'))
  {

    window.location='userbid.php?bid='+id
  }
}

function match(id)
{
  if(confirm('Sure Participate?'))
  {

    window.location='usermatch.php?bid='+id
  }
}
</script>
 
 
 
</head>

<body>
  <!-- Navbar -->
  <?php
    include('../../components/usertopnavbar.php');
  ?>

  <div class = "row">
    <?php
      if(isset($_GET['subtype'])){
        $sub = $_GET['subtype'];
      
      if($sub=='Free'){
      include('../../components/usernavbar.php');
      }
      elseif($sub=='1 Month'){
        include('../../components/1muser.php');
      }
      elseif($sub== '3 Months'){
        include('../../components/3muser.php');
      }
    }
    ?>
  </div>
  




  <main style="padding-top: 100px">

    <div class="row"  style="height: 350px; margin-top: -100px;">
      <span class = "border border-primary col-lg-12 col-md-12 col-sm-12">
        <div class="container">
          <div class="col-md-12" style="background: white;">
            <br>
            <h1> Trending Categories </h1>

            <?php 
            $username = $_SESSION['username'];

            $frquery = "SELECT category, count(*)
            FROM products
            GROUP BY category
            ORDER BY count(*) DESC
            LIMIT 3";

            $frdisp = mysqli_query($conn,$frquery);?>


            <section class="text-center mb-4">
              <div class="row wow fadeIn">

            <?php  
            while($frrow = mysqli_fetch_array($frdisp)){;
              
            
            $catg = $frrow['category'];
            ?>
           
                <div class="col-lg-3 col-md-4 col-sm-4" id = <?php echo $catg?>>
                  <div class="card">
                    <div class="view overlay">
                      <img src="../../Public/Assets/Images/<?php echo $catg?>.jpg" height = "150px" class="card-img-top" alt="">
                      <a>
                        <div class="mask rgba-white-slight"></div>
                      </a>
                    </div>
              
                    <div class="card-body text-center">
                      <h5>
                        <strong>
                          <a href="../../Functions/categories/<?php echo $catg?>.php?logged" class="dark-grey-text"><?php echo $catg?>
                          
                          </a>
                        </strong>
                      </h5>
                    </div>
                  </div>
                </div>
            <?php } ?>

                
              </div>
            </section>

            
          </div>
        </div>
      </span>
    </div>
<br>]
<br>
<br>
<br>
<br>

    <div class="row"  style="height: 350px; margin-top: -100px;">
      <span class = "border border-primary col-lg-12 col-md-12 col-sm-12">
        <div class="container">
          <div class="col-md-12" style="background: white;">
            <br>
            <h1> Least Trending Categories </h1>

            <?php 
            $username = $_SESSION['username'];

            $frquery = "SELECT category, count(*)
            FROM products
            GROUP BY category
            ORDER BY count(*)
            LIMIT 3";

            $frdisp = mysqli_query($conn,$frquery);?>


            <section class="text-center mb-4">
              <div class="row wow fadeIn">

            <?php  
            while($frrow = mysqli_fetch_array($frdisp)){;
              
            
            $catg = $frrow['category'];
            ?>
           
                <div class="col-lg-3 col-md-4 col-sm-4" id = <?php echo $catg?>>
                  <div class="card">
                    <div class="view overlay">
                      <img src="../../Public/Assets/Images/<?php echo $catg?>.jpg" height = "150px" class="card-img-top" alt="">
                      <a>
                        <div class="mask rgba-white-slight"></div>
                      </a>
                    </div>
              
                    <div class="card-body text-center">
                      <h5>
                        <strong>
                          <a href="../../Functions/categories/<?php echo $catg?>.php?logged" class="dark-grey-text"><?php echo $catg?>
                          
                          </a>
                        </strong>
                      </h5>
                    </div>
                  </div>
                </div>
            <?php } ?>

                
              </div>
            </section>

            
          </div>
        </div>
      </span>
    </div>








    
    
      <span class = "col-lg-2 col-md-12">
        <div class="container">
          <br>
          <h2 class="text=center">LIVE AUCTIONS </h2>
          <?php


  

    /*if(mysqli_connect_errno()){
    die('database connection failed'.mysqli_connect_error());
    }else{
    echo "connection successful";
    }*/

    $view_query = "SELECT * FROM products WHERE productStatus='No'";
    $disp = mysqli_query($conn, $view_query);
    ?>
    <div class = "row">
      <?php
            $counter = 0;
            while ($row=mysqli_fetch_array($disp)){
              
              
            $cur_date = date("Y-m-d");
            $edate = $row['endDate'];
            
      
            if($cur_date <= $edate){
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
                echo "Time Remaining";
                
              ?>

                <?php
                
                $exp_date = "var end_".$counter." = new Date('". $edate ."');";
                
                $todays_date = date("Y-m-d H:i:s");
                if ($todays_date < $exp_date) {
                
                ?>
                <script>
                <?php echo $exp_date ;?>
                
                var _second = 1000;
                var _minute = _second * 60;
                var _hour = _minute * 60;
                var _day = _hour *24
                var timer;
                
                function showRemaining()
                {
                    var now = new Date();
                    var distance_<?php echo $counter;?> = Math.round((end_<?php echo $counter;?> - now)/1000)*1000;
                    document.cookie = "distance_<?php echo $counter;?> = " + distance_<?php echo $counter;?>;
                
                    if (distance_<?php echo $counter;?> < 0) {
                      clearInterval( timer );
                      document.getElementById('countdown_<?php echo $counter;?>').innerHTML = "<span style= 'color:red;'>EXPIRED!</span>";
                
                      return;
                    }
                    var days = Math.floor(distance_<?php echo $counter;?> / _day);
                    var hours = Math.floor( (distance_<?php echo $counter;?> % _day ) / _hour );
                    var minutes = Math.floor( (distance_<?php echo $counter;?> % _hour) / _minute );
                    var seconds = Math.floor( (distance_<?php echo $counter;?> % _minute) / _second );
                    
                
                    document.getElementById('countdown_<?php echo $counter;?>').innerHTML =  days +'d:';
                    document.getElementById('countdown_<?php echo $counter;?>').innerHTML += hours+'hr:';
                    document.getElementById('countdown_<?php echo $counter;?>').innerHTML += minutes+'mn:';
                    document.getElementById('countdown_<?php echo $counter;?>').innerHTML += seconds+'s';
                    
                  
                }
                
                timer = setInterval(showRemaining, 1000);
                </script>
                <?php
                } else {
                    echo "Times Up";
                }
                ?>
                <div id="countdown_<?php echo $counter;?>"></div>
                <?php





                echo "<br>";
                echo "<b>";
                echo "Price: Rs " .$row['price'];
                echo "</b>"; 
                echo "<br>"; 
                $dist = $_COOKIE["distance_$counter"];
          
                
                if ($dist>0) {?>
                  <a href="javascript:bid(<?php echo $row[0]; ?>)"> <img src="../../Public/Assets/Images/bidnow.png"  width="200px" height="50px"  alt="Bid" /> </a>
                <?php }
                else{?>
                  <a href="javascript:match(<?php echo $row[0]; ?>)"> <img src="../../Public/Assets/Images/rtmc.png"  width="200px" height="30px"  alt="Right to match" /> </a>
                <?php } ?>
           
            </div>
          </div>
        </div>

        
        
      
        <?php
        
      }
      ?>
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