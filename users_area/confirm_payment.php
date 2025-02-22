<?php
 include('../includes/connect.php');
 session_start();
 if(isset($_GET['order_id'])){
  $order_id=$_GET['order_id'];
  //echo $order_id;
  $select_data="Select * from `user_orders` where order_id=$order_id";
  $result=mysqli_query($con,$select_data);
  $row_fetch=mysqli_fetch_assoc($result);
  $invoice_number=$row_fetch['invoice_number'];
  $amount_due=$row_fetch['amount_due'];
 }

 if(isset($_POST['confirm_payment'])){
  $invoice_number=$_POST['invoice_number'];
  $amount=$_POST['amount'];
  $payment_mode=$_POST['payment_mode'];
  $insert_query="insert into `user_payments` (order_id,invoice_number,amount,payment_mode,date) values ($order_id, $invoice_number,$amount,'$payment_mode',NOW())";
  $result=mysqli_query($con,$insert_query);
  if($result){
    echo "<h3 class='text-center text-light'>Successfully completed the payment</h3>";
    echo "<script>window.open('profile.php?my_orders','_self')</script>";
  }
  $update_orders="update `user_orders` set order_status='Complete' where order_id=$order_id";
  $result_orders=mysqli_query($con,$update_orders);
 }

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

<!-- css link -->
 <link rel="stylesheet" href="stylee.css">
  </head>
  <body class="bg-secondary">
    <div class="container my-5">
    <h1 class="text-center text-light">Confirm Payment</h1>
      <form action="" method="post">
        <div class="from-outline my-4 text-center w-50 m-auto">
          <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>">
        </div>
        <div class="from-outline my-4 text-center w-50 m-auto">
          <label for="" class="text-light">Amount</label>
          <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due ?>">
        </div>
        <div class="from-outline my-4 text-center w-50 m-auto">
          <select name="payment_mode" class="form-select w-50 m-auto">
            <option >Select Payment Mode</option>
            <option>Paypal</option>
            <option>Cash on delivery</option>
            <option>Payoffline</option>
            <option>MOMO</option>
            <option>OM</option>
          </select>
        </div>
        <div class="from-outline my-4 text-center w-50 m-auto">
         <input type="submit" class="bg-warning py-2 border-0" value="Confirm" name="confirm_payment">
        </div>
      </form>
    </div>

  <!--js-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>