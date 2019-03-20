<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 170px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 130px;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    padding-top:150px;
    padding-bottom:0px;
    padding-left:20px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 14px;}
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="../../Functions/users/sellitem.php">Sell Item</a>
  <?php
    echo '<a href = "../../Functions/users/mypost.php?user='.$_SESSION['id'].'&name='.$_SESSION['username'].'"> My Post</a>';
    echo '<a href = "../../Functions/users/purchasingHistory.php?user='.$_SESSION['id'].'&name='.$_SESSION['username'].'"> Purchasing History</a>';
    echo '<a href = "../../Functions/users/Updateprofile.php?user='.$_SESSION['id'].'&name='.$_SESSION['username'].'"> Update Profile </a>';
    echo '<a href = "../../Functions/users/Notifications.php?user='.$_SESSION['id'].'&name='.$_SESSION['username'].'"> Notifications </a>';
    echo '<a href = "../../Functions/users/feedback.php?user='.$_SESSION['id'].'&name='.$_SESSION['username'].'"> Feedbacks </a>';?>
</div>

<div id="main">
<p>
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
</p>
</div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}
</script>
     
</body>
</html> 
