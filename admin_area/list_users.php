<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5 text-center ">
  <thead class="bg-warning">
<?php
$get_users="Select * from `user_table`";
$result=mysqli_query($con,$get_users);
$row_count=mysqli_num_rows($result);
echo "<tr>
    <th>S1 no</th>
    <th>username</th>
    <th>user email</th>
    <th>user image</th>
    <th>user address</th>
    <th>user mobile</th>
    <th>Delete</th>
    </tr>
  </thead>
 <tbody class='bg-secondary text-light'>";

if($row_count==0){
  echo "<h2 class='text-danger text-center mt-5'>No User recieved yet</h2>";
}else{
  $number=0;
  while($row_data=mysqli_fetch_assoc($result)){
    $user_id=$row_data['user_id'];
    $username=$row_data['username'];
    $user_email=$row_data['user_email'];
    $user_image=$row_data['user_image'];
    $user_address=$row_data['user_address'];
    $user_mobile=$row_data['user_mobile'];
    
    $number++;
?>
    <tr>
    <td><?php echo $number ?></td>
    <td><?php echo $username?></td>
    <td><?php echo $user_email ?></td>
    <td> <img class='product_img' src="../users_area/user_images/<?php echo $user_image ?>" alt="<?php echo $username?>"> </td>
    <td><?php echo $user_address ?></td>
    <td><?php echo $user_mobile?></td>
    <td><a href='index.php?delete_users=<?php echo $user_id?>'  type="button" class=" text-light" data-toggle="modal" data-target="#exampleModal"> <i class='fa-solid fa-trash'></i></a></td>
  </tr>
  <?php
  }
}

?>

 </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> <a href="./index.php?list_users" class='text-light text-decoration-none'>NO</a></button>
        <button type="button" class="btn btn-primary"> <a href='index.php?delete_users=<?php echo $payment_id?>' class=" text-light text-decoration-none">YES</a></button>
      </div>
    </div>
  </div>
</div>

