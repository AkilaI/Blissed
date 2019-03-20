<?php
require_once('../../connection/dbconnection.php');
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
  <link href="../../Public/css/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../../Public/css/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="../../Public/css/css/style.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<div class="col-lg-12 col-md-12 col-sm-12">
    <?php
    if(isset($_GET['logged'])){

      include('../../components/searchlogged.php');
     
      
      
    ?>

      <script type="text/javascript">

    function bid(id)
    {
      if(confirm('Sure to Participate?'))
      {
        window.location='../../Functions/users/userbid.php?bid='+id
      }
    }

     function match(id)
    {
      if(confirm('Sure to Use Right to Match Card?'))
      {
        window.location='../../Functions/users/usermatch.php?bid='+id
      }
    }
    </script>
    <?php

    }
    else{
     include('../../components/searchindex.php');
     ?>

     <script type="text/javascript">

     function bid(id)
     {
       if(confirm('Sure Participate?'))
       {
         alert('You Are Not Sign in, Please Sign In For Bid');
         window.location='../../Functions/Main/signin.php?bid='+id
       }
     }
     function match(id)
    {
      if(confirm('Sure to Use Right to Match card ?'))
      {
        alert('You Are Not Sign in, Please Sign In');
        window.location='../../Functions/Main/signin.php?bid='+id
      }
    }
     </script>
<?php

    }?>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>


  <main>
    
    <div class="container" >
      <div class="row">
        <div class="col-lg-6 col-md-6">

      
     
    </div>

    
    <span class = "border border-primary col-lg-12 col-md-12">
    <div class="col-lg-12 col-md-12">
      <h1 class="text-center">Search Results</h1>

      <?php

      if(isset($_POST['search'])){

      $search=$_POST['search'];

      $query="select * from products where productName like '%".$search."%' OR category like '%".$search."%' "; // search
      $result=mysqli_query($conn,$query);

        if(mysqli_num_rows($result)>0){?>

          <div class = "row">
          <?php
            $counter = 0;
            while ($row=mysqli_fetch_array($result)){
                
              $cur_date = date("Y-m-d");
              $edate = $row['endDate'];?>
                      
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
                    $name=$row['productID'];
                    echo "Product Brand: " .$row['productName'];
                    echo "<br>";
                    echo "Product model: " .$row['model'];
                    echo "<br>";
                    ?>
                    <button data-toggle="collapse" data-target="#desc">Description</button>
                      <div id="desc" class="collapse">
                        <?php
                        echo "Description: " .$row['description'];
                        ?>
                      </div>
                    <?php
                    echo "<br>";
                    echo "Quantity: " .$row['quantity'];
                    echo "<br>";
                    echo "Time Remaining";
                    ?>
                    <?php
                  
                    $exp_date = "var end_".$counter." = new Date('". $edate ."');";
        
                    $todays_date = date("Y-m-d H:i:s");
        
                    if ($todays_date < $exp_date) { ?>

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
                    } 
                    else {
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
                    <a href="javascript:bid(<?php echo $row[0]; ?>)"> <img src="../../Public/Assets/Images/bidnow.png"  width="200px" height="50px"  alt="Bid" /> </a>
                    <?php }
                    else{?>
                    <a href="javascript:match(<?php echo $row[0]; ?>)"> <img src="../../Public/Assets/Images/rtmc.png"  width="200px" height="30px"  alt="Right to match" /> </a>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <br>
              <br>
              <?php
              $counter++;
            }

        }else{
            echo "<script>window.alert('Data Not Found');</script>";
        
        }
      }
      ?>

    </div>
    </span>
  </div>
</main>
  <!--Main layout-->


 <!--Footer-->
  <div class = "row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <?php include('../../components/footer.php');?>
    </div>
  </div>
 <!--Footer-->


  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="../../Public/js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../../Public/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../../Public/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../../Public/js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>


</html>
