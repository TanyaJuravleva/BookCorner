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
    <link rel="stylesheet" href="./css/feedback.css">
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
      <article class="feedback">
        <div class="feedback__headline">
          <h2 class="feedback-header">Отзывы</h2>
          <button type="submit" class="feedback__btn">Оставить отзыв</button>
        </div>
        <div class="feedback-block">
          <div class="feedback-block__user">
            <h3 class="feedback-block__name">Алёна Иванова</h3>
            <span class="feedback-block__date">29 ноября 2023 г.</span>
            <div class="feedback-block__rating-block">
              <svg width="16" height="16" fill="#ffc72c"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.486 13.376a1 1 0 00-.973 0l-2.697 1.502a1 1 0 01-1.474-1.033l.543-3.35a1 1 0 00-.27-.855L1.277 7.225a1 1 0 01.566-1.684l3.136-.483a1 1 0 00.754-.566l1.361-2.921a1 1 0 011.813 0l1.362 2.921a1 1 0 00.754.566l3.136.483a1 1 0 01.566 1.684l-2.34 2.415a1 1 0 00-.269.856l.542 3.349a1 1 0 01-1.473 1.033l-2.698-1.502z"></path></svg>
              <svg width="16" height="16" fill="#ffc72c"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.486 13.376a1 1 0 00-.973 0l-2.697 1.502a1 1 0 01-1.474-1.033l.543-3.35a1 1 0 00-.27-.855L1.277 7.225a1 1 0 01.566-1.684l3.136-.483a1 1 0 00.754-.566l1.361-2.921a1 1 0 011.813 0l1.362 2.921a1 1 0 00.754.566l3.136.483a1 1 0 01.566 1.684l-2.34 2.415a1 1 0 00-.269.856l.542 3.349a1 1 0 01-1.473 1.033l-2.698-1.502z"></path></svg>
              <svg width="16" height="16" fill="#ffc72c"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.486 13.376a1 1 0 00-.973 0l-2.697 1.502a1 1 0 01-1.474-1.033l.543-3.35a1 1 0 00-.27-.855L1.277 7.225a1 1 0 01.566-1.684l3.136-.483a1 1 0 00.754-.566l1.361-2.921a1 1 0 011.813 0l1.362 2.921a1 1 0 00.754.566l3.136.483a1 1 0 01.566 1.684l-2.34 2.415a1 1 0 00-.269.856l.542 3.349a1 1 0 01-1.473 1.033l-2.698-1.502z"></path></svg>
              <svg width="16" height="16" fill="#ffc72c"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.486 13.376a1 1 0 00-.973 0l-2.697 1.502a1 1 0 01-1.474-1.033l.543-3.35a1 1 0 00-.27-.855L1.277 7.225a1 1 0 01.566-1.684l3.136-.483a1 1 0 00.754-.566l1.361-2.921a1 1 0 011.813 0l1.362 2.921a1 1 0 00.754.566l3.136.483a1 1 0 01.566 1.684l-2.34 2.415a1 1 0 00-.269.856l.542 3.349a1 1 0 01-1.473 1.033l-2.698-1.502z"></path></svg>
              <svg width="16" height="16" fill="#ffc72c"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.486 13.376a1 1 0 00-.973 0l-2.697 1.502a1 1 0 01-1.474-1.033l.543-3.35a1 1 0 00-.27-.855L1.277 7.225a1 1 0 01.566-1.684l3.136-.483a1 1 0 00.754-.566l1.361-2.921a1 1 0 011.813 0l1.362 2.921a1 1 0 00.754.566l3.136.483a1 1 0 01.566 1.684l-2.34 2.415a1 1 0 00-.269.856l.542 3.349a1 1 0 01-1.473 1.033l-2.698-1.502z"></path></svg>
              <span class="feedback-block__rating">5</span>
            </div>
          </div>
          <p class="feedback-block__text">
            Отличается от прошлогоднего KGBT+ в лучшую сторону во-первых оформлением, ну и по содержанию тоже это более внятное и читаемое произведение с двумя параллельными и взаимосвзяннными сюжетами, озникающими на пересечении миров, созданных в книгах Пелевина последних 4-5 лет. Античное мистическое наследие как в "Непобедимом солнце", элитные баночники из "Трансгуманизма", ИИ Порфирий из "IPhuck10" и т.д. Все вполне гармонично сочетается в характерную для автора матрешку мистика-социальная сатира-буддизм-и-т-д
          </p>
        </div>
      </arcticle>
    </main>
  </body>
  <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
  <script src="/js/form.js"></script>
</html>