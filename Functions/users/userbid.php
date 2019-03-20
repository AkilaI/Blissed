<?php 
session_start();
include_once('../../connection/dbconnection.php');

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
  <title>Bid</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="../../Public/css/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../../Public/css/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="../../Public/css/css/style.min.css" rel="stylesheet">
  <link href="../../Public/css/customstyles.css" rel="stylesheet">

  
<body>
  <!-- Navbar -->
  
  <?php
  include('../../components/usertopnavbar.php');
    
  if(isset($_GET['bid'])){

    $uname= $_SESSION['username'];
    $id=$_GET['bid'];

    $query="SELECT * FROM products where productID ='$id'";
    $Result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($Result);

    $UserName=$row['user'];


    if($UserName==$uname)  // Check the bidder is same as seller
    {
      $message="This Is Your Product, You Can Not Bid Your Own Product";
      $url = "../users/userhome.php?user=".$_SESSION['id'].'&subtype='.$_SESSION['subtype'];
      echo"<script type = 'text/javascript'>
            alert('This Is Your Product, You Can Not Bid Your Own Product');
            window.location = '$url';
      
            </script>";
      exit();

    }
    else
    {
      $qry="SELECT * FROM products where productID ='$id'"; // get product

      $Result=mysqli_query($conn,$qry);

      $row=mysqli_fetch_array($Result);

      $cbuyer = $row['buyer'];

      $Price=$row['price'];

      $price1=$Price+100;
      $price2=$Price+500;
      $price3=$Price+1000;
      $query="SELECT * FROM products where productID='$id'"; // query for displaying
      $Result=mysqli_query($conn,$query);
      $row=mysqli_fetch_array($Result);

      $qry2="SELECT * FROM autobid where proID ='$id'";  
      $Result2=mysqli_query($conn,$qry2);
      $row2=mysqli_fetch_array($Result2);

      $wprice = $row2['value'];   // assign max value as winning price
      ?>
      <div class  = "row" style = "padding-top:150px;">
        <div class="card" style="width:750px; margin-left:250px;">
          <div class = "row">
            <div class = "col-lg-4 col-md-4">
              <?php
              echo"<img src=http://localhost/blissed/Public/Assets/upimages/".$row['image']." width = '250px' height = '300px'>";
              ?>
            </div>
            <div class = "col-lg-8 col-md-8">
              <h4 style = "margin-left:100px;">
                <?php
                echo $row['productName'];
                echo "<br>";
                ?>
              </h4>
              <?php
              echo "Product model: " .$row['model'];
              echo "<br>";
              echo "Description: ";
              echo $row['description'];
              echo "<br>";
              echo "Quantity: " .$row['quantity'];
              echo "<br>";
              echo "Current Winner: " .$row['buyer'];
              echo "<br>";
              echo "<br>";
              echo "<b>";
              echo "Current Price: Rs. ";
              echo $row['price'];
              echo "</b>";
              echo "<br>";
                               
              if($cbuyer == 'Null' || $Price>$wprice){
                echo "Enter your max value before bid";
                echo 
                '<form method="POST" name="autoform" >
                    <input type = "text" name = "autot">
                    <button type="submit" name = "auto" class="btn btn-primary" style="margin-left:50px;">Enter</button>
                </form>';
              }
              echo "<br>";
              echo "Choose Your Price";
              echo 
              '<form method="POST" name="CatagoryForm" >
                  <select name="Catagory" id="Catagory" onchange="fetch_select(this.value);">
                      <option>'.$price1.'</option>
                      <option>'.$price2.'</option>
                      <option>'.$price3.'</option>
                  </select>
                  <button type="submit" name="bid" class="btn btn-primary" style="margin-left:50px;">Bid Now</button>
              </form>
              ';
              ?>
            </div>
          </div>
        </div>
      </div>
      <?php ?>
      </div>
      <?php
    }
  }

  if (isset($_POST['auto'])) { // on submit max value

    $id = $_GET['bid'];
    $value = $_POST['autot'];
    $wuser=$_SESSION['username'];

    $atquery = "INSERT INTO autobid (proID,value,wuser)
                VALUES('$id','$value','$wuser') ON DUPLICATE KEY UPDATE value='$value', wuser='$wuser'";
    $atdisp = mysqli_query($conn,$atquery);
  } 

  if (isset($_POST['bid'])) {  //on submit bid now

	 
    $id=$_GET['bid'];
    $price=$_POST['Catagory'];
    $buyer=$_SESSION['username'];

    $abqry = "SELECT * FROM autobid WHERE proID ='$id'";
    $abRslt=mysqli_query($conn,$abqry);
    $abrw=mysqli_fetch_array($abRslt);
    $value = $abrw['value'];
    $wuser = $abrw['wuser'];

    $qry="SELECT * FROM products WHERE productID='$id'";
    $Rslt=mysqli_query($conn,$qry);
    $rw=mysqli_fetch_array($Rslt);      

    $postbuyer=$rw['buyer'];  // current winner of product
    $productname=$rw['productName'];
    $proprice = $rw['price'];
    $seller = $rw['user'];
    $squery = "SELECT * FROM users WHERE username ='$seller'"; //get email address to send mail
    $srslt = mysqli_query($conn,$squery);
    $srow = mysqli_fetch_array($srslt);
    $to = $srow['email']; 
      //echo $productname;
      // echo $postbuyer;

    if($price==$value){
      echo "<script> alert('This price option is unavailable try please try the next inceriment');</script>";
    }

    if($price < $value && $postbuyer =='Null' ){  // first bid on product

      $query1="UPDATE products SET price='$price',buyer='$buyer' WHERE productID='$id'";
      mysqli_query($conn,$query1);
      echo "1if";

      $message = $seller." Your product got a bid";
      $insert =  "INSERT INTO notifications (user,message,viewStatus,proID) VALUES ('$seller','$message','No',$id)";
      mysqli_query($conn,$insert);
      $subject = 'Bid Notification';

      $header = 'From: blissedbid@gmail.com';

      // use wordwrap() if lines are longer than 70 characters
      $message = wordwrap($message,70);

      // send email
      mail($to,$subject,$message,$header);
    }


    elseif($price < $value && $postbuyer==$wuser ){  // system bid on behalf holder of max value

      $atprice = $price + 50 ;
      $query="UPDATE products SET price='$atprice',buyer='$wuser' WHERE productID='$id'";
      mysqli_query($conn,$query);
      echo "2if";

      $message = $buyer." Some one bid higher than you BID AGAIN";
      $insert =  "INSERT INTO notifications (user,message,viewStatus,proID) VALUES ('$buyer','$message','No',$id)";
      mysqli_query($conn,$insert);

    }
    elseif($price > $value  ){ // someone exceed max value

      echo $postbuyer;

      $message = $postbuyer." Some one exceed you higher price BID AGAIN";
      $insert =  "INSERT INTO notifications (user,message,viewStatus,proID) VALUES ('$postbuyer','$message','No',$id)";
      mysqli_query($conn,$insert);

      $atprice = $price;
      $wuser = $buyer;
      $query1="UPDATE products SET price='$atprice',buyer='$wuser' WHERE productID='$id'";
      $query2="UPDATE autobid SET wuser='$wuser' WHERE productID='$id'";
      mysqli_query($conn,$query1);
      mysqli_query($conn,$query2);
      echo "3if";
   
    }
    echo "<meta http-equiv='refresh' content='0'>";

  }
  ?>
</body>


 <!--Footer--> 
  <div class = 'row' style = "margin-top:70px;">
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



