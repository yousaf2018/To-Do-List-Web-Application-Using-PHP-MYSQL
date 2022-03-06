<?php 
session_start(); 
include "db_conn.php";
#Cheecking if post for eamil and password is set or not
if (isset($_POST['email']) && isset($_POST['password'])
    && isset($_POST['userName']) && isset($_POST['re_password'])) {
	#Function for cleaning data and avoiding from attacks
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$userName = validate($_POST['userName']);
	$user_data = 'uname='. $email. '&name='. $userName;
	#Check conditios if user unable to input data
	if (empty($email)) {
		header("Location: signup.php?error=Email is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($userName)){
        header("Location: signup.php?error=User name is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{
		#Sql query checking for email existance in the database
	    $sql = "SELECT * FROM users WHERE email='$email' ";
		$result = mysqli_query($conn, $sql);
		#Check conditions if email already exists
		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken try another&$user_data");
	        exit();
		}else {
		   #Insertion query in the database
           $sql2 = "INSERT INTO users(email, user_name, password) VALUES('$email', '$userName', '$pass')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}
?>