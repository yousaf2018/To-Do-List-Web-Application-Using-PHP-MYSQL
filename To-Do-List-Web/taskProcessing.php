<?php
include "db_conn.php";
if (isset($_POST['save'])){

    function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

    $title = validate($_POST['title']);
    $priority = validate($_POST['options']);
    $label = validate($_POST['label']);

	$user_data = 'Title='. $title. '&='. $userName;


	if (empty($title || empty($priority) || empty($label))) {
		header("Location: home.php");
	    exit();
	}

	else{

	    $sql = "INSERT INTO tasks (Title, Priority, Label) VALUES ('$title', '$priority', '$label')";
		$result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: home.php");
            exit();
        }else {
            header("Location: home.php");
            exit();
        }
	}
}

?>