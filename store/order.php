<?php 
session_start();
require './store/config.php';
/* оформить заказ---------------------------------------------- */
$name = $_POST['name'];
$number = $_POST['number'];
$email = $_POST['email'];
$adress = $_POST['adress'];
$result = false;
$cart_query = $_SESSION['cart_list'];
$price_total = 0;
foreach ($cart_query as $product_item) {
  $product_name[] = $product_item['name'] . ' (' . $product_item['quantity'] . ') ';
  $product_price = $product_item['price'] * $product_item['quantity'];
  $price_total += $product_price;
};
$total_product = implode(', ', $product_name);
$detail_query = mysqli_query($conn, "INSERT INTO `order` (name, number, email, adress, total_products, total_price) VALUES('$name','$number','$email', '$adress', '$total_product','$price_total')") or die('query failed');
if ($cart_query && $detail_query) {
  $result = true;
  header('location:checkout?true');

}



?>