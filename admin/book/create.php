<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/path.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/app/controller/book.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/app/database/db.php';
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
    <link rel="stylesheet" href="<?php echo BASE_URL.'/css/profile_admin.css'?>/">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php 
    include $_SERVER['DOCUMENT_ROOT']."/app/include/header_02.php";
    ?>
    <div class="container">
        <div class="row profile-admin">
            <?php include $_SERVER['DOCUMENT_ROOT']."/admin/slidebar_admin.php" ?> 
            <div class="profile-admin__table col-9">
                <div class="profile-admin__btns">
                    <a href="<?php echo BASE_URL.'/admin/book/create.php'?>" class="btn btn-primary btn-lg">Добавить книгу</a>
                    <a href="#" class="btn btn-secondary btn-lg">Редактировать книгу</a>
                </div>
                <h2 class="profile-admin__table-title">Создание книги</h2>
                <div class="info">
                    <div class="mb-12 col-12 col-md-12 err">
                            <p><?=$errMsg?></p>
                        </div>
                    <form class="form" action="./create.php" method="POST" enctype="multipart/form-data">
                        <div class="col">
                            <label>Название</label>
                            <input value="<?=$name?>" class="form-control" type="text" name="name">
                        </div>
                        <label>Серия</label>
                        <select name="book-seria" class="form-select" aria-label="">
                            <option <?php if (!$id_seria) {echo 'selected';} ?> value="">Нет серии</option>
                            <?php foreach($series as $key => $seria):?>
                                <option value="<?=$seria['id_series']?>" <?php if ($seria['id_series'] === $id_seria) {echo 'selected';}?>><?=$seria['name']?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="col">
                            <label>Возрастное ограничение</label>
                            <input value="<?=$age_restrictions?>" class="form-control" type="number" name="age" min="0" max="21">
                        </div>
                        <div class="col">
                            <label>Год публикации</label>
                            <input value="<?=$publish_year?>" class="form-control" type="number" name="publish" min="1901" max="2023" step="1"/>
                        </div>
                        <div class="col">
                            <label>Аннотация</label>
                            <textarea name="text" class="form-control"><?=$annotatinon?></textarea>
                        </div>
                        <div class="col">
                            <label>Загрузить фото книги</label>
                            <input name="photo" type="file" class="form-control">
                        </div>
                        <label>Жанры</label>
                        <input value="<?=$str_book_genres?>" id="genres-js" name="genres" type="hidden">
                        <div>
                            <?php foreach($genres as $key => $genre):?>
                                <div class="form-check form-check-inline">
                                    <input class="genre-check-js orm-check-input" type="checkbox" id="<?=$genre['id_genre']?>" value="<?=$genre['id_genre']?>"
                                    <?php if ($book_genres) {if (in_array($genre['id_genre'], $book_genres)) {echo 'checked';}}?>> 
                                    <label class="form-check-label" for="<?=$genre['id_genre']?>"><?=$genre['name']?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <!-- <select name="book-genre" class="form-select" aria-label="" multiple>
                            <?php foreach($genres as $key => $genre):?>
                                <option value="<?=$genre['id_genre']?>"?>><?=$genre['name']?></option>
                            <?php endforeach; ?>
                        </select> -->
                        <label>Авторы</label>
                        <input value="<?=$str_book_authors?>" id="authors-js" name="authors" type="hidden">
                        <div>
                            <?php foreach($authors as $key => $author):?>
                                <div class="form-check form-check-inline">
                                    <input class="author-check-js form-check-input" type="checkbox" id="<?=$author['id_author']?>" value="<?=$author['id_author']?>" 
                                    <?php if ($book_genres) {if (in_array($author['id_author'], $book_authors)) {echo 'checked';}}?>> 
                                    <label class="form-check-label" for="<?=$author['id_author']?>"><?=$author['first_name']." ".$author['last_name']." ".$author['patronymic']?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <!-- <select name="book-authors" class="form-select" aria-label="" multiple>
                            <?php foreach($authors as $key => $author):?>
                                <option value="<?=$author['id_author']?>"><?=$author['first_name']." ".$author['last_name']." ".$author['patronymic']?></option>
                            <?php endforeach; ?>
                        </select> -->
                        <div class="col">
                            <button name="book-create" id="book-create-js" class="btn btn-primary">Создать книгу</buton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </body>
  <script src="<?php echo BASE_URL.'/js/book.js'?>"></script>
</html>