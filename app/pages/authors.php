<?php
  require_once $_SERVER['DOCUMENT_ROOT']."/app/database/db.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/app/controller/author.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/app/controller/category.php";
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php 
      include $_SERVER['DOCUMENT_ROOT']."/app/include/header_02.php";
    ?>
    <div class="container first">
      <form method="POST">
      <div class="input-group">
        <select name="select">
          <option value="All">All</option>
          <?php foreach($categories as $key => $category):?>
              <option <?php if($sel =='id_category='.$category['id_category']){echo 'selected';}?> value="<?='id_category='.$category['id_category']?>"><?=$category['name']?></option>
              <?php $genres = selectAll('genre', ['id_category'=> $category['id_category']]); ?>
              <?php foreach($genres as $key => $genre):?>
                <option <?php if($sel =='id_genre='.$genre['id_genre']){echo 'selected';}?> value="<?='id_genre='.$genre['id_genre']?>">><?=$genre['name']?></option>
              <?php endforeach; ?>
            <?php endforeach;?>
          </select>
        <button class="btn btn-outline-secondary" name="choose">Выбрать</button>
      </div>
      </form>
        <ul>
            <?php foreach($authorsByAsc as $key => $author):?>
                <h3><li><a href="<?php echo BASE_URL .'/app/pages/author.php?id_author='.$author['id_author']?>"><?=$author['first_name'] . " " . $author['last_name'] . " " . $author['patronymic']?></a></li></h3>
            <?php endforeach; ?>
        </ul>
    </div>
  </body>
  </body>
</html>