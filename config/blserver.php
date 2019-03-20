<?php
require_once('../../connection/dbconnection.php');
session_start();

$username = "";
$email    = "";
$adminname = "";
$adminemail = "";
$errors = []; 
$out = "";
$num_rows="";

$keys = array_keys($_POST);
$desired_keys = array('subtype');

foreach($desired_keys as $desired_key){
   if(in_array($desired_key, $keys)) continue;  // already set
   $_POST[$desired_key] = '';
}



// REGISTER USER
if (isset($_POST['reg_user'])) {
  
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $subtype = $_POST["subtype"];


 
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE username= '$username' OR email= '$email'";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc( $result);


// sql query check
 /* if ($result) {
     $result = mysqli_fetch_assoc($result);
     echo "$result";
  }
  else {
     echo mysqli_error($conn);
  }
  return $result;*/
        if ($user) { // if user exists
            if ($user['username'] === $username) {
                $errors['euname'] = "Username already exists";
            }
            if ($user['email'] === $email) {
                $errors['eemail'] = "email already exists";
            }
        }

        if(empty($username)){
            $errors['uname']="Username is Required";
        }

        if(empty($email)){
            $errors['email']="Email is Required";
        }
   
        if(empty($password_1)){
            $errors['psd'] = "Password is Required";
        }

        if(strlen($password_1)<8){
            $errors['psdlen'] = "Password should be atleast 8 characters";
        }
   
        if ($password_1!=$password_2){
            $errors['dpsd'] = "Password does not match";
        }
        if(empty($contact)){
            $errors['con'] = "Contact is Required";
        }
        if(empty($address)){
            $errors['add'] = "Address is Required";
        }
        if(empty($subtype)){
            $errors['sub'] = "subtype is Required";
        }
   
   
//echo count($errors);


  // Add data to database if there are no errors
        if (count($errors) == 0) {
            $pswd = md5($password_1);//encrypt the password before saving in the database
            
            
            $query = "INSERT INTO users (username,email,password,contact,address,subtype,status) 
                      VALUES('$username', '$email', '$pswd','$contact','$address','$subtype','Active')";
            mysqli_query($conn, $query);

            if($subtype == '1 Month'){

                $query2 = " INSERT INTO rtmcard (subtype,user_name,status)
                            VALUES('$subtype','$username','Available')";
                mysqli_query($conn,$query2);
            }

            if($subtype == '3 Months'){

                $query3 = " INSERT INTO rtmcard (subtype,user_name,status)
                VALUES('$subtype','$username','Available'),('$subtype','$username','Available')";
                mysqli_query($conn,$query3);
            }


            
            $_SESSION['username'] = $username;
  	        $_SESSION['success'] = "You are now logged in :";// not used
            header('location: ../../Functions/main/signin.php');
            
        }
}

// Log User

if(isset($_POST['log_user'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);


    if(empty($username)){
        $errors['luname'] = "username is Required";    
    }


    if(empty($password_1)){
        $errors['lpsd'] = "Password is Required";
        
    }

    if(count($errors)==0){
        $password = md5($password_1);
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $out = mysqli_query ($conn, $query);
        $result = mysqli_fetch_assoc($out);
        $u = $result['subtype'];
        $stat = $result['status'];
        $num_rows = mysqli_num_rows($out);

            $keys = array_keys($errors);
            $desired_keys = array('luname', 'lpsd');

        foreach($desired_keys as $desired_key){
        if(in_array($desired_key, $keys)) continue;  // already set
        $errors[$desired_key] = '';
        }


  
    

    if($num_rows==1){
        if($u != 'Admin' && $stat!= 'Suspended'){

        $_SESSION['username'] = $username;
        $_SESSION['id'] = $result['id'];
        $_SESSION['subtype'] = $u;
        $_SESSION['success'] = "You are logged in as :  ";
        
        header('location:../users/userhome.php?user='.$_SESSION['id'].'&subtype='.$_SESSION['subtype']);}
        elseif($u=='Admin'){
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $result['id'];
            $_SESSION['subtype'] = $u;
            $_SESSION['success'] = "You are logged in as :  ";
            header('location:../Admin/Admin.php?user='.$_SESSION['id'].'&subtype='.$_SESSION['subtype']);

        }
    }else{
        $errors['lcomb'] =  "Wrong username/password combination";
        ?><script type="text/javascript">
                alert("Wrong username/password combination")</script>
                <?php
        
        }
    }

}

//Register Admin

if (isset($_POST['reg_admin'])) {
  
    $username = mysqli_real_escape_string($conn, $_POST['adminname']);
    $email = mysqli_real_escape_string($conn, $_POST['adminemail']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
    $contact = mysqli_real_escape_string($conn, $_POST['admincontact']);
    $address = mysqli_real_escape_string($conn, $_POST['adminaddress']);
    $subtype = $_POST["subtype"];


 
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE username= '$username' OR email= '$email'";
    $result = mysqli_query($conn, $user_check_query);
    $admin = mysqli_fetch_assoc( $result);


// sql query check
 /* if ($result) {
     $result = mysqli_fetch_assoc($result);
     echo "$result";
  }
  else {
     echo mysqli_error($conn);
  }
  return $result;*/
        if ($admin) { // if user exists
            if ($admin['username'] === $username) {
                $errors['euname'] = "Adminname already exists";
            }
            if ($admin['email'] === $email) {
                $errors['eemail'] = "email already exists";
            }
        }

        if(empty($username)){
            $errors['uname']="Adminname is Required";
        }

        if(empty($email)){
            $errors['email']="Email is Required";
        }
   
        if(empty($password_1)){
            $errors['psd'] = "Password is Required";
        }

        if(strlen($password_1)<8){
            $errors['psdlen'] = "Password should be atleast 8 characters";
        }
   
        if ($password_1!=$password_2){
            $errors['dpsd'] = "Password does not match";
        }
        if(empty($contact)){
            $errors['con'] = "Contact is Required";
        }
        if(empty($address)){
            $errors['add'] = "Address is Required";
        }
        if(empty($subtype)){
            $errors['sub'] = "subtype is Required";
        }
   
   
//echo count($errors);


  // Add data to database if there are no errors
        if (count($errors) == 0) {
    	    $pswd = md5($password_1);//encrypt the password before saving in the database
            $query = "INSERT INTO users (username,email,password,contact,address,subtype,status) 
  			          VALUES('$username', '$email', '$pswd','$contact','$address','$subtype','Active')";
  	        mysqli_query($conn, $query);
            ?><script type="text/javascript">
                alert("Admin Succesfully Added")</script>
            <?php
        }
}




