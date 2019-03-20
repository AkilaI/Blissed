<?php
require_once('./connection/dbconnection.php');
session_start();
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
  <link href="./Public/css/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="./Public/css/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="./Public/css/css/style.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">
    html,
    body,
    header,
    .carousel {
      height: 400px;
      padding-top:40px;
    }

    @media (max-width: 740px) {
      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }
  </style>
</head>



  <!-- Navbar -->
  <div class="col-lg-12 col-md-12 col-sm-12">
    <?php
    if(isset($_GET['logged'])){
      include('./components/userindextop.php');
    ?>

      <script type="text/javascript">

      function bid(id){    // call on click bid now
        if(confirm('Sure to Participate?')){
        window.location='./Functions/users/userbid.php?bid='+id
        }
      }

      function match(id) { // call on click right to match
        if(confirm('Sure to Use Right to Match Card?'))
        {
        window.location='./Functions/users/usermatch.php?bid='+id
        }
      }
      </script>

    <?php

    }
    else{
      include('./components/navbar.php');
    ?>

      <script type="text/javascript">

        function bid(id){   // call on click bid now
          if(confirm('Sure Participate?'))
          {
            alert('You Are Not Sign in, Please Sign In For Bid');
            window.location='./Functions/Main/signin.php?bid='+id
          }
        }
        function match(id){  // call on click right to  match
          if(confirm('Sure to Use Right to Match card ?'))
          {
            alert('You Are Not Sign in, Please Sign In');
            window.location='./Functions/Main/signin.php?bid='+id
          }
        }
     </script>
<?php

    }?>
  </div>

 <?php 
  $adqry = "SELECT * FROM ads WHERE display = 'Yes' "; // display allowed ads
  $addisp = mysqli_query($conn,$adqry);
  $adpath1="";
  $adpath2="";
  $adpath3="";
  $array = [];
     
  // display 3 ads
  $adrow1 = mysqli_fetch_row($addisp);
  $adpath1 =  "http://localhost/blissed/Public/Assets/Images/".$adrow1['2'];

  $adrow2 = mysqli_fetch_row($addisp);
  $adpath2 =  "http://localhost/blissed/Public/Assets/Images/".$adrow2['2'];

  $adrow3 = mysqli_fetch_row($addisp);
  $adpath3 =  "http://localhost/blissed/Public/Assets/Images/".$adrow3['2']; 
 
 ?>


  <!--Carousel Wrapper-->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100 " src=<?php echo $adpath1; ?> alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src=<?php echo $adpath2; ?> alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src=<?php echo $adpath3; ?> alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>  
  <!--/.Carousel Wrapper-->
  <br>
  <br>

  <!--Main layout-->
  <main>
    <div class="container" >
      <div class="row">
      <span class = "border border-primary col-lg-12 col-md-12">
        <div class="col-lg-12 col-md-12">
          <h1 class="text-center">Live Auctions</h1>

          <?php
          $view_query = "SELECT * FROM products WHERE productStatus='No'"; // Get unsold products
          $disp = mysqli_query($conn, $view_query);
          ?>

        <div class = "row">
          <?php
          $counter = 0;
          while ($row=mysqli_fetch_array($disp)){

            $cur_date = date("Y-m-d");
            $edate = $row['endDate'];

            if($cur_date>$edate){ // Deadline is extended
              $buyer = $row['buyer'];
              $productid = $row['productID'];
       
              if($buyer=='Null'){
            
                $seller = $row['user'];
                $product = $row['productName'];

                $emquery = "SELECT * FROM users WHERE username = '$seller'";  // get seller details
                $emrsl = mysqli_query($conn,$emquery);
                $emdisp = mysqli_fetch_array($emrsl);
                $emto = $emdisp['email'];
                // send notifications
                $message = "Sorry ".$seller." Your product " .$product." remain UNSOLD!"; 
                $msgquery = "INSERT  INTO notifications (user,message,viewStatus,proID)
                              VALUES ('$seller','$message','No','$productid')";
                mysqli_query($conn,$msgquery);

                $subject = 'Bid Notification';

                $header = 'From: blissedbid@gmail.com';
    
                // use wordwrap() if lines are longer than 70 characters
                $message = wordwrap($message,70);
    
                // send email
                mail($emto,$subject,$message,$header);
    
              }
              // product sold
              elseif($buyer!='Null'){

                $query = "UPDATE products SET productStatus = 'Yes' WHERE productID = '$productid'";
                mysqli_query($conn,$query);

                $seller = $row['user'];
                $product = $row['productName'];
            

                $qry1 = "SELECT * FROM users WHERE username = '$seller'"; // seller details
                $result1 = mysqli_query($conn,$qry1);
                $row1 = mysqli_fetch_array($result1);
                $sname = $row1['username'];
                $scont = $row1['contact'];
                $semail = $row1['email'];
                $saddr = $row1['address'];

                $qry2 = "SELECT * FROM users WHERE username = '$buyer'"; // buyer details
                $result2 = mysqli_query($conn,$qry2);
                $row2 = mysqli_fetch_array($result2);
                $bname = $row2['username'];
                $bcont = $row2['contact'];
                $bemail = $row2['email'];
                $baddr = $row2['address'];
                //send messages 
                $message1 = "Congratulations".$sname."Your product".$product." is SOLD! and buyer is ".$buyer." Contact him by email ".$bemail." contact ".$bcont." Address ".$baddr. "Thank You.";
                $msgquery2 = "INSERT INTO notifications (user,message,viewStatus,proID)
                              VALUES ('$seller','$message1','No','$productid')";
                mysqli_query($conn,$msgquery2);

                $subject = 'Bid Notification';

                $header = 'From: blissedbid@gmail.com';
        
                // use wordwrap() if lines are longer than 70 characters
                $message1 = wordwrap($message1,70);
        
                // send email
                mail($semail,$subject,$message1,$header);
      
                $message3 = "Congratulations".$bname."You won the ".$product." and seller is ".$seller." Contact him by email ".$semail." contact ".$scont." Address ".$saddr. "Thank You.";
                $msgquery3 = "INSERT INTO notifications (user,message,viewStatus,proID)
                              VALUES ('$buyer','$message3','No','$productid')";
                mysqli_query($conn,$msgquery3);

                $message3 = wordwrap($message3,70);
        

                mail($bemail,$subject,$message3,$header);
      
              }
            }

            // active auctions
            if($cur_date <= $edate){ 
            ?>    
              <div class="card" style="width:520px; margin:10px;">
                <div class = "row">
                  <div class = "col-lg-4 col-md-4">
                    <?php echo"<img src=http://localhost/blissed/Public/Assets/upimages/".$row['image']." width = '170px' height = '200px'>";?>
                  </div>
                  <div class = "col-lg-8 col-md-8">
                    <h4 class = "text-center">
                      <?php
                        echo " Details ";
                        echo "<br>";
                      ?>
                    </h4>
                    <?php
                    $name=$row['productID']; // product id
                    echo "Product Brand: " .$row['productName'];
                    echo "<br>";
                    echo "Product model: " .$row['model'];
                    echo "<br>";
                    ?>
                    <button data-toggle="collapse" data-target="#desc">Description</button>
                    <div id="desc" class="collapse">
                      <?php
                      echo "Description: " .$row['description']; // description
                      ?>
                    </div>
                    <?php
                    echo "<br>";
                    echo "Quantity: " .$row['quantity']; // quantity
                    echo "<br>";
                    echo "Time Remaining";
                    ?>
                    <?php
                    // timer
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
            
                        function showRemaining(){
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

                  /* echo $counter;*/
                    echo "<b>";
                    echo "Price: Rs " .$row['price'];
                    echo "</b>"; 
                    echo "<br>"; 
                    $dist = $_COOKIE["distance_$counter"];
            
                  if ($dist>0) {?>
                    <a href="javascript:bid(<?php echo $row[0]; ?>)"> <img src="./Public/Assets/Images/bidnow.png"  width="200px" height="50px"  alt="Bid" /> </a>
                  <?php }
                  else{?>
                    <a href="javascript:match(<?php echo $row[0]; ?>)"> <img src="./Public/Assets/Images/rtmc.png"  width="200px" height="30px"  alt="Right to match" /> </a>
                  <?php } ?>
                </div>
              </div>
            </div>
            <?php
            }?>
            <br>
            <br>
            <?php
            $counter++;
          }?>
        </div>
      </span>
    </div>
  </main>
  <!--Main layout-->


 <!--Footer-->
  <div class = "row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <?php include('./components/footer.php');?>
    </div>
  </div>
 <!--Footer-->


  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="./Public/js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="./Public/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="./Public/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="./Public/js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>


</html>