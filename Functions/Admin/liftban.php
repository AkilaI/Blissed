<?php
require_once('../../connection/dbconnection.php');
session_start();
if(isset($_GET['uid']))
{
$id=$_GET['uid'];

$liftquery = "SELECT * FROM users WHERE id = '$id'";
$liftrsl = mysqli_query($conn,$liftquery);
$liftrow = mysqli_fetch_array($liftrsl);

$to = $liftrow['email'];
$message = "Your Suspension is lifted Welocome back to blissed";

$subject = 'Account Notification';

$header = 'From: blissedbid@gmail.com';

// use wordwrap() if lines are longer than 70 characters
$message = wordwrap($message,70);

// send email
mail($to,$subject,$message,$header);




   $query="UPDATE users SET status = 'Active' WHERE id ='$id'";



    mysqli_query($conn,$query);
     header('location:usermanage.php');
}


?>