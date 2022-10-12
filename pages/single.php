<?php
session_start();

require './store/config.php';
require_once './store/functions.php';
$current_product = get_product_by_id($_GET['id']);
?>

<div class="heading" style="background:url('./uploaded_img/<?php echo $current_product['image']; ?>')no-repeat">
	<h1><?php echo $current_product['name'] ?></h1>
</div>
<section class="single-page">
	<div class="content">
		<p><?php echo $current_product['description']; ?></p>
		<p class="price"><?php echo $current_product['price']; ?> ₽</p>
		<a class="btn" href="cart?product_id=<?php echo $current_product['id'] ?>">Добавить в корзину</a>

	</div>

</section>

