<?php
session_start();
require './store/config.php';
/* удалить товар из корзины-------------------------------------------- */
if (isset($_GET['delete_id']) && isset($_SESSION['cart_list'])) {
  foreach ($_SESSION['cart_list'] as $key => $value) {
    if ($value['id'] == $_GET['delete_id']) {
      unset($_SESSION['cart_list'][$key]);
    }
  }
}
/* 	очистить корзину------------------------------------------------------- */
if (isset($_GET['delete_all']) || isset($_GET['clearcart']) && isset($_SESSION['cart_list'])) {
  foreach ($_SESSION['cart_list'] as $key => $value) {
    unset($_SESSION['cart_list'][$key]);
  }
}
/* добавить товар в корзину-------------------------------------------- */
if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
  $query = "SELECT * FROM products WHERE id=" . $_GET['product_id'];
  $req = mysqli_query($conn, $query);
  $current_added_product = mysqli_fetch_assoc($req);

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

$grand_total = 0;
?>
<?php require 'header.php'; ?>

<div class="heading" style="background:url(./images/header-bg-3.jpg) no-repeat">
  <h1>Корзина</h1>

</div>
<section class="shopping-cart">

  <table>
    <thead>
      <th>Название</th>
      <th>Стоимость</th>
      <th></th>
    </thead>
    <tbody>
      <?php foreach ($_SESSION['cart_list'] as $fetch_cart) :
      ?>
        <tr>
          <td class="name"> <?php echo $fetch_cart['name']; ?></td>
          <td><?php echo $sub_total = $fetch_cart['price'] * $fetch_cart['quantity']; ?> ₽</td>
          <td> <a class="btn" href="cart?delete_id=<?php echo $fetch_cart['id']; ?>">Удалить из корзины</a></td>
        </tr>
      <?php
        $grand_total = $grand_total + $sub_total;

      endforeach; ?>
      <tr class="table-bottom">
        <td colspan="2" class="sum"> Итого</td>
        <td><?php echo $grand_total; ?> ₽</td>
      </tr>
    </tbody>
  </table>

  <div class="checkout-btn">
    <a href="cart?delete_all" class="btn <?php ($grand_total > 1) ? '' : 'disabled'; ?>"> <i class="fas fa-trash"></i> Очистить корзину </a>
    <a href="products" class="btn"">Вернуться в каталог</a>
         <a href=" checkout" class="btn <?php ($grand_total > 1) ? '' : 'disabled'; ?>">Перейти к оформлению</a>
  </div>
</section>
<?php require 'footer.php'; ?>