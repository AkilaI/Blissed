<?php
require_once('../../connection/dbconnection.php');
session_start();

if(isset($_POST['feed'])){

  $uid = $_GET['user'];
 
  $uquery = "SELECT * FROM users WHERE id = '$uid'"; 
  $udisp=mysqli_query($uquery,$conn);
  $urow = mysqli_fetch_array($udisp);
  print_r($urow);
  $uname = $urow['username'];
  $ucont = $urow['contact'];
  $uemail = $urow['email'];
  $name = $_REQUEST ['name'];

  if(isset($_POST['feed'])){
    $name = $_REQUEST ['name'];
    $message = $_REQUEST ['message'];
 
    $feedback = "message: $message \n from'.$name.' ";

    $fbqry = "INSERT INTO feedbacks(user,u_email,u_contact,feedback)
              VALUES ('$uname','$uemail','$ucont','$feedback')";

    mysqli_query($conn,$fbqry);
  }
}
 

?>



<?php
