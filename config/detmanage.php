<?php
require_once('../../connection/dbconnection.php');
session_start();



$err = array();
$username = $_SESSION['username'];

/*$keys = array_keys($_POST);
$desired_keys = array('sdate');

foreach($desired_keys as $desired_key){
   if(in_array($desired_key, $keys)) continue;  // already set
   $_POST[$desired_key] = '';
}*/






// User Add Product


if (isset($_POST['sell_item'])) {
    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $model = mysqli_real_escape_string($conn, $_POST['model']);
    $desc = mysqli_real_escape_string($conn, $_POST['desc']); 
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $img=($_FILES['image']['name']);
    $sdate = mysqli_real_escape_string($conn, $_POST['sdate']);
    $edate = mysqli_real_escape_string($conn, $_POST['edate']);
    $category=$_POST["category"];
    $prostatus = 'No';
    $buyer = 'Null';
   

    $target="../../Public/Assets/upimages/";
    $target=$target.basename($_FILES['image']['name']);

  
    $img_check_query = "SELECT * FROM products WHERE image='$img'";
    $imresult = mysqli_query($conn,$img_check_query);
    $imgc = mysqli_fetch_assoc($imresult);
    
    if($img!=""){
        if($imgc['image']===$img){
            ?> <script type="text/javascript">
                alert("Image name already exist Please rename")</script>
            <?php
            
        }
    }   

    if(empty($brand)){
        $err['bname'] = "Brand name is Required";
    }

    
    if(empty($desc)){
        $err['desc'] = "Description is Required";
    }

    if(empty($price)){
        $err['price'] = "Starting Price  is Required";
    }

    if(empty($img)){
        $err['img'] = "Image  is Required";
    }

    if(empty($quantity)){
        $err['quan'] = "quantity is Required";
    }

    if(empty($sdate)){
        $err['sdate'] = "Starting Date is Required";
    }
    if(empty($edate)){
        $err['edate'] = "End Date is Required";
    }

    if(empty($category)){
        $err['cat'] = "Category is Required";
    }

    if($edate<$sdate){
        $err['date'] = "Higher end date is required";
    }



    if (count($err) == 0) {

        $query1 = "INSERT INTO products (productName,model,category,user,price,description,productStatus,quantity,startDate,endDate,buyer,image) 
        VALUES('$brand','$model','$category','$username','$price','$desc','$prostatus','$quantity','$sdate','$edate','$buyer','$img')";
        $result = mysqli_query($conn, $query1);

        move_uploaded_file($_FILES['image']['tmp_name'],$target);

        ?> <script type="text/javascript">
                alert("Item is succefully added!")</script>
            <?php

        /*if ( false===$result ) {
            printf("error: %s\n", mysqli_error($conn));
          }
          else {
            echo 'done.';
          }*/
        
    }


}

// User feedback

if(isset($_POST['feed'])){
    
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $feedback = " $message \n from $name ";


    $uquery =  "SELECT * FROM users WHERE username='$username'";
    $udisp=mysqli_query($conn,$uquery);
    $urow = mysqli_fetch_array($udisp);
    $uname = $urow['username'];
    $ucont = $urow['contact'];
    $uemail = $urow['email'];

    $fbqry = "INSERT INTO feedbacks(user,u_email,u_contact,feedback)
          VALUES ('$uname','$uemail','$ucont','$feedback')";

    mysqli_query($conn,$fbqry);






}

// post ad

if (isset($_POST['post_ad'])) {
 
    $img=($_FILES['image']['name']);
    $edate = mysqli_real_escape_string($conn, $_POST['edate']);
 
   echo $username;

    $target="../../Public/Assets/Images/";
    $target=$target.basename($_FILES['image']['name']);

  
    $img_check_query = "SELECT * FROM ads WHERE image='$img'";
    $imresult = mysqli_query($conn,$img_check_query);
    $imgc = mysqli_fetch_assoc($imresult);
    
    if($img!=""){
        if($imgc['image']===$img){
            ?> <script type="text/javascript">
                alert("Image name already exist Please rename")</script>
            <?php
            
        }
    }   


    if(empty($img)){
        $err['img'] = "Image  is Required";
    }

    if(empty($edate)){
        $err['edate'] = "End Date is Required";
    }


    if (count($err) == 0) {

        $owner = $_SESSION['username'];

        $query1 = "INSERT INTO ads (owner,image,endDate,display) 
        VALUES('$owner','$img','$edate','No')";
        $result = mysqli_query($conn, $query1);

        move_uploaded_file($_FILES['image']['tmp_name'],$target);

        ?> <script type="text/javascript">
                alert("Ad is succefully added!")</script>
            <?php



    }
}


?>
