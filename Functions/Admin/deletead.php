<?php
require_once('../../connection/dbconnection.php');
session_start();
if(isset($_GET['aid']))
{
$id=$_GET['aid'];



   $query="DELETE FROM ads WHERE adId ='$id'";



    mysqli_query($conn,$query);
     header('location:Manageads.php');
}


?>