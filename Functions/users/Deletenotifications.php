<?php
require_once('../../connection/dbconnection.php');
session_start();
if(isset($_GET['msgid'])){
    $id=$_GET['msgid'];
    $delq="DELETE FROM notifications WHERE msgID='$id'";
    mysqli_query($conn,$delq);

    header('location:Notifications.php?user='.$_SESSION['id'].'&name='.$_SESSION['username']);
}


?>