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
    <title>Ecommerce Website using PHP and MySQL. </title>
<!-- bootstrap css link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- font awesome link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
  body{
    overflow-x:hidden;
  }
</style>
<!-- css link -->
 <link rel="stylesheet" href="stylee.css">
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
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price:<?php total_cart_price();?>fr</a>
        </li>
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

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
    </li>";
    }
    if(!isset($_SESSION['username'])){
      echo " <li class='nav-item'>
      <a href='./users_area/user_login.php' class='nav-link'>login</a>
    </li>";
    }else{
      echo " <li class='nav-item'>
      <a href='/users_area/logout.php' class='nav-link'>logout</a>
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


  <!-- fourth child -->
   <div class="row px-1">
    <div class="col-md-10">
      <!-- products -->
   <div class="row">
    <!-- fetching products -->
     <?php
     //calling function
     get_all_products();
      get_unique_categories();
      get_unique_brands();
     ?>
<!-- row end -->
</div>
<!-- col end -->
</div>
    <div class="col-md-2 bg-secondary p-0">
      <!-- brands to be displayed -->
     <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-warning">
        <a href="#" class="nav-link text-light">Delivery Brands</a>
      </li>
      <?php 
          getbrands();
         ?>
     </ul>

    <!-- categories to be displayed --->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-warning">
        <a href="#" class="nav-link text-light">Categories</a>
      </li>
      <?php 
         getcategories();
         ?>
     </ul>

    </div>
   </div>




<!----- last child ------->
<!-- include footer -->
<?php include("./includes/footer.php") ?>
     </div>
    


  <!--js-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>