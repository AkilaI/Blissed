<?php
require_once('../../connection/dbconnection.php');
session_start();
if(isset($_GET['msgid']))
{
$id=$_GET['msgid'];



   $query="UPDATE notifications SET viewStatus = 'Yes' where msgID='$id'";



    mysqli_query($conn,$query);
     header('location:Notifications.php?user='.$_SESSION['id'].'&name='.$_SESSION['username']);
}


?>