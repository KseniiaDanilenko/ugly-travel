<?php
session_start();
require './store/config.php';
/* отобразить страницу товара-------------------------------------------- */
$query = "SELECT * FROM products WHERE id=" . $_GET['id'];
$req = mysqli_query($conn, $query);
$current_product  = mysqli_fetch_assoc($req);
?>
<?php require 'header.php'; ?>
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
<?php require 'footer.php'; ?>
