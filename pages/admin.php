<?php
require './store/config.php';
/* отобразить все товары-------------------------------------------- */
$query = "SELECT * FROM products";
$req = mysqli_query($conn, $query);
$data_from_db = [];
while ($result = mysqli_fetch_assoc($req)) {
   $data_from_db[] = $result;
}
/* открыть окно изменения товара------------------------------------ */
if (isset($_GET['edit'])){ 
   $query = "SELECT * FROM products WHERE id=" . $_GET['edit'];
   $req = mysqli_query($conn, $query);
   $fetch_edit = mysqli_fetch_assoc($req);  
} ;
?>
<?php require 'header.php'; ?>
<div class="container">
   <section>
      <form action="addproduct" method="POST" class="add-product-form" enctype="multipart/form-data">
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
         foreach ($data_from_db as $row) : ?>
            <tr>
               <td><img src="./uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
               <td><?php echo $row['name']; ?></td>
               <td><?php echo $row['price']; ?> ₽</td>
               <td><?php echo $row['description']; ?></td>
               <td>
                  <form action="deleteproduct" method="POST">
                     <input type="text" name="delete_id" hidden value="<?php echo $row['id']; ?>">
                     <input type="submit" value="Удалить" class="btn">
                  </form>
                  <a href="admin?edit=<?php echo $row['id']; ?>" class="btn"> Изменить </a>
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
      <form action="changeproduct" method="POST" enctype="multipart/form-data">
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
<?php require 'footer.php'; ?>