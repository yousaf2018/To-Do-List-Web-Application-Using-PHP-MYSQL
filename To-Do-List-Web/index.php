<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="login.php" method="post">
	   <img src="To_Do.svg" alt="Logo is unable to read" class = "center">
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label class = "text">Username</label>
     	<input type="text" name="userName" placeholder="Enter your user name here"><br>

     	<label class = "text">Password</label>
     	<input type="password" name="password" placeholder="Enter your password here"><br>

     	<button type="submit" >Login</button>
          <a href="signup.php" class="ca">Create an account</a>
     </form>
</body>
</html>