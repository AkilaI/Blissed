
<?php
include('../../config/blserver.php');

//get the current login and the details
	$email="";
	$password="";
	$contact="";
	$address="";
	
		
	if (isset($_GET["user"])){

		$searchid=$_GET["user"];
		echo $searchid;
		
		$con=mysqli_connect("localhost","root","");
		
		
		$database=mysqli_select_db($con,"blissed");
		
		
		$sql="SELECT * FROM users WHERE id='$searchid' ";
		
		
		$result=mysqli_query($con,$sql);
	 
		if($row = mysqli_fetch_array($result)){
			$email=$row[2];
			$password=$row[3];
			$contact=$row[4];
			$address=$row[5];
			
			//echo "Records Updated";
		}else{
			echo "Not  This Record In Database<br/>";	
		}
		
		//CLOSE CONNECTION
		mysqli_close($con);
		
		
	}
?>
<?php
//update query
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$searchid=$_GET["user"];


		$con=mysqli_connect("localhost","root","");
		
		
		$database=mysqli_select_db($con,"blissed");
		
		
		$sql="UPDATE users SET email='$_POST[email]' , contact='$_POST[contact]' , address='$_POST[address]' WHERE id='$searchid'";
		echo "<meta http-equiv='refresh' content='0'>";
		
		if (mysqli_query($con, $sql)) {?>
			<script type="text/javascript">
                alert("Profile Succesfully Updated")
			</script>
				
				<?php
		} 
		else {?>
			<script type="text/javascript">
                alert("Error Updating Profile")</script>
				<?php
		}		

		mysqli_close($con);
	}
?>


<!DOCTYPE>
<html lang="en">
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
  		
  	<!-- Font Awesome -->
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  	<!-- Bootstrap core CSS -->
  		<link href="../../Public/css/css/bootstrap.min.css" rel="stylesheet">
  	<!-- Material Design Bootstrap -->
  		<link href="../../Public/css/css/mdb.min.css" rel="stylesheet">
  	<!-- Your custom styles (optional) -->
  		<link href="../../Public/css/style.min.css" rel="stylesheet">
  		<link href="../../Public/css/style.css" rel="stylesheet">
		  <link href="../../Public/css/customstyles.css" rel="stylesheet">
	<title>Update Profile</title>
</head>

<body>

	<div class="container">
			<div class="row main">
				<div class="main-login main-center" style = "href=//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                	<h1>Update Profile</h1>
					<form method="post" action="#" name="searchadmin" style="text-align:center" >
                    	
                        
                        <div class="form-group">
                        	<label for="email" class="cols-sm-2 control-label">Email :</label>
								<div class="cols-sm-10" style ="color:red;">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
											<input type="email" class="form-control" name="email" id="adminemail" placeholder="Enter Email" value="<?php echo $email; ?>" />
                                    </div>
								</div>
						</div>   
                        
                            
                        
                        <div class="form-group">
                        	<label for="contact" class="cols-sm-2 control-label">Contact :</label>
								<div class="cols-sm-10" style ="color:red;">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-phone fa-md" aria-hidden="true"></i></span>
											<input type="text" class="form-control" name="contact" id="admincontact" placeholder="Enter Contact Number" value="<?php echo $contact; ?>" />
                                    </div>
								</div>
						</div>    
                        
                        <div class="form-group">
                        	<label for="contact" class="cols-sm-2 control-label">Address :</label>
								<div class="cols-sm-10" style ="color:red;">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-address-book fa-md" aria-hidden="true"></i></span>
											<input type="text" class="form-control" name="address" id="adminaddress" placeholder="Enter Address" value="<?php echo $address; ?>" />
                                    </div>
								</div>
						</div>    
                        
                        
                        
                        <div class="form-group justify-content-center ">
							<button type="submit" id="submit" name = "update" class="btn btn-deep-orange btn-lg">update</button>
						</div>  
					</form>
         <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   			 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   		 <!-- Include all compiled plugins (below), or include individual files as needed -->
    		<script src="../Public/js/bootstrap.min.js"></script>
</body>

</html> 
