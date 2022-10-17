<?php 
require 'store/config.php';
/* обновить товар----------------------------------------- */
$update_p_id = $_POST['update_p_id'];
$update_p_name = $_POST['update_p_name'];
$update_p_price = $_POST['update_p_price'];
$update_p_description = $_POST['update_p_description'];
$update_p_image = $_FILES['update_p_image']['name'];
$update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
$update_p_image_folder = 'uploaded_img/' . $update_p_image;
$update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_p_name', price = '$update_p_price', description = '$update_p_description', image = '$update_p_image' WHERE id = '$update_p_id'");
if ($update_query) {
  move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
  header('location:admin');
}
?>