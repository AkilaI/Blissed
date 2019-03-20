<?php
include("../../config/blserver.php");

$keys = array_keys($errors);
$desired_keys = array('luname', 'lpsd');

foreach($desired_keys as $desired_key){
   if(in_array($desired_key, $keys)) continue;  // already set
   $errors[$desired_key] = '';
}
?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<!-- Website CSS style -->
		<link href="../../Public/css/css/bootstrap.min.css" rel="stylesheet">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>SignIn</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="../../Public/css/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../../Public/css/css/mdb.min.css" rel="stylesheet">
  <!-- custom styles -->
  <link href="../../Public/css/css/style.min.css" rel="stylesheet"> 
  <link href="../../Public/css/style.css" rel="stylesheet">


</head>

<div class="container">
			<div class="row main">
				<div class="main-login main-center">
				<h1>Sign In</h1>
					<form class="" method="post" action="signin.php">
					
					<div class="form-group" >
							<label for="name" class="cols-sm-2 control-label">Username</label>
							<div class="cols-sm-10" style ="color:red;">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="username" id="usernamer"  placeholder="Enter your username"/>
									
							
								</div>
								<?php 
									echo $errors['luname']?>
							</div>
						</div>
						

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10" style ="color:red;">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password_1" id="password_1"  placeholder="Enter your Password"/>
								</div>
								<?php 
									echo $errors['lpsd']?>
							</div>
                        </div>
                        
                        <div class="form-group justify-content-center ">
							<button type="submit" id="submit" name = "log_user" class="btn btn-deep-orange btn-lg">Log In</button>
                        </div>

						<p> Don't Have a Account? <a href = "signup.php">Signup</a></p>
</form>



