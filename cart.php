<!-- connect files -->
<?php
 include('includes/connect.php');
include('functions/common_function.php');
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="x-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="withdraw=device-width, initial-scale=1.0">
    <title>Ecommerce Website-Cart details</title>
<!-- bootstrap css link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- font awesome link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- css link -->
 <link rel="stylesheet" href="stylee.css">

 <style>
  .cart_img {
  width: 80px;
  height: 80px;
  object-fit: contain;

  body{
    overflow-x:hidden;
  }
}
 </style>
  </head>
  <body>
    <!-- nav bar -->
     <div class="container-fluid p-0">
      <!-- first child -->
      <nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <img src="./images/logo.jpg" alt="" class="logo">
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"><sup><?php cart_item(); ?></sup></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- calling cart function -->
 <?php
 cart();
 ?>

<!-- second child --->
 <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
  
    <?php
    if(!isset($_SESSION['username'])){
      echo " <li class='nav-item'>
      <a href='#' class='nav-link'>Welcome Guest</a>
    </li>";
    }else{
      echo " <li class='nav-item'>
      <a href='#' class='nav-link'>Welcome ".$_SESSION['username']."</a>
    </li>
     <li class='nav-item'>
      <a href='./users_area/profile.php' class='nav-link'>profile ".$_SESSION['username']."</a>
    </li>";
    }
    if(!isset($_SESSION['username'])){
      echo " <li class='nav-item'>
      <a href='./users_area/user_login.php' class='nav-link'>login</a>
    </li>";
    }else{
      echo " <li class='nav-item'>
      <a href='./users_area/logout.php' class='nav-link'>logout</a>
    </li>";
    }
    ?>

  </ul>
 </nav>

 <!-- third child -->
  <div class="bg-light">
    <h3 class="text-center">Jordan Store</h3>
    <p class="text-center"></p>
  </div>

<!-- fourth child-table -->
 <div class="container">
  <div class="row">
    <form action="" method="post">
    <table class="table table-bordered text-center">
      
        <!-- php code to display dynamic data -->
        
      <!-- PHP code to display dynamic data -->
<?php


$get_ip_add = getIPAddress(); 
$total_price = 0;
$cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_add'";
$result = mysqli_query($con, $cart_query);
$result_count = mysqli_num_rows($result);

if ($result_count > 0) {
    echo "<thead>
        <tr>
          <th>Product Title</th>
          <th>Product Image</th>
          <th>Quantity</th>
          <th>Total Price</th>
          <th>Remove</th>
          <th colspan='2'>Operations</th>
        </tr>
      </thead>
      <tbody>";

    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];
        $quantity = intval($row['quantity']);
        $select_products = "SELECT * FROM products WHERE product_id='$product_id'";
        $result_products = mysqli_query($con, $select_products);

        while ($row_product_price = mysqli_fetch_array($result_products)) {
            $product_price = floatval($row_product_price['product_price']);
            $product_title = $row_product_price['product_title'];
            $product_image1 = $row_product_price['product_image1'];
            $total_product_price = $product_price * $quantity;
            $total_price += $total_product_price;
?>

        <tr>
          <td><?php echo $product_title ?></td>
          <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" class="cart_img" alt=""></td>
          <td><input type="text" name="qty[<?php echo $product_id; ?>]" value="<?php echo $quantity; ?>" class="form-input w-50"></td>
          <td><?php echo $total_product_price ?></td>
          <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
          <td>
            <input type="submit" value="Update Cart" class="bg-warning px-3 py-2 mx-3 border-0" name="update_cart">
            <input type="submit" value="Remove Cart" class="bg-warning px-3 py-2 mx-3 border-0" name="remove_cart">
          </td>
        </tr>

<?php
        }
    }
} else {
    echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
}
?>

      </tbody>
    </table>
    <!-- subtotal -->
     <div class="d-flex mb-5">
      <?php
$get_ip_add = getIPAddress();
$cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_add'";
$result = mysqli_query($con, $cart_query);
$result_count = mysqli_num_rows($result);

if ($result_count > 0) {
    echo "<h4 class='px-3'>Subtotal: <strong class='text-warning'>$total_price fr</strong></h4>
          <input type='submit' value='Continue Shopping' class='bg-warning px-3 py-2 mx-3 border-0' name='continue_shopping'>
          <button class='bg-secondary p-3 py-2 border-0'>
            <a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a>
          </button>";
} else {
    echo "<input type='submit' value='Continue Shopping' class='bg-warning px-3 py-2 mx-3 border-0' name='continue_shopping'>";
}

if (isset($_POST['continue_shopping'])) {
    echo "<script>window.open('index.php', '_self')</script>";
}

if (isset($_POST['update_cart'])) {
    foreach ($_POST['qty'] as $product_id => $quantity) {
        $quantity = intval($quantity);
        $update_cart = "UPDATE cart_details SET quantity=$quantity WHERE ip_address='$get_ip_add' AND product_id='$product_id'";
        $result_update = mysqli_query($con, $update_cart);
    }
    echo "<script>window.open('cart.php', '_self')</script>";
}
?>

      
     </div>
  </div>
 </div>
 </form>
<!-- function to remove item -->
<?php
function remove_cart_item(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
      echo $remove_id;
      $delete_query="Delete from `cart_details` where product_id=$remove_id";
      $run_delete=mysqli_query($con,$delete_query);
      if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";
      }
    }
  }
}
echo $remove_item=remove_cart_item();
?>

<!----- last child ------->
<!-- include footer -->
 <?php include("./includes/footer.php") ?>
     </div>
    


  <!--js-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>