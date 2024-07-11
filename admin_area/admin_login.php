<!-- connect files -->
<?php
 include('../includes/connect.php');
 include('../functions/common_function.php');
 @session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-aquiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin login</title>
   <!-- bootstrap css link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- font awesome link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
  body{
    overflow: ;
  }
</style>
  </head>
  <body>
    <div class="container-fluid m-3">
      <h2 class="text-center mb-5">
        Admin Login
      </h2>
      <div class="row d-flow justify-content-center ">
        <div class="col-lg-6 col-xl-5">
          <img src="../images/IMG-20221031-WA0049.jpg" alt="Admin Registration" class="img-fluid">
        </div>
        <div class="col-lg-6 col-xl-5">
            <form action="" method="post">
              <div class="form-outline mb-4">   
              <label for="username" class="form-label">Username</label>
              <input type="text" id="username" name="username" placeholder="Enter your username" required="required" class="form-control">
              </div>
              <div class="form-outline mb-4">   
              <label for="password" class="form-label">Password</label>
              <input type="password" id="password" name="password" placeholder="Enter your password" required="required" class="form-control">
              </div>
              <div>
                <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_login" value="Login">
                <p class="small fw-bold mt-2 p-1">Don't you have an account? <a href="admin_registration.php">Register</a> </p>
              </div>
            </form>
        </div>
      </div>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

<?php

if(isset($_POST['admin_login'])){
  $admin_username=$_POST['username'];
  $admin_password=$_POST['password'];
  
  $select_query="Select * from `admin_table` where admin_name='$admin_username'";
  $result=mysqli_query($con,$select_query);
  $row_count=mysqli_num_rows($result);
  $row_data=mysqli_fetch_assoc($result); 
  if($row_count>0){
    $_SESSION['admin_name']=$admin_username;
    if(password_verify($admin_password,$row_data['admin_password'])){
      $_SESSION['admin_name']=$admin_username;
      echo "<script>alert('login successful')</script>";
      echo "<script>window.open('index.php', '_self')</script>";
    }else{
      echo "<script>alert('Invalid Credentials')</script>";
   }
  }else{
         echo "<script>alert('Invalid Credentials')</script>";
      }
   
}
?>