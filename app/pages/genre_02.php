<?php
  require_once $_SERVER['DOCUMENT_ROOT']."/app/database/db.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/app/controller/genre.php";
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
    <link rel="stylesheet" href="<?php echo BASE_URL.'/css/genre_02.css'?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php 
      include $_SERVER['DOCUMENT_ROOT']."/app/include/header_02.php";
    ?>
    <div class="container-fluid">
        <ul class="genres-block">
            <?php foreach($categories as $keyc => $cat):?>
                <li class="category-block">
                    <h2 class="category-name"><a href="<?php echo BASE_URL.'/app/pages/books_by_category.php?id_category='.$cat['id_category'].'&sort=popular'?>"><?=$cat['name']?></a></h2>
                    <ul class="genres-names">
                        <?php $arr = selectAll('genre', ['id_category' => $cat['id_category']])?>
                        <?php foreach($arr as $keyg => $genre):?>
                            <li class="genre-name"><a href="<?php echo BASE_URL.'/app/pages/books_by_genre.php?id_genre='.$genre['id_genre'].'&sort=popular'?>"><?=$genre['name']?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
  </body>
</html>