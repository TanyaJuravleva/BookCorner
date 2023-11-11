<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заголовок страницы</title>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/books_block.css">
    <link rel="stylesheet" href="./css/form.css">
    <link rel="stylesheet" href="./css/micromodal.css">
    <link rel="stylesheet" href="./css/profile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta property="og:title" content="Заголовок страницы в OG">
    <meta property="og:description" content="Описание страницы в OG">
    <meta property="og:image" content="https://example.com/image.jpg">
    <meta property="og:url" content="https://example.com/">
  </head>
  <body class="body">
    <?php
        include 'header.php'
    ?>
    <main class="page-content">
      <section class="profile">
        <div class="profile-block">
            <h1 class="profile-headline">Личные данные</h1>
            <div class="profile-info">
                <span class="profile-info__name">Журавлёва Татьяна</span>
                <span class="profile-info__phone">+7 (8976) 23-45-67</span>
                <span class="profile-info__email">fkslf@mail.ru</span>
            </div>
        </div>
      </section>
    </main>
  </body>
  <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
  <script src="/js/form.js"></script>
</html>