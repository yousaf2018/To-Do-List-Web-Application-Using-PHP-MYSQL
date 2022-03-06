<?php
include "db_conn.php";
#Check conditions what kind of operation is required
if (isset($_POST['save'])){
	#Function for cleaning data and avoiding from attacks
    function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

    $title = validate($_POST['title']);
    $priority = validate($_POST['options']);
    $label = validate($_POST['label']);
	$id = $_POST['id'];
	$user_data = 'Title='. $title. '&='. $priority;

	#Return to home page if user unable to input
	if (empty($title || empty($priority) || empty($label))) {
		header("Location: home.php");
	    exit();
	}

	else{
		#Sql query for insertion 
	    $sql = "INSERT INTO tasks (user_id, Title, Priority, Label) VALUES ('$id', '$title', '$priority', '$label')";
		$result = mysqli_query($conn, $sql);
        if ($result) {
			$_SESSION['message'] = "Record is inserted successfully";
			$_SESSION['msg_type'] = "success";
            header("Location: home.php");
        }else {
            header("Location: home.php");
        }
	}
}
#Check condition if user clicks on delete 
if (isset($_GET['delete'])){
		#Getting id for deletion by using get method
		$id = $_GET['delete'];
		$sql = "delete from tasks where id = '$id'";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			header("Location: home.php");
		}else {
			header("Location: home.php");
		}
}
#Check condition if user click on edit
if (isset($_GET['edit'])){
		session_start();
		#By making update true, create button will be change with update button
		$_SESSION['update'] = "True";
		header("Location: home.php");
}

#Check condition if user click on update button 
if (isset($_POST['update'])){
	   session_start();
	   #Getting id for updation in the record
	   $updateID = $_SESSION['updateID'];
	   #Function for cleaning the data to avoid attacks 
	   function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

    $title = validate($_POST['title']);
    $priority = validate($_POST['options']);
    $label = validate($_POST['label']);
	$user_data = 'Title='. $title. '&='. $priority;
	#Returning to home page if user unable to input properly
	if (empty($title || empty($priority) || empty($label))) {
		header("Location: home.php");
	    exit();
	}

	else{
		#Sql query for updation 
	    $sql = "UPDATE tasks set Title = '$title', Priority = '$priority', Label = '$label' where id = $updateID";
		$result = mysqli_query($conn, $sql);
        if ($result) {
			$_SESSION['message'] = "Record is updated successfully";
			$_SESSION['msg_type'] = "success";
			unset($_SESSION['update']);
            header("Location: home.php");
        }else {
           	header("Location: home.php");
        }
	}
}
?>
