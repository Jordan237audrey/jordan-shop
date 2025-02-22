<!-- connect files -->
<?php
 include('../includes/connect.php');

?>
<?php
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-aquiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
   <!-- bootstrap css link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- font awesome link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="stylee.css">


    <style>
      .admin_image{
  width: 100px;
  object-fit: contain;
}
.footer{
  position:absolute;
  bottom:0px;
  display: flex;
}
body{
  overflow-x:hidden
}
.product_img{
  width: 100px;
  object-fit:contain;
}
    </style>
    
  </head>
  <body>
    <div class="container-fluid p-0">
         <nav class="navbar navbar-expand-lg navbar-light bg-warning">
              <div class="container-fluid">
                <img src="../images/amazon-logo-white.png" alt="" class="logo">
                <nav class="navbar navbar-expan-lg">
                  <ul class="navbar-nav">
                  <?php
    if(!isset($_SESSION['admin_name'])){
      echo " <li class='nav-item'>
      <a href='#' class='nav-link'>Welcome Guest</a>
    </li>";
    }else{
      echo " <li class='nav-item'>
      <a href='#' class='nav-link'>Welcome ".$_SESSION['admin_name']."</a>
    </li>";
    }
    ?>
                    <li class="nav-item">
                      <a href="" class="nav-link">Welcome guest</a>
                    </li>
                  </ul>
                </nav>
              </div>
        </nav>


        <div class="bg-light">
          <h3 class="bg-light">
            <h3 class="text-center p-2">Management Details</h3>
          </h3>
        </div>

<!-- third child -->

        <div class="row">
          <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
            <div class="px-5">
              <a href=""><img src="../images/IMG-20221031-WA0049.jpg" alt="" class="admin_image"></a>
              <p class="text-light text-center">Admin</p>
            </div>

            <div class="button text-center">
              <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-warning my-1">Insert Products</a></button>
              <button><a href="index.php?view_products" class="nav-link text-light bg-warning my-1">View Products</a></button>
              <button><a href="index.php?insert_category" class="nav-link text-light bg-warning my-1">Insert Categories</a></button>
              <button><a href="index.php?view_categories" class="nav-link text-light bg-warning my-1">View categories</a></button>
              <button><a href="index.php?insert_brands" class="nav-link text-light bg-warning my-1">Insert Brands</a></button>
              <button><a href="index.php?view_brands" class="nav-link text-light bg-warning my-1">View Brands</a></button>
              <button><a href="index.php?list_orders" class="nav-link text-light bg-warning my-1">All Orders</a></button>
              <button><a href="index.php?list_payments" class="nav-link text-light bg-warning my-1">All payments</a></button>
              <button><a href="index.php?list_users" class="nav-link text-light bg-warning my-1">List Users</a></button>
              <?php
              if (isset($_SESSION['admin_name'])){
                echo"  <button><a href='index.php?admin_logout' class='nav-link text-light bg-warning my-1'>Logout</a></button>";
              }
              ?>
            </div>
          </div>
        </div>


        <!-- fouth child -->
         <div class="container my-3">
          <?php
          if(isset($_GET['insert_category'])){
            include('insert_categories.php');
          }
          if(isset($_GET['insert_brands'])){
            include('insert_brands.php');
          }  
          if(isset($_GET['view_products'])){
            include('view_products.php');
          }  
          if(isset($_GET['edit_products'])){
            include('edit_products.php');
          }  
          if(isset($_GET['delete_product'])){
            include('delete_product.php');
          }  
          if(isset($_GET['view_categories'])){
            include('view_categories.php');
          }  
          if(isset($_GET['view_brands'])){
            include('view_brands.php');
          } 
          if(isset($_GET['edit_category'])){
            include('edit_category.php');
          }   
          if(isset($_GET['edit_brands'])){
            include('edit_brands.php');
          }  
          if(isset($_GET['delete_category'])){
            include('delete_category.php');
          }  
          if(isset($_GET['delete_brands'])){
            include('delete_brands.php');
          } 
          if(isset($_GET['list_orders'])){
            include('list_orders.php');
          } 
          if(isset($_GET['delete_orders'])){
            include('delete_orders.php');
          } 
          if(isset($_GET['list_payments'])){
            include('list_payments.php');
          } 
          if(isset($_GET['delete_payments'])){
            include('delete_payments.php');
          } 
          if(isset($_GET['list_users'])){
            include('list_users.php');
          } 
          if(isset($_GET['delete_users'])){
            include('delete_users.php');
          }
          if(isset($_GET['admin_logout'])){
            include('admin_logout.php');
          }
          ?>
         </div>

        <!--last child-->
        <?php include("../includes/footer.php") ?>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>