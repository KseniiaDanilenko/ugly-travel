<?php
session_start();
require './store/config.php';
require_once './store/functions.php';

if (isset($_GET['delete_id']) && isset($_SESSION['cart_list'])) {
	delete_product_from_cart($_GET['delete_id']);
}
if (isset($_GET['delete_all']) && isset($_SESSION['cart_list'])) {
	delete_all_products_from_cart();
}

if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
	add_product_to_cart($_GET['product_id']);
}

if(isset($_GET['clearcart'])){
delete_all_products_from_cart();

}
$grand_total = 0;
?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Корзина</title>
 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

	 <link rel="stylesheet" href="./css/style.css">
<body> -->


	<div class="heading" style="background:url(./images/header-bg-3.jpg) no-repeat">
		<h1>Корзина</h1>

	</div>
	<section class="shopping-cart">

		<table>
			<thead>
				<th>Название</th>
				<th>Стоимость</th>
				<th>Итого</th>
				<th></th>
			</thead>
			<tbody>
				<?php foreach ($_SESSION['cart_list'] as $fetch_cart) : 
					?>
					<tr>
						<td><?php echo $fetch_cart['name']; ?></td>
						<td><?php echo $fetch_cart['price']; ?> ₽</td>						
						<td><?php echo $sub_total = $fetch_cart['price'] * $fetch_cart['quantity']; ?> ₽</td>
						<td> <a class="delete-btn" href="cart?delete_id=<?php echo $fetch_cart['id']; ?>">Удалить из корзины</a></td>
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
      <a href="cart?delete_all" class="btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>"> <i class="fas fa-trash"></i> Очистить корзину </a>
			<a href="products" class="option-btn" style="margin-top: 0;">Вернуться в каталог</a>
         <a href="checkout" class="btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>">Перейти к оформлению</a>
      </div>
	</section>


<!-- 	<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<script src="./js/script.js"></script>
</body>

</html> -->