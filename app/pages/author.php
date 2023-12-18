<?php
  require_once $_SERVER['DOCUMENT_ROOT']."/app/database/db.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/app/controller/author.php";
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
    <link rel="stylesheet" href="<?php echo BASE_URL.'/css/author.css'?>">
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
    <main class="page-content container">
      <article class="main-block">
        <h1 class="author-name"><?=$name?></h1>
        <div>
        <?php if(isset($_SESSION['id_role'])): ?>
            <?php if ($_SESSION['id_role'] == 1): ?>
              <div>
              <div class="profile-admin__table-data_del col"><a href="<?=BASE_URL . '/admin/author/edit.php?del_id='.$id?>">Delete author</a></div>
              <div class="profile-admin__table-data_change col"><a href="<?=BASE_URL . '/admin/author/edit.php?id='.$id?>">Change author</a></div>
            </div>
            <?php endif;?>
        <?php endif;?>
        </div>
      </article>
      <!-- <section class="author__products-wrapper">
        <h2 class="author-title">Все книги</h2>
        <div class="author-products-toggle">
            <div class="author-products-toggle__item">
                <button type="button" class="author-products-toggle__button">
                    <span> По популярности </span>
                </button>
            </div>
            <div class="author-products-toggle__item">
                <button type="button" class="author-products-toggle__button">
                    <span> По дате издания </span>
                </button>
            </div>
            <div class="author-products-toggle__item">
                <button type="button" class="author-products-toggle__button">
                    <span> По сериям </span>
                </button>
            </div>
        </div> -->
        <?php 
        include $_SERVER['DOCUMENT_ROOT']."/app/pages/books_blocks.php";
        ?>
        <!-- <div class="main-block__books">
        <ul class="books-list">
          <li class="books-list__item">
            <a>
              <img class="books-list__item_img" src="./images/book1.jpg">
              <div class="books-list__item_info">
                <a class="book-name" href="./book.php">Путешествие в Элевсин</a>
                <a class="book-author" href="./author.php">Виктор Палевин</a>
                <div class="book-rating">
                  <svg width="16" height="16" fill="#ffc72c"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.486 13.376a1 1 0 00-.973 0l-2.697 1.502a1 1 0 01-1.474-1.033l.543-3.35a1 1 0 00-.27-.855L1.277 7.225a1 1 0 01.566-1.684l3.136-.483a1 1 0 00.754-.566l1.361-2.921a1 1 0 011.813 0l1.362 2.921a1 1 0 00.754.566l3.136.483a1 1 0 01.566 1.684l-2.34 2.415a1 1 0 00-.269.856l.542 3.349a1 1 0 01-1.473 1.033l-2.698-1.502z"></path></svg>
                  <span class="book-rating__dig">3,8</span>
                </div>
              </div>
            </a>
          </li>
          <li class="books-list__item">
            <a>
              <img class="books-list__item_img" src="./images/book2.jpg">
              <div class="books-list__item_info">
                <a class="book-name">Магазинчик времени</a>
                <a class="book-author">Ким Сонён</a>
                <div class="book-rating">
                  <svg width="16" height="16" fill="#ffc72c"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.486 13.376a1 1 0 00-.973 0l-2.697 1.502a1 1 0 01-1.474-1.033l.543-3.35a1 1 0 00-.27-.855L1.277 7.225a1 1 0 01.566-1.684l3.136-.483a1 1 0 00.754-.566l1.361-2.921a1 1 0 011.813 0l1.362 2.921a1 1 0 00.754.566l3.136.483a1 1 0 01.566 1.684l-2.34 2.415a1 1 0 00-.269.856l.542 3.349a1 1 0 01-1.473 1.033l-2.698-1.502z"></path></svg>
                  <span class="book-rating__dig">3,6</span>
                </div>
              </div>
            </a>
          </li>
        </ul>
       </div> -->
      </section>
    </main>
  </body>
</html>