<?php
session_start();
require './store/config.php';
require_once './store/functions.php';


 if (isset($_POST['order_btn'])) {

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $adress = $_POST['adress'];

   if ( make_order($name, $number, $email, $adress, )) {      
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>Спасибо за покупочку!</h3>       
         <div class='customer-details'>
            <p> ФИО : <span>" . $name . "</span> </p>
            <p> Контактный номер : <span>" . $number . "</span> </p>
            <p> email : <span>" . $email . "</span> </p>
            <p> адрес : <span>" . $adress . "</span> </p>
         </div>         
            <a href='cart?clearcart' class='btn'>Закрыть</a>
         </div>
      </div>
      ";
  
      }

}
 

?>

   <div class="heading" style="background:url(./images/header-bg-4.jpg) no-repeat">
      <h1>Оформление заказа</h1>
   </div>
   <section class="checkout-form">



      <form action="" method="post">

         <div class="display-order">
            <?php
    
                  $grand_total =0;
                  foreach( $_SESSION['cart_list'] as $fetch_cart ) :
            ?>
                  <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['price']; ?> ₽)</span>
                  <?php $grand_total+= $fetch_cart['price'];?>
            <?php
     
             endforeach;
            ?>
            <span class="grand-total"> Итого :<?= $grand_total; ?> ₽</span>
         </div>

         <div class="flex">
            <div class="inputBox">
               <span>Имя</span>
               <input type="text" placeholder="Ф.И.О." name="name" required>
            </div>
            <div class="inputBox">
               <span>Контактный номер</span>
               <input type="number" placeholder="телефон" name="number" required>
            </div>
            <div class="inputBox">
               <span>email</span>
               <input type="email" placeholder="email" name="email" required>
            </div>
            <div class="inputBox">
               <span>Адрес </span>
               <input type="text" placeholder="адрес" name="adress" required>
            </div>
         </div>
         <input type="submit" value="Оформить заявку" name="order_btn" class="btn">
      </form>

   </section>

