<?php
require_once('../../connection/dbconnection.php');
session_start();
if(isset($_GET['aid']))
{
$id=$_GET['aid'];



   $query="UPDATE ads SET display = 'Yes' WHERE adId ='$id'";



    mysqli_query($conn,$query);
     header('location:Manageads.php');
}


?>