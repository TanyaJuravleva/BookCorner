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
    <main class="page-content container">
      <article class="main-block">
        <h2 class="main-block__headline"><a href="<?=BASE_URL .'/app/pages/news.php'?>">Новинки книг</a></h2>
        <?php 
            $books = $booksNewsLimit;
            include $_SERVER['DOCUMENT_ROOT']."/app/pages/books_blocks.php";
        ?>
      </article>
      <article class="main-block">
        <h2 class="main-block__headline"><a href="<?=BASE_URL .'/app/pages/popular.php'?>">Популярные книги</a></h2>
        <?php 
            $books = $booksPopularLimit;
            include $_SERVER['DOCUMENT_ROOT']."/app/pages/books_blocks.php";
        ?>
      </article>
      <article class="main-block">
        <h2 class="main-block__headline"><a href="<?=BASE_URL .'/app/pages/popular.php'?>">Популярные книги</a></h2>
        <?php 
            $books = $booksPopularLimit;
            include $_SERVER['DOCUMENT_ROOT']."/app/pages/books_blocks.php";
        ?>
      </article>
      <article class="main-block">
        <h2 class="main-block__headline"><a href="<?php echo BASE_URL .'/app/pages/authors.php'?>">Популярные авторы</a></h2>
        <div class="container cont-authors">
        <?php $authors = findAuthorsByRatingLimit();?>
        <?php foreach($authors as $key => $author): ?>
          <h5 class="cont-authors__name"><a href="<?php echo BASE_URL .'/app/pages/author.php?id_author='.$author['id_author']?>"><?=$author['first_name'] . " " . $author['last_name']?></a></h5>
        <?php endforeach; ?>
        </div>
      </article>
    </main>
  </body>
  </body>
</html>