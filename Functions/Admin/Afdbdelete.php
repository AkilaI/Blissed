<?php
require_once('../../connection/dbconnection.php');
session_start();
if(isset($_GET['fid']))
{
$id=$_GET['fid'];



   $query="DELETE FROM feedbacks WHERE fbID ='$id'";



    mysqli_query($conn,$query);
     header('location:Afeedback.php');
}


?>