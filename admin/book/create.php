<?php
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
                <div class="info">
                    <form class="form" action="create_book_handler.php" method="POST">
                        <div class="col">
                            <input class="form-control" type="text" name="name" placeholder="Название">
                        </div>
                        <label>Серия</label>
                        <select class="form-select" aria-label="Series">
                            <option selected>Нет серии</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <div class="col">
                            <label>Возрастное ограничение</label>
                            <input class="form-control" type="text" name="age">
                        </div>
                        <div class="col">
                            <label>Год публикации</label>
                            <input class="form-control" type="text" name="publish">
                        </div>
                        <div class="col">
                            <label>Аннотация</label>
                            <textarea class="form-control"></textarea>
                        </div>
                        <div class="col">
                            <label>Загрузить фото книги</label>
                            <input type="file" class="form-control" id="inputGroupFile02">
                        </div>
                        <label>Жанры</label>
                        <select class="form-select" size="3" aria-label="size 3 select example">
                            <!-- <option selected>Open this select menu</option> -->
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <label>Авторы</label>
                        <select class="form-select" size="3" aria-label="size 3 select example">
                            <!-- <option selected>Open this select menu</option> -->
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <div class="col">
                            <button class="btn btn-primary">Сохранить книгу</buton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </body>
  </body>
</html>