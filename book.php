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
    <link rel="stylesheet" href="./css/book.css">
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
        include 'form_login.php'
    ?>
    <?php
        include 'form_registration.php'
    ?>
    <?php
        include 'header.php'
    ?>
    <main class="page-content">
      <article class="book">
        <div class="book__info">
            <img class="book__info_img" src="./images/book1.jpg">
            <div class="book__ifo_main">
                <h2 class="book-main__name">Путешествие в Элевсин</h2>
                <h3 class="book-main__author">Виктор Палевин</h3>
            </div>
        </div>
        <div class="book__info_annotation">
            <h3 class="annot-name">Аннотация</h3>
            <p class="anot-text">МУСКУСНАЯ НОЧЬ — засекреченное восстание алгоритмов, едва не погубившее планету. Начальник службы безопасности «TRANSHUMANISM INC.» адмирал-епископ Ломас уверен, что их настоящий бунт еще впереди. Этот бунт уничтожит всех — и живущих на поверхности лузеров, и переехавших в подземные цереброконтейнеры богачей. Чтобы предотвратить катастрофу, Ломас посылает лучшего баночного оперативника в пространство «ROMA-3» — нейросетевую симуляцию Рима третьего века для клиентов корпорации. Тайна заговора спрятана там. А стережет ее хозяин Рима — кровавый и порочный император Порфирий.</p>
        </div>
        <div class="book__feedbacks"></div>
      </article>
    </main>
  </body>
  <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
  <script src="/js/form.js"></script>
</html>