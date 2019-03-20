<?php
include('../../config/blserver.php');
//search id
	$pid="";
	$pname="";
	$category="";
	$enddate="";
	
		
	if (isset($_REQUEST["searchid"])){

			$searchid=$_REQUEST["searchid"];
		
		
		$con=mysqli_connect("localhost","root","");
		
		
		$database=mysqli_select_db($con,"blissed");
		
		
		$sql="SELECT * FROM products WHERE productID='$searchid' ";
		
		
		$result=mysqli_query($con,$sql);
	 
		if($row = mysqli_fetch_array($result)){
			$pid=$row[0];
			$pname=$row[1];
			$category=$row[2];
			$enddate=$row[3];
			
			//echo "Records Updated";
		}else{
			echo "<script> alert('No such record in database');</script>";	
		}
		
	//CLOSE CONNECTION
		mysqli_close($con);
		
		
		}
?>
<?php
//Delete query
	if (isset($_REQUEST["productID"])){

		$did=$_POST["productID"];

		$con=mysqli_connect("localhost","root","");
		
		
		$database=mysqli_select_db($con,"blissed");
		
		
	$sql="DELETE FROM products WHERE productID='$did'";
		
		
	if (mysqli_query($con, $sql)) {
		echo "<script> alert('Post deleted succesfully');</script>";
	} else {
		echo "Error deleting record: " . mysqli_error($con);
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
	<title>Delete  Post</title>
</head>

<body>
	<div class="container">
			<div class="row main">
				<div class="main-login main-center">
                	<h1>Delete Post</h1>
					<form method="post" action="#" name="searchpost" style="text-align:center" >
                    	
                    	<div class="form-group">
							<label for="enterpid" class="cols-sm-2 control-label">Enter Product Id:</label>
							<div class="cols-sm-10" style ="color:red;">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
										<input type="text" class="form-control" name="searchid" id="adminname"  placeholder="Enter product Id" size="10px" value="<?php echo $pid; ?>"/>
								</div>
							</div>
						</div>
                
						<div class="form-group justify-content-center ">
							<button type="submit" id="submit" name = "search" class="btn btn-deep-orange btn-lg">Search</button>
						</div>
					</form>
                    
					<form method="post" action="#" name="deleteadmin" style="text-align:center"><br/ >
                    	
                        <div class="form-group">
                        	<label for="id" class="cols-sm-2 control-label">Product ID :</label>
								<div class="cols-sm-10" style ="color:red;">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
											<input type="text" class="form-control" name="productID" id="adminname" placeholder="Enter Product Id" value="<?php echo $pid; ?>" />
                                    </div>
								</div>
						</div>
                        
                        <div class="form-group">
                        	<label for="username" class="cols-sm-2 control-label">Product Name :</label>
								<div class="cols-sm-10" style ="color:red;">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
											<input type="text" class="form-control" name="productname" id="adminname" placeholder="Enter Product Name" value="<?php echo $pname; ?>" />
                                    </div>
								</div>
						</div>
                        
                        <div class="form-group">
                        	<label for="category" class="cols-sm-2 control-label">Category :</label>
								<div class="cols-sm-10" style ="color:red;">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
											<input type="text" class="form-control" name="category" id="adminemail" placeholder="Enter Category" value="<?php echo $category; ?>" />
                                    </div>
								</div>
						</div>   
                        
                        <div class="form-group">
                        	<label for="enddate" class="cols-sm-2 control-label">End Date :</label>
								<div class="cols-sm-10" style ="color:red;">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
											<input type="text" class="form-control" name="enddate" id="password_1" placeholder="Enter End Date" value="<?php echo $enddate; ?>" />
                                    </div>
								</div>
						</div>    
                        
                          
                        
                        
                        
                        <div class="form-group justify-content-center ">
							<button type="submit" id="submit" name = "update" class="btn btn-deep-orange btn-lg">Delete</button>
                            
						</div>  
					</form>
         <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   			 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   		 <!-- Include all compiled plugins (below), or include individual files as needed -->
    		<script src="../Public/js/bootstrap.min.js"></script>
</body>

</html> 
