<?php
require './store/config.php';
require_once './store/functions.php';
$data_from_db = get_all_products();


if (isset($_POST['add_product'])){
   $p_name = $_POST['p_name'];
   $p_price = $_POST['p_price'];
   $p_description = $_POST['p_description'];
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = './uploaded_img/' . $p_image;
   add_new_product($p_name, $p_price, $p_image, $p_description,$p_image_tmp_name, $p_image_folder);
   header('location:admin');

}
if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   delete_product($delete_id );
   header('location:admin');

}; 
if (isset($_GET['edit'])){
 
   $fetch_edit =get_product_by_id($_GET['edit']);
} ;

if (isset($_POST['update_product'])) {
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_price = $_POST['update_p_price'];
   $update_p_description = $_POST['update_p_description'];
   $update_p_image = $_FILES['update_p_image']['name'];
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder = 'uploaded_img/' . $update_p_image;
   update_product($update_p_name,$update_p_price,$update_p_description,$update_p_image, $update_p_id,$update_p_image_tmp_name, $update_p_image_folder);
}

?>
<!-- 
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Админ.панель</title>
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="css/styles.css">
</head>

<body> -->


   <div class="container">

      <section >
         <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
            <h3>Добавить позицию в каталог</h3>
            <input type="text" name="p_name" placeholder="название" class="box" required>
            <input type="number" name="p_price" min="0" placeholder="стоимость" class="box" required>
            <input type="text" name="p_description" min="0" placeholder="описание" class="box" required>
            <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
            <input type="submit" value="Добавить в каталог" name="add_product" class="btn">
         </form>
      </section>
   </div>

   <section class="display-product-table">
      <table>

         <thead>
            <th>Изображение</th>
            <th>Название</th>
            <th>Стоимость</th>
            <th>Описание</th>
            <th></th>
         </thead>

         <tbody>
            <?php
                  foreach($data_from_db as $row):?>           

                  <tr>
                     <td><img src="./uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                     <td><?php echo $row['name']; ?></td>
                     <td><?php echo $row['price']; ?> ₽</td>
                     <td><?php echo $row['description']; ?></td>

                     <td>
                        <a href="admin?delete=<?php echo $row['id']; ?>" class="delete-btn"> <i class="fas fa-trash"></i> Удалить </a>
                        <a href="admin?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> Изменить </a>
                     </td>
                  </tr>

            <?php
          
             endforeach;
            ?>
         </tbody>
      </table>
   </section>
   <section class="edit-form-container">

      <?php
 
      if (isset($_GET['edit'])) {

      ?>

               <form action="" method="post" enctype="multipart/form-data">
                  <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
                  <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
                  <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
                  <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
                  <input type="text" class="box" required name="update_p_description" value="<?php echo $fetch_edit['description']; ?>">
                  <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
                  <input type="submit" value="Обновить" name="update_product" class="btn">
                  <a href="admin" class="btn" style="margin-top: 0;">Отменить</a>
               </form>

      <?php            
            
            echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
         }; 
      ?>

   </section>


<!--       <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

   <script src="js/script.js"></script>

</body>

</html> -->