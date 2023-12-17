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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php 
      include $_SERVER['DOCUMENT_ROOT']."/app/include/header_02.php";
    ?>
    <main class="page-content">
      <article class="book">
        <div class="book__info">
            <img class="book__info_img" src="<?=BASE_URL . '/images/books/'. $photo_path?>">
            <div class="book__ifo_main">
                <h2 class="book-main__name"><?=$name?></h2>
                <?php foreach($book_authors as $key => $id_author):?>
                    <h3 class="book-main__author">
                        <?php 
                            $author = findAuthorById($id_author); 
                            echo $author['first_name'] . " " . $author['last_name'] . $author['patronymic'] . "<br>";
                        ?>
                    </h3>
                <?php endforeach;?>
                <ul class="book-main__info">
                  <li>Серия: 
                    <?php 
                    if($id_seria) 
                    {
                        echo selectOne('series', ['id_series' => $id_seria])['name'];
                    }
                    else{
                        echo "-";
                    }
                    ?>
                  </li>
                  <li>Жанры: 
                  <?php 
                        $genres = findGenresByBookID($id);
                        foreach($genres as $key => $genre)
                            {
                                echo $genre['name'] . " ";
                            }
                    ?>
                  </li>
                  <li>Категории: </li>
                  <li>Год издания: <?=$publish_year?></li>
                  <li>Возрастное ограничение: <?=$age_restrictions?></li>
                </ul>
            </div>
        </div>
        <div class="book__info_annotation">
            <h3 class="annot-name">Аннотация</h3>
            <p class="anot-text"><?$annotation?></p>
        </div>
        <div class="book__feedbacks"></div>
      </article>
      <article class="feedback">
        <div class="feedback__headline">
          <h2 class="feedback-header">Отзывы</h2>
          <button type="submit" class="feedback__btn">Оставить отзыв</button>
        </div>
        <?php foreach($feedbacks as $key => $feedback):?>
        <div class="feedback-block">
          <div class="feedback-block__user">
            <h3 class="feedback-block__name"><?=findUserById($feedback['id_user'])['name']?></h3>
            <!-- <span class="feedback-block__date">29 ноября 2023 г.</span> -->
            <div class="feedback-block__rating-block">
              <svg width="16" height="16" fill="#ffc72c"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.486 13.376a1 1 0 00-.973 0l-2.697 1.502a1 1 0 01-1.474-1.033l.543-3.35a1 1 0 00-.27-.855L1.277 7.225a1 1 0 01.566-1.684l3.136-.483a1 1 0 00.754-.566l1.361-2.921a1 1 0 011.813 0l1.362 2.921a1 1 0 00.754.566l3.136.483a1 1 0 01.566 1.684l-2.34 2.415a1 1 0 00-.269.856l.542 3.349a1 1 0 01-1.473 1.033l-2.698-1.502z"></path></svg>
              <svg width="16" height="16" fill="#ffc72c"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.486 13.376a1 1 0 00-.973 0l-2.697 1.502a1 1 0 01-1.474-1.033l.543-3.35a1 1 0 00-.27-.855L1.277 7.225a1 1 0 01.566-1.684l3.136-.483a1 1 0 00.754-.566l1.361-2.921a1 1 0 011.813 0l1.362 2.921a1 1 0 00.754.566l3.136.483a1 1 0 01.566 1.684l-2.34 2.415a1 1 0 00-.269.856l.542 3.349a1 1 0 01-1.473 1.033l-2.698-1.502z"></path></svg>
              <svg width="16" height="16" fill="#ffc72c"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.486 13.376a1 1 0 00-.973 0l-2.697 1.502a1 1 0 01-1.474-1.033l.543-3.35a1 1 0 00-.27-.855L1.277 7.225a1 1 0 01.566-1.684l3.136-.483a1 1 0 00.754-.566l1.361-2.921a1 1 0 011.813 0l1.362 2.921a1 1 0 00.754.566l3.136.483a1 1 0 01.566 1.684l-2.34 2.415a1 1 0 00-.269.856l.542 3.349a1 1 0 01-1.473 1.033l-2.698-1.502z"></path></svg>
              <svg width="16" height="16" fill="#ffc72c"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.486 13.376a1 1 0 00-.973 0l-2.697 1.502a1 1 0 01-1.474-1.033l.543-3.35a1 1 0 00-.27-.855L1.277 7.225a1 1 0 01.566-1.684l3.136-.483a1 1 0 00.754-.566l1.361-2.921a1 1 0 011.813 0l1.362 2.921a1 1 0 00.754.566l3.136.483a1 1 0 01.566 1.684l-2.34 2.415a1 1 0 00-.269.856l.542 3.349a1 1 0 01-1.473 1.033l-2.698-1.502z"></path></svg>
              <svg width="16" height="16" fill="#ffc72c"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.486 13.376a1 1 0 00-.973 0l-2.697 1.502a1 1 0 01-1.474-1.033l.543-3.35a1 1 0 00-.27-.855L1.277 7.225a1 1 0 01.566-1.684l3.136-.483a1 1 0 00.754-.566l1.361-2.921a1 1 0 011.813 0l1.362 2.921a1 1 0 00.754.566l3.136.483a1 1 0 01.566 1.684l-2.34 2.415a1 1 0 00-.269.856l.542 3.349a1 1 0 01-1.473 1.033l-2.698-1.502z"></path></svg>
              <span class="feedback-block__rating"><?=$feedback['rating']?></span>
            </div>
          </div>
          <p class="feedback-block__text">
            <?=$feedback['text']?>
          </p>
        </div>
        <?php endforeach;?>
      </arcticle>
    </main>
  </body>
  </body>
</html>