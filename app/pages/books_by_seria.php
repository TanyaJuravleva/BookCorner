<?php
  require_once $_SERVER['DOCUMENT_ROOT']."/app/database/db.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/app/controller/seria.php";
  require_once $_SERVER['DOCUMENT_ROOT'].'/path.php';
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="<?php echo BASE_URL.'/node_modules/bootstrap/dist/css/bootstrap.min.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL.'/css/styles.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL.'/css/header_02.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL.'/css/books_block.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL.'/css/profile_admin.css'?>/">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php 
      include $_SERVER['DOCUMENT_ROOT']."/app/include/header_02.php";
    ?>
    <article class="main-block container">
      <input value="<?=$id?>" type="hidden" id="id"/>
       <h2 class="main-block__headline"><?=$name?></h2>
       <div>
        <?php if(isset($_SESSION['id_role'])): ?>
            <?php if ($_SESSION['id_role'] == 1): ?>
              <div>
              <div class="profile-admin__table-data_del col"><a href="<?=BASE_URL . '/admin/seria/edit.php?del_id='.$id?>">Delete seria</a></div>
              <div class="profile-admin__table-data_change col"><a href="<?=BASE_URL . '/admin/seria/edit.php?id='.$id?>">Change seria</a></div>
            </div>
            <?php endif;?>
        <?php endif;?>
        </div>
       <?php 
        include $_SERVER['DOCUMENT_ROOT']."/app/pages/books_blocks.php";
        ?>
      </article>
  </body>
</html>