<?php 
require 'store/config.php';
/* удалить товар------------------------------ */
$delete_id = $_POST['delete_id'];
 $delete_query=mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id ") or die('query failed');

if($delete_query){
  header('location:admin');

}
?>
