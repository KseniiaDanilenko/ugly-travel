<?php
session_start();
require './store/config.php';
require_once './store/functions.php';
$data_from_db = get_all_products();

?>


<div class="heading" style="background:url(./images/header-bg-2.jpg) no-repeat">
   <h1>Направления</h1>
</div>

<section class="packages">
   <h1 class="heading-title">наши туры</h1>
   <div class="box-container">

      <?php

      foreach ($data_from_db as $fetch_product) :
      ?>
         <div class="box">
            <div class="image">
               <img src="./uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
            </div>
            <div class="content">
               <h3><?php echo $fetch_product['name']; ?></h3>
               <p class="price"><?php echo $fetch_product['price']; ?> ₽</p>
               <p class="description"><?php echo $fetch_product['description']; ?></p>
               <a class="btn" href="single?id=<?php echo $fetch_product['id'] ?>">
                  Подробнее
               </a>

               <a class="btn" href="cart?product_id=<?php echo $fetch_product['id'] ?>">
                  В корзину
               </a>
            </div>
         </div>


      <?php
      endforeach;

      ?>

   </div>

</section>