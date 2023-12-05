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
       <h2 class="main-block__headline">Новинки книг</h2>
       <div class="main-block__books">
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
       </div>
      </article>
      <article class="main-block">
       <h2 class="main-block__headline">Бестселлеры</h2>
       <div class="main-block__books">
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
       </div>
      </article>
    </main>
  </body>
  <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
  <script src="/js/form.js"></script>
</html>

<!-- <!DOCTYPE html>
<html lang="ru">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8" />
  <meta mame="viewport" content="width=device-width, initial-scale=1.0">
  <title>Don't do it</title>
  <meta name = "description" content = "Don't do it">
  <link href="css/position.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed" rel="stylesheet">
</head>  

<body class="body">
  <div class='back'>
    <div  id="form" class='form'>
      <img alt="Form" class='form-img' src='images/welcome.svg'>
      <img alt="Vector" class='vector' src='images/vector.svg'>
      <p class='form-header main main__form'>Записаться на курс</p>
      <?php
        include 'form.php'
      ?>
    </div>
  </div>
  <div class="height margin-auto"></div>
  <header class="header"> 
    <img alt="Logo" class="logo" src = "images/logo.svg">
    <nav class="nav">
      <p class="main main__questions">Что будет на курсе?</p>
      <p class="main main__questions">Вопросы</p>
      <p class="main main__questions">Автор</p>
    </nav> 
    <button class="main main__buttom main__buttom_one center">Записаться на курс</button>
  </header>
<main class="margin-auto">
  <section class="head">
    <div class="head-item">
      <h1 class="main main__header margin">Не <span class = "color">делай</span> это</h1>
      <p class="text text__annotation head-item__two">Онлайн-курс для творческих людей, о том, как управлять своим временем</p>
      <button class="main main__buttom main__buttom_two center">Записаться на курс</button>
    </div>  
    <img alt="Man" class="man" src = "images/man.svg">
  </section>
  <section class="text text__note">
    <div class="info">
      <div class="info-item info-item__one">
        <img alt="Times" style="width:60px;height:60px" src="images/time.svg">
        <p class="padding">Для тех, у кого слишком много идей и слишком мало времени</p>
      </div>
      <div class="info-item info-item__two">
        <img alt="Notebook" style="width:61px;height:60px" src="images/notebook.svg">
        <p class="padding">Метод «списка не дел», который позволит успевать и реализовывать</p>
      </div>
      <div class="info-item info-item__three">
        <img alt="Target" style="width:61px;height:60px" src="images/target.svg">
        <p class="padding">Курс научит творческих людей сосредоточиваться</p>
      </div>
    </div>
  </section>
  <section class="block-one">
    <img alt="Finances" class="image-one" src="images/finances.svg">
    <div class="text-one"> 
      <h2 class="main main__frame header-one">Ты не успеешь</h2>
      <p class="text text__comment">Всех творческих людей объединяет одна проблема - отсутствие времени на реализацию идей. 
      Как прибавить суткам часы, рассмотрим в нашем курсе.</p>
    </div>  
  </section>    
    <section class="block-two">
      <div class="text-one"> 
        <h2 class="main main__frame header-two">Опять дедлайн</h2>
        <p class="text text__comment">В мире, где столько всего интересного, когда же успевать жить?</p>
      </div>  
        <img alt="Mind blowing" class="image-two"src="images/mindblowing.svg">
    </section>

    <section class="block-three">   
      <h2 class="main main__frame header-three">На курсе ты <span class = "color">сможешь</span></h2>
      <div class="grid">
        <div class="text text__blocks">
          <img alt="One" style="width:39px;height:49px" src="images/one.svg">
          <p>Понять, что нужно делать, а что делать не стоит.</p>
        </div>
        <div class="text text__blocks">
          <img alt="Two" style="width:36px;height:49px" src="images/two.svg">
          <p>Перестать себя искусственно ограничивать.</p>
        </div>
        <div class="text text__blocks">
          <img alt="Three" style="width:46px;height:49px" src="images/three.svg">
          <p>Определить сильные стороны и начать использовать слабые.</p>
        </div>
        <div class="text text__blocks">
          <img alt="Four" style="width:41px;height:49px" src="images/four.svg">
          <p>Научиться достигать любой цели в 3 понятных шага.</p>
        </div>
        <div class="text text__blocks">
          <img alt="Five" style="width:51px;height:49px" src="images/five.svg">
          <p>Сотрудничать эффективно и с правильными людьми.</p>
        </div>
        <div class="text text__blocks">
          <img alt="Six" style="width:36px;height:49px" src="images/six.svg">
          <p>Оптимизировать общение с клиентами и проведение совещаний.</p>
        </div>
      </div>
    </div>  
  </section>
</main>
  <footer class="footer center" >
    <img alt="Footer" style="width:126px;height:26px" src="images/footer.svg">
  </footer>
  <script src="form.js"></script>
</body>
</html>  -->