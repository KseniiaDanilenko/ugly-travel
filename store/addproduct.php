<?php
require 'store/config.php';
/* создать новый товар---------------------------------------- */
$p_name = $_POST['p_name'];
$p_price = $_POST['p_price'];
$p_description = $_POST['p_description'];
$p_image = $_FILES['p_image']['name'];
$p_image_tmp_name = $_FILES['p_image']['tmp_name'];
$p_image_folder = './uploaded_img/' . $p_image;
$insert_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image, description) VALUES('$p_name', '$p_price', '$p_image', '$p_description')") or die('query failed');

if ($insert_query) {
  move_uploaded_file($p_image_tmp_name, $p_image_folder);
}
header('location:admin');

?>

