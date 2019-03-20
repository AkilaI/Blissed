<?php 

    session_start();
   
		$username = $_SESSION['username'];
	if(!isset($_SESSION['username']))
	{
		header('location:index.php');
		exit;
	}
	
?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Users</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  <link href="./styles/mainstyle.css" rel="stylesheet" type="text/css" >
  <link href="./styles/style1.css" rel="stylesheet" type="text/css" >
  <script type="text/javascript" src="./script/script.js"></script>
  <style type="text/css">
    html,
    body,
    header,
    .carousel {
      height: 60vh;
    }

    @media (max-width: 740px) {
      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    

      <!-- Brand -->
      <a class="navbar-brand">
        <img src="./img/bli.jpg" height="100px" width="200px"  >
       
      </a>

     

      <!-- Collapse -->
      
      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link waves-effect" href="Users.php" target="main">Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="Auctions.php">Auctions</a>
          </li>
          <li class="nav-item">
          <a class="nav-link waves-effect" href="Admin.php">Dashboard</a>
          </li>
        </ul>

        <ul class="navbar-nav mx-auto">
        <li class="nav-item">
        <form class="form-inline">
         
            <input class="form-control" type="search" placeholder="Quick Navigation" aria-label="Search" width = "250px">
            <i class="fa fa-search rounded-circle" aria-hidden="false"></i>
          
        </form>
		 </li>
        </ul>
        <!-- Right -->
        <ul  class="navbar-nav nav-flex-icons">
          
          <li class="nav-item">
            <a class="nav-link waves-effect" href = "../index.php">
              Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href = "../logout.php?logout">
              Logout
            </a>
          </li>
		  <li class="nav-item">
            <a class="nav-link waves-effect" target="_blank">
              Feedback
            </a>
          </li>
          
        </ul>

      </div>

    
  </nav>
  <!-- Navbar -->

  <nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">

    <!-- Navbar brand -->
    <span class="navbar-brand">Categories:</span>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    

  </nav>

  <!--Carousel Wrapper-->
  <div id="carousel-example-1z" class="carousel slide carousel-fade pt-4" data-ride="carousel">

    

    <!--Slides-->
    <div class="carousel-inner" role="listbox">

		<div class="lnav">
					<ul>
						<li><a class="active" href="AllUsers.php" target="ifra">All users</a></li>
						<li><a href="Verified.html" target="ifra">Verified</a></li>
						<li><a href="Banned.html" target="ifra">Banned</a></li>
						<li><a href="Deleted.html" target="ifra">Deleted</a></li>
					</ul>
			</div>
			
			<div class="contlogin">
				<form class = "search-form">
					<input type="text" placeholder="Username">
					<input type="text" placeholder="User ID">
					<button class="button">Search</button>
				</form><br><br><br><br>
				<center><iframe src="AllUsers.html" height="285" width="850" name="ifra"></iframe></center>
			</div>
    </div>
    </div>
    <!--/.Slides-->

    

  </div>
  
 
  </body>

  <!--Footer-->
  <footer class="page-footer text-center font-small mt-4 wow fadeIn">

    <!-- Social icons -->
    <div class="pb-4">
      <a href="https://www.facebook.com/mdbootstrap" target="_blank">
        <i class="fa fa-facebook mr-3"></i>
      </a>

      <a href="https://twitter.com/MDBootstrap" target="_blank">
        <i class="fa fa-twitter mr-3"></i>
      </a>

      <a href="https://www.youtube.com/watch?v=7MUISDJ5ZZ4" target="_blank">
        <i class="fa fa-youtube mr-3"></i>
      </a>

      <a href="https://plus.google.com/u/0/b/107863090883699620484" target="_blank">
        <i class="fa fa-google-plus mr-3"></i>
      </a>

      <a href="https://dribbble.com/mdbootstrap" target="_blank">
        <i class="fa fa-dribbble mr-3"></i>
      </a>

      <a href="https://pinterest.com/mdbootstrap" target="_blank">
        <i class="fa fa-pinterest mr-3"></i>
      </a>

      <a href="https://github.com/mdbootstrap/bootstrap-material-design" target="_blank">
        <i class="fa fa-github mr-3"></i>
      </a>

      <a href="http://codepen.io/mdbootstrap/" target="_blank">
        <i class="fa fa-codepen mr-3"></i>
      </a>
    </div>
    <!-- Social icons -->

    <!--Copyright-->
    <div class="footer-copyright py-3">
      © 2018 Copyright:
      
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>


</html>