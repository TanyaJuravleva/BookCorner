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
    <link rel="stylesheet" href="<?php echo BASE_URL.'/css/book.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL.'/css/feedback.css'?>">
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
      <article class="book">
        <div>
        <div class="book__info">
            <img class="book__info_img" src="<?php if ($photo_path) {echo BASE_URL . '/images/books/'. $photo_path;} else {echo BASE_URL . '/images/no_photo.png';}?>">
            <div class="book__ifo_main">
                <h2 class="book-main__name"><?=$name?></h2>
                <?php foreach($book_authors as $key => $id_author):?>
                    <h3 class="book-main__author">
                        <?php $author = findAuthorById($id_author); ?>
                            <a href="<?php echo BASE_URL .'/app/pages/author.php?id_author='.$id_author?>"><?=$author['first_name'] . " " . $author['last_name'] . $author['patronymic'] . "<br>"?></a>
                    </h3>
                <?php endforeach;?>
                <ul class="book-main__info">
                  <li>Серия: <a href="<?php echo BASE_URL .'/app/pages/books_by_seria.php?id_seria='.$id_seria?>">
                    <?php 
                    if($id_seria) 
                    {
                        echo selectOne('series', ['id_series' => $id_seria])['name'];
                    }
                    else{
                        echo "-";
                    }
                    ?></a>
                  </li>
                  <li>Жанры: 
                    <?php $genres = findGenresByBookID($id); ?>
                        <?php foreach($genres as $key => $genre): ?>
                            <a href="<?php echo BASE_URL.'/app/pages/books_by_genre.php?id_genre='.$genre['id_genre'].'&sort=popular'?>"><?=$genre['name'] . " "?></a>
                        <?php endforeach; ?>
                  </li>
                  <li>Категории: 
                    <?php $categories = findCategoryByBookId($id); ?>
                       <?php foreach($categories as $key => $category): ?>
                            <a href="<?php echo BASE_URL.'/app/pages/books_by_category.php?id_category='.$category['id_category'].'&sort=popular'?>"><?=$category['name'] . " "?></a>
                        <?php endforeach; ?>
                  </li>
                  <li>Год издания: <?=$publish_year?></li>
                  <li>Дата поступдения: <?=$date_of_receipt?></li>
                  <li>Возрастное ограничение: <?=$age_restrictions?></li>
                </ul>
            </div>
        </div>
        <?php if($annotatinon):?>
        <div class="book__info_annotation">
            <h3 class="annot-name">Аннотация</h3>
            <p class="anot-text"><?=$annotatinon?></p>
        </div>
        <?php endif;?>
        </div>
        <?php if(isset($_SESSION['id_role'])): ?>
            <?php if ($_SESSION['id_role'] == 1): ?>
              <div>
              <div class="profile-admin__table-data_del col"><a href="<?=BASE_URL . '/admin/book/edit.php?del_id='.$id?>">Delete book</a></div>
              <div class="profile-admin__table-data_change col"><a href="<?=BASE_URL . '/admin/book/edit.php?id='.$id?>">Change book</a></div>
            </div>
            <?php endif;?>
        <?php endif;?>
      </article>
      <article class="feedback">
        <div class="feedback__headline">
          <h2 class="feedback-header">Отзывы</h2>
          <?php if(isset($_SESSION['id'])): ?>
            <a href="<?=BASE_URL . '/app/pages/enter_feedback.php?id='.$id?>" class="feedback__btn">Оставить отзыв</a>
          <?php endif;?>
        </div>
        <?php foreach($feedbacks as $key => $feedback):?>
        <div class="feedback-block 
        <?php if(isset($_SESSION['id']))
        {
          if ($_SESSION['id'] == findUserById($feedback['id_user'])['id_user'])
          {
            echo "green-border";
          }
        }
        ?>
        ">
          <div class="feedback-block__user">
            <h3 class="feedback-block__name"><?=findUserById($feedback['id_user'])['name']?></h3>
            <span class="feedback-block__date"><?=$feedback['date']?></span>
            <div class="feedback-block__rating-block">
              <?php for($i=1; $i<=$feedback['rating']; $i++): ?>
              <svg width="16" height="16" fill="#ffc72c"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.486 13.376a1 1 0 00-.973 0l-2.697 1.502a1 1 0 01-1.474-1.033l.543-3.35a1 1 0 00-.27-.855L1.277 7.225a1 1 0 01.566-1.684l3.136-.483a1 1 0 00.754-.566l1.361-2.921a1 1 0 011.813 0l1.362 2.921a1 1 0 00.754.566l3.136.483a1 1 0 01.566 1.684l-2.34 2.415a1 1 0 00-.269.856l.542 3.349a1 1 0 01-1.473 1.033l-2.698-1.502z"></path></svg>
              <?php endfor; ?>
              <?php for($i=1; $i<=5 - $feedback['rating']; $i++): ?>
              <div class="ant-rate-star-first"><svg width="16" height="16" fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.486 13.376a1 1 0 00-.973 0l-2.697 1.502a1 1 0 01-1.474-1.033l.543-3.35a1 1 0 00-.27-.855L1.277 7.225a1 1 0 01.566-1.684l3.136-.483a1 1 0 00.754-.566l1.361-2.921a1 1 0 011.813 0l1.362 2.921a1 1 0 00.754.566l3.136.483a1 1 0 01.566 1.684l-2.34 2.415a1 1 0 00-.269.856l.542 3.349a1 1 0 01-1.473 1.033l-2.698-1.502z"></path></svg></div>
              <?php endfor; ?>
              <span class="feedback-block__rating"><?=$feedback['rating']?></span>
            </div>
          </div>
          <p class="feedback-block__text">
            <?=$feedback['text']?>
          </p>
          <div class="feed-admin">
            <?php if(isset($_SESSION['id_role'])): ?>
              <?php if ($_SESSION['id_role'] == 1): ?>
                <div class="profile-admin__table-data_del col-2"><a href="<?=BASE_URL . '/admin/feedback/edit.php?del_id=' . $feedback['id_feedback'].'&id='.$id?>">Delete</a></div>
              <?php endif;?>
            <?php endif;?>
            <?php if(isset($_SESSION['id'])): ?>
              <?php if ($_SESSION['id'] == findUserById($feedback['id_user'])['id_user']): ?>
                <div class="profile-admin__table-data_change col-2"><a href="<?=BASE_URL . '/app/pages/edit_feedback.php?id_feed='.$feedback['id_feedback']?>">Изменить</a></div>
              <?php endif;?>
            <?php endif;?>
            </div>
        </div>
        <?php endforeach;?>
      </arcticle>
    </main>
  </body>
  </body>
</html>