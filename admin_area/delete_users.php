<?php

if(isset($_GET['delete_users'])){
  $delete_users=$_GET['delete_users'];
  echo  $delete_payments;

  $delete_query="Delete from `user_table` where user_id=$delete_users";
  $result=mysqli_query($con,$delete_query);
  if($result){
    echo "<script>alert('User is been Deleted successfuly')</script>";
    echo "<script>window.open('./index.php?list_users','_self')</script>";
  }
}
?>