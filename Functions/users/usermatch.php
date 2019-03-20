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
    
  if(isset($_GET['bid'])){ // on click right to match 

    $uname= $_SESSION['username'];
    $id=$_GET['bid'];

    $query="SELECT * FROM products where productID ='$id'";
    $Result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($Result);
    $UserName=$row['user'];


    if($UserName==$uname){ // check if bidder = seller
    
      $message="This Is Your Product, You Can Not Buy Your Own Product";
      $url = "../users/userhome.php?user=".$_SESSION['id'].'&subtype='.$_SESSION['subtype'];
      echo "<script type = 'text/javascript'>
              alert('This Is Your Product, You Can Not Buy Your Own Product');
              window.location = '$url';
        
            </script>";
      exit();

    }
    else{
      
      echo '<a href="Home.php"> <img src="Image/back.jpg"  width="80px" height="80px"  alt="Bid" /> </a>';
      $qry="SELECT * FROM products where productID ='$id'";

      $Result=mysqli_query($conn,$qry);

      $row=mysqli_fetch_array($Result);

      $Price=$row['price'];

      $rtmcqry = "SELECT * FROM rtmcard WHERE user_name ='$uname' AND status = 'Available'";
      $rtmresult = mysqli_query($conn,$rtmcqry);
      $rtmrow = mysqli_fetch_assoc($rtmresult);
      $rtmid = $rtmrow['card_id'];

      $query="SELECT * FROM products where productID='$id'"; // Query for displaying
      $Result=mysqli_query($conn,$query);
      $row=mysqli_fetch_array($Result);?>

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
              echo "<br>";
              echo "<b>";
              echo "Current Price: Rs. ";
              echo $row['price'];
              echo "</b>";
              echo "<br>";
              echo "<br>";
              echo "Select Your Right to Match Card ID";
              echo 
              '<form method="POST" name="CatagoryForm"  onsubmit="return validform();">
                  <select name="Catagory" id="Catagory" onchange="fetch_select(this.value);">
                      <option>'.$rtmid.'</option>              
                  </select>
                  <button type="submit" class="btn btn-primary" style="margin-left:50px;">Use The Card</button>
              </form>
              ';
              ?>
            </div>
          </div>
        </div>
      </div>
      <?php  ?>
      </div>
      <?php
    }
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {  

    $id=$_GET['bid'];
    $rtmid=$_POST['Catagory'];
    $buyer=$_SESSION['username'];
    echo $rtmid;


    if($rtmid !=''){  // if only rtm cards available

      $qry="SELECT * FROM products WHERE productID='$id'";
      $Rslt=mysqli_query($conn,$qry);
      $rw=mysqli_fetch_array($Rslt);

      $postbuyer=$rw['buyer'];
      $proprice = $rw['price'];
      //echo $productname;
      // echo $postbuyer;
      if($postbuyer != $buyer){
        $message=$postbuyer." Someone Used their right to match card to match your Bid price".$proprice." on product ".$productname.'! Sorry you no longer have product please try a simillar product ';

        $insert="INSERT INTO notifications(user,message,viewStatus,proID) values('$postbuyer','$message','No','$id')";
        mysqli_query($conn,$insert);
        echo "<meta http-equiv='refresh' content='0'>";
      }


      $query="UPDATE products SET buyer='$buyer',productStatus='Yes' where productID='$id'";

      mysqli_query($conn,$query);
      $query1="UPDATE rtmcard SET status = 'Used' where card_id='$rtmid'";
      mysqli_query($conn,$query1);
      $query = "UPDATE products SET productStatus = 'Yes' WHERE productID = '$productid'";
      mysqli_query($conn,$query);

      $seller = $row['user'];
      $product = $row['productName'];
            
      $view_query = "SELECT * FROM products WHERE productID='$id'";
      $disp = mysqli_query($conn, $view_query);
      $row = mysqli_fetch_array($disp);

      $buyer = $row['buyer'];
      $productid = $row['productID'];
      $seller = $row['user'];
      $product = $row['productName'];

      $qry1 = "SELECT * FROM users WHERE username = '$seller'"; // get seller details
      $result1 = mysqli_query($conn,$qry1);
      $row1 = mysqli_fetch_array($result1);
      $sname = $row1['username'];
      $scont = $row1['contact'];
      $semail = $row1['email'];
      $saddr = $row1['address'];

      $qry2 = "SELECT * FROM users WHERE username = '$buyer'"; // get buyer details
      $result2 = mysqli_query($conn,$qry2);
      $row2 = mysqli_fetch_array($result2);
      $bname = $row2['username'];
      $bcont = $row2['contact'];
      $bemail = $row2['email'];
      $baddr = $row2['address'];

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

      $url = "../users/userhome.php?user=".$_SESSION['id'].'&subtype='.$_SESSION['subtype'];
      echo"<script type = 'text/javascript'>
            alert('Congratulations! You bought the product please check notifications for further details');
            window.location = '$url';
      
          </script>";
    }
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
</html>


