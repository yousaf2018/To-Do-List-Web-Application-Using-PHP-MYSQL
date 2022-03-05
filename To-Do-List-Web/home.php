<?php 
session_start();

if (isset($_SESSION['email']) && isset($_SESSION['user_name'])) {

 ?>
<!doctype html>
<html lang="en">
     <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     <title>Home Page</title>
     </head>
     <body>
               <!-- Optional JavaScript -->
               <!-- jQuery first, then Popper.js, then Bootstrap JS -->
               <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
               <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
               <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
               <!-- Navigation bar -->
          <div class = "container-fluid">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light mx-auto">
                         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                         </button>
                              <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                                   <a class="navbar-brand " href="home.php">
                                        <img src="To_Do.svg" width="100" height="100" alt="Logo">
                                   </a>  
                                   <button class="btn btn-outline-success navbar-nav ml-auto" type="submit"><a href = "logout.php">Signout</a></button>
                              </div>
                    </nav>
          </div>
          <br><br>
          <!-- Fetching records from database and displaying in the table -->
          <?php require_once 'taskProcessing.php'; ?>
          <?php
               $sql = "SELECT * FROM tasks";
               $result = mysqli_query($conn, $sql);
               ?>
               <div class="container">
               <div class="row justify-content-center">
                    <table class="table">
                          <thead>
                              <tr>
                                   <th>Title</th>
                                   <th>Priority</th>
                                   <th>Label</th>
                              </tr>
                         </thead>
                         <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)): ?>
                         <tr>
                              <td><?php echo $row['Title'] ?></td>
                              <td><?php echo $row['Priority'] ?></td>
                              <td><?php echo $row['Label'] ?></td>
                         </tr>
                     <?php endwhile; ?>
                    </table>
               </div>
                         </div>
          <!-- Inserting new records in the database mysql -->
          <div class = "row justify-content-center">
               <form action="taskProcessing.php" method="POST">
                    <div class = "form-group">
                         <label class="text">Task Title</label>
                         <input type="text" name= "title" class="form-control" placeholder="Enter your task title">
                    </div>
                    <div class = "form-group">
                         <label class="text">Priority</label>
                                   <br>
                                   <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-secondary active">
                                             <input type="radio" name="options" value="Low" autocomplete="off" checked> Low
                                        </label>
                                        <label class="btn btn-secondary">
                                             <input type="radio" name="options" value="Medium" autocomplete="off"> Medium
                                        </label>
                                        <label class="btn btn-secondary">
                                             <input type="radio" name="options" value="High" autocomplete="off"> High
                                        </label>
                                   </div>                    
                    </div>
                    <div class = "form-group">
                         <label class="text">Label</label>
                         <input type="text" name= "label" class="form-control" placeholder="Enter your task Label">
                    </div>
                    <div class = "form-group">
                         <button type = "submit" class = "btn btn-primary justify-center" name="save">Create Task</button>
                    </div>
               </form>   
          </div>

     </body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>