<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP TO DO LIST</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <!-- Signup view -->
     <form action="signup-check.php" method="post">
     <img src="To_Do.svg" alt="Logo is unable to read" class = "center">
     	<!-- Checking different conditios if there is error occurred -->
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
     	<!-- Getting info from users for Signup process -->

          <label class = "text">Email</label>
          <?php if (isset($_GET['email'])) { ?>
               <input type="text" 
                      name="email" 
                      placeholder="Please enter your email here"
                      value="<?php echo $_GET['email']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="email" 
                      placeholder="Please enter your email here"><br>
          <?php }?>

          <label class = "text">User Name</label>
          <?php if (isset($_GET['userName'])) { ?>
               <input type="text" 
                      name="userName" 
                      placeholder="Please enter your user name here"
                      value="<?php echo $_GET['userName']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="userName" 
                      placeholder="Please enter your user name here"><br>
          <?php }?>


     	<label class = "text">Password</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password"><br>

          <label class = "text">Re Password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Re_Password"><br>

     	<button type="submit">Sign Up</button>
          <a href="index.php" class="ca">Already have an account?</a>
     </form>
</body>
</html>