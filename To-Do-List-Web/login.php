<?php 

session_start(); 
include "db_conn.php";
#Checking if there NUll value or not
if (isset($_POST['userName']) && isset($_POST['password'])) {
	#Function for cleaning data and avoiding from attacks
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$uname = validate($_POST['userName']);
	$pass = validate($_POST['password']);
	#Informing the user if user unable to input
	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
        #SQL query for authentication
		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";
		$result = mysqli_query($conn, $sql);
		#Check conditions for authentication if input record is valid or not
		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['email'] = $row['email'];
				$_SESSION['id'] = $row['id'];
            	header("Location: home.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}

?>