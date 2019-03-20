<?php 
 session_start();
if(isset($_GET['logout']))
{
    unset($_SESSION['username']);
	session_destroy();
    header('location:../../index.php');
    
    
	exit;
}



?>