<?php include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="x-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="withdraw=device-width, initial-scale=1.0">
    <title>Payment page</title>
<!-- bootstrap css link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- font awesome link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
  body{
    overflow-x:hidden;
  }
  .payment_img{
    width:100%;
    margin:auto;
    display:block;
  }
</style>

  </head>
  <body>
    <!-- php code to access user id -->
     <?php
      $user_ip=getIPAddress();
      $get_user="Select * from `user_table` where user_ip='$user_ip'";
      $result=mysqli_query($con,$get_user);
      $run_query=mysqli_fetch_array($result);
      $user_id=$run_query['user_id'];


?>
      <div class="container">
        <h2 class="text-center text-warning">Payment options</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
          <div class="col-md-6">
          <a href="https://www.paypal.com" target="_blank"><img src="../images/logo.jpg" alt="" class="payment_img"></a>
          </div>

          <div class="col-md-6">
              <a href="order.php?user_id=<?php echo $user_id ?>" class="text-decoration-none"> <h1 class="text-warning ">Pay offline</h1></a>
          </div>
         
        </div>
      </div>
   
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>