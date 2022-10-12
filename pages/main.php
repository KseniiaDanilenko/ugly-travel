<?php
require './store/config.php';
require './store/functions.php';
$data_from_db = get_all_products();
?>

<section class="home">
   <div class="swiper home-slider">
      <div class="swiper-wrapper">
         <div class="swiper-slide slide" style="background:url(./images/slide1.jpg) no-repeat">
            <div class="content">
               <span>пришёл, увидел, захотел домой</span>
               <h3>путешествия по самым некрасивым местам россии</h3>
               <a href="products" class="btn">подробнее</a>
            </div>
         </div>

         <div class="swiper-slide slide" style="background:url('./images/slide2.jpg') no-repeat">
            <div class="content">
               <span>пришёл, увидел, захотел домой</span>
               <h3>познай русскую хтонь</h3>
               <a href="products" class="btn">подробнее</a>
            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(./images/slide3.jpg) no-repeat">
            <div class="content">
               <span>пришёл, увидел, захотел домой</span>
               <h3>увиденное не развидеть</h3>
               <a href="products" class="btn">Подробнее</a>
            </div>
         </div>

      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>



   </div>
</section>



<section class="services">
   <h1 class="heading-title">Наши услуги</h1>
   <div class="box-container">
      <div class="box">
         <img src="./images/icon-1.png" alt="">
         <h3>сомнительные красоты</h3>
      </div>
      <div class="box">
         <img src="./images/icon-2.png" alt="">
         <h3>очень приблизительная карта местности</h3>
      </div>
      <div class="box">
         <img src="./images/icon-3.png" alt="">
         <h3>выдадим дозиметр</h3>
      </div>
      <div class="box">
         <img src="./images/icon-4.png" alt="">
         <h3>страшилки у костра</h3>
      </div>
      <div class="box">
         <img src="./images/icon-5.png" alt="">
         <h3>никто не узнает где вы</h3>
      </div>
      <div class="box">
         <img src="./images/icon-6.png" alt="">
         <h3>дарим плащ-палатку </h3>
      </div>
   </div>
</section>

<section class="home-about">
   <div class="image">
      <img src="./images/whyus.jpg" alt="">
   </div>
   <div class="content">
      <h3>Почему мы? </h3>
      <p>Вы когда-нибудь задумывались, что слишком хорошо живете? Казалось ли вам, что вы не цените то, что имеете? Вам когда-нибудь говорили, что вы зажрались? Если хотя бы на один вопрос вы ответили <span>"Да"</span>,
         то обращайтесь к нам - в <span>туристическое агентство "Хочу домой"!</span> Только мы предлагаем туры в самые
         загрязненные места России: Норильск, Череповец и, конечно же, поселок Рефтинский Свердловской области.</p>
      <ul>
         <h4>Мы предоставляем полный пакет услуг:</h4>
         <li>
            <i class="fas fa-angle-right"></i>
            верхняя боковая полка возле туалета
         </li>
         <li>
            <i class="fas fa-angle-right"></i>
            два доширака на человека
         </li>
         <li>
            <i class="fas fa-angle-right"></i>
            плейлист с лучшими песнями группы “Дюна”
         </li>
         <li>
            <i class="fas fa-angle-right"></i>
            наши пожелания в добрый путь
         </li>
      </ul>
      <a href="about" class="btn">Отзывы</a>
   </div>
</section>



<section class="home-packages">

   <h1 class="heading-title">направления</h1>

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
               <!--                      <p class="description"><?php echo $fetch_product['description']; ?></p>
 -->
               <a class="btn" href="single?id=<?php echo $fetch_product['id'] ?>">
                  Подробнее
               </a>

            </div>

         </div>

      <?php

      endforeach;
      ?>



   </div>
   <div class="load-more"><a href="products" class="btn">Забронировать тур</a></div>

</section>


<section class="home-offer">
   <div class="content">
      <h3>безумные скидки</h3>
      <p>Etis Atis Animatis Etis Atis Amatis Где-то там в дремучем лесу Среди пихт голубых и волшебных цветов Просто живет, просто песни поет Кто бы вы думали?.. Кто бы вы думали?.. Волшебный кролик! Волшебный кролик! Волшебный кролик Рисует мелом нолик, Очки надевает, Латынь изучает. Волшебный кролик Рисует мелом нолик, Латынь изучает, Стихи сочиняет. Волшебный кролик Рисует мелом нолик, Стихи сочиняет, На скрипке играет. Волшебный кролик Рисует мелом нолик, На скрипке играет, По маме скучает... Etis Atis Animatis Etis Atis Amatis Etis Atis Animatis Волшебный кролик! Etis Atis Amatis Волшебный кролик! Etis Atis Animatis Etis Atis Amatis Волшебный кролик!</p>
      <a href="products" class="btn">Забронировать тур</a>
   </div>
</section>

