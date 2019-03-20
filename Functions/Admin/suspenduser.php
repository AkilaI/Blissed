<?php
require_once('../../connection/dbconnection.php');
session_start();
if(isset($_GET['uid']))
{
$id=$_GET['uid'];

   $susquery = "SELECT * FROM users WHERE id = '$id'";
   $susrsl = mysqli_query($conn,$susquery);
   $susrow = mysqli_fetch_array($susrsl);

   $to = $susrow['email'];
   $message = "Your Account is currently suspended your banned from blissed untill further notice";

   $subject = 'Account Notification';

   $header = 'From: blissedbid@gmail.com';

   // use wordwrap() if lines are longer than 70 characters
   $message = wordwrap($message,70);

   // send email
   mail($to,$subject,$message,$header);

   $query="UPDATE users SET status = 'Suspended' WHERE id ='$id'";



    mysqli_query($conn,$query);
     header('location:usermanage.php');
}


?>