<?php
  require_once $_SERVER['DOCUMENT_ROOT']."/app/database/db.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/app/controller/book.php";
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
        <select class="form-select" id="select">
          <option <?php if($_SESSION['sort'] == 'popular'){echo 'selected';}?> id="popular" value="popular">По популярности</option>
          <option <?php if($_SESSION['sort'] == 'date'){echo 'selected';}?> id="date" value="date">По дате поступления</option>
        </select>
       <?php 
        include $_SERVER['DOCUMENT_ROOT']."/app/pages/books_blocks.php";
        ?>
      </article>
  </body>
  <script src="<?php echo BASE_URL.'/js/select-cat.js'?>"></script>
</html>