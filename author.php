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
    <link rel="stylesheet" href="./css/author.css">
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
      <article class="main-block">
        <h1 class="author-name">Пелевин Виктор Олегович</h1>
      </article>
      <section class="author__products-wrapper">
        <h2 class="author-title">Все книги</h2>
        <div class="author-products-toggle">
            <div class="author-products-toggle__item">
                <button type="button" class="author-products-toggle__button">
                    <span> По популярности </span>
                </button>
            </div>
            <div class="author-products-toggle__item">
                <button type="button" class="author-products-toggle__button">
                    <span> По популярности </span>
                </button>
            </div>
            <div class="author-products-toggle__item">
                <button type="button" class="author-products-toggle__button">
                    <span> По популярности </span>
                </button>
            </div>
        </div>
      </section>
    </main>
  </body>
  <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
  <script src="/js/form.js"></script>
  <script src="/js/button.js"></script>
</html>