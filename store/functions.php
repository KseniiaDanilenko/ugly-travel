<?php
require 'config.php';
/* получить товар по id  ------------------------*/
function get_product_by_id($id)
{
  global $conn;
  $query = "SELECT * FROM products WHERE id=" . $id;
  $req = mysqli_query($conn, $query);
  $resp = mysqli_fetch_assoc($req);
  return $resp;
}
/* вывести все товары------------------------------ */
function get_all_products()
{
  global $conn;
  $query = "SELECT * FROM products";
  $req = mysqli_query($conn, $query);
  $data_from_db = [];
  while ($result = mysqli_fetch_assoc($req)) {
    $data_from_db[] = $result;
  }
  return $data_from_db;
}
/* создать новый товар------------------------------ */
function add_new_product($p_name, $p_price, $p_image, $p_description, $p_image_tmp_name, $p_image_folder)
{
  global $conn;
  $insert_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image, description) VALUES('$p_name', '$p_price', '$p_image', '$p_description')") or die('query failed');

  if ($insert_query) {
    move_uploaded_file($p_image_tmp_name, $p_image_folder);
  }
}
/* удалить товар------------------------------------ */
function delete_product($delete_id)
{
  global $conn;
  $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id ") or die('query failed');
}
/* изменить продукт и обновить------------------------ */
function update_product($update_p_name, $update_p_price, $update_p_description, $update_p_image, $update_p_id, $update_p_image_tmp_name, $update_p_image_folder)
{
  global $conn;
  $update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_p_name', price = '$update_p_price', description = '$update_p_description', image = '$update_p_image' WHERE id = '$update_p_id'");

  if ($update_query) {
    move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
    header('location:admin');
  }
}
/* оформить заказ----------------------------------- */
function make_order($name, $number, $email, $adress)
{
  global $conn;
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
  }
  return $result;
}
/* добавить товар в корзину--------------------------------- */
function add_product_to_cart($id)
{
  $current_added_product = get_product_by_id($id);

  if (!empty($current_added_product)) {

    if (!isset($_SESSION['cart_list'])) {
      $_SESSION['cart_list'][] = $current_added_product;
    }
    $product_check = false;
    if (isset($_SESSION['cart_list'])) {
      foreach ($_SESSION['cart_list'] as $value) {
        if ($value['id'] == $current_added_product['id']) {
          $product_check = true;
        }
      }
    }

    if (!$product_check) {
      $_SESSION['cart_list'][] = $current_added_product;
    }
  } else {
    header("Location: 404");
  }
}
/* удалить товар из корзины------------------------------- */
function delete_product_from_cart($id)
{
  foreach ($_SESSION['cart_list'] as $key => $value) {
    if ($value['id'] == $id) {
      unset($_SESSION['cart_list'][$key]);
    }
  }
}
/* очистить корзину------------------------------------ */
function delete_all_products_from_cart()
{
  foreach ($_SESSION['cart_list'] as $key => $value) {
    unset($_SESSION['cart_list'][$key]);
  }
}

