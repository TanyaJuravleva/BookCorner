<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заголовок страницы</title>
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/books_block.css">
    <link rel="stylesheet" href="../../css/form.css">
    <link rel="stylesheet" href="../../css/micromodal.css">
    <link rel="stylesheet" href="../../css/profile.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/persanal_data.css">
    <link rel="stylesheet" href="../../css/create_book.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta property="og:title" content="Заголовок страницы в OG">
    <meta property="og:description" content="Описание страницы в OG">
    <meta property="og:image" content="https://example.com/image.jpg">
    <meta property="og:url" content="https://example.com/">
  </head>
  <body class="body">
    <?php
        include $_SERVER['DOCUMENT_ROOT'].'/app/include/header.php'
    ?>
    <main class="page-content">
      <section class="container-l">
        <div class="sidebar">
          <ul>
            <li><a>Книги</a></li>
            <li><a>Авторы</a></li>
            <li><a>Пользователи</a></li>
            <li><a>Категории</a></li>
          </ul>
        </div>
        <div class="info">
            <div>
              <a href="./create_book.php" class="btn-l">Добавить книгу</a>
              <a class="btn-l">Редактировать книгу</a>
            </div>
            <form class="form" action="create_book_handler.php" method="POST">
                <div class="col">
                    <input class="form-control" type="text" name="password" placeholder="Название">
                </div>
                <div class="col">
                    <label>Аннотация</label>
                    <textarea class="form-control"></textarea>
                </div>
                <div class="input-group col">
                    <input type="file" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text">Upload</label>
                </div>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <div class="col">
                    <button class="btn btn-primary">Сохранить книгу</buton>
                </div>
            </form>
        </div>
      </section>
      <section class="profile">
        <div class="profile-block">
            <h1 class="profile-headline">Личные данные</h1>
            <div class="profile-info">
                <span class="profile-info__name"><?php echo $_SESSION['name']?></span>
                <span class="profile-info__phone"><?php echo $_SESSION['phone']?></span>
                <span class="profile-info__email"><?php echo $_SESSION['email']?></span>
            </div>
        </div>
        <div class="personal-data">
          <div class="personal-data__submit">
            <a class="menu-general__link" href="./form_edit_2.php">
              <div type="submit" disabled="disabled" class="button personal-data__button blue"> 
                Изменить данные 
              </div>
            </a>
          </div>
          <div class="button personal-data__button__exit white">
            <a id="exit">Выйти</a>
          </div>
        </div>
      </section>
    </main>
  </body>
  <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
  <script src="../../js/form.js"></script>
  <script src="../../js/exit.js"></script>
</html>