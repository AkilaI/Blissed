<?php
require_once('../../connection/dbconnection.php');
session_start();
if(isset($_GET['uid']))
{
$id=$_GET['uid'];

$delquery = "SELECT * FROM users WHERE id = '$id'";
$delrsl = mysqli_query($conn,$delquery);
$delrow = mysqli_fetch_array($delrsl);

$to = $delrow['email'];
$message = "Your Account is Removed. You can no longer login to blissed using previous account";

$subject = 'Account Notification';

$header = 'From: blissedbid@gmail.com';

// use wordwrap() if lines are longer than 70 characters
$message = wordwrap($message,70);


   $query="DELETE FROM users WHERE id ='$id'";



    mysqli_query($conn,$query);
     header('location:usermanage.php');
}


?>