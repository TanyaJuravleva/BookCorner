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
    <link rel="stylesheet" href="./css/persanal_data.css">
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
        <form class="personal-data">
            <div class="personal-data__line">
                <div class="personal-data__item">
                    <div class="app-input">
                        <div class="app-input__label">
                            Логин
                        </div> 
                        <label class="app-input__wrapper">
                            <input type="text" placeholder="" tabindex="1" minlength="2" maxlength="50" name="" required="required">
                        </label>
                    </div>
                </div> 
            </div> 
            <div class="personal-data__line">
                <div class="personal-data__item">
                    <div class="app-input">
                        <div class="app-input__label">
                        Пароль
                        </div> <label class="app-input__wrapper">
                            <input type="text" placeholder="" tabindex="3" maxlength="50" name="">
                        </label>
                        </div>
                    </div> 
                </div>
                <div class="personal-data__line">
                    <div class="personal-data__item">
                    <div class="app-input">
                        <div class="app-input__label">
                        Дата рождения
                        </div> <label class="app-input__wrapper">
                        <input type="text" placeholder="" tabindex="3" maxlength="50" name="">
                        </label>
                    </div>
                    </div> 
                </div> 
                <div class="personal-data__line">
                    <div class="personal-data__item">
                    <div data-v-3ba30185="" class="phone-input__wrapper" tabindex="-1"><div data-v-3ba30185="" class="label">
                        Телефон
                    </div> 
                    <label data-v-3ba30185="" class="phone-input disabled"><!----> <input data-v-3ba30185="" placeholder="Номер телефона" tabindex="-1" required="required" disabled="disabled" autocomplete="tel tel-local tel-national" name="phone" type="tel" inputmode="tel" class="phone-input__input phone-input__input--short">
                    </label>
                </div> 
            </div> 
            
            </div>
            <div class="personal-data__line">
                    <div class="item-data"><div class="app-input">
                        <div class="app-input__label">
                        E-mail
                        </div> 
                        <label class="app-input__wrapper">
                            <input type="text" placeholder="" tabindex="5" maxlength="50" name="" required="required">
                        </label> 
                    </div>
                </div>
        </div> 
        <a class="menu-general__link" href="./profile.php">
        <div class="personal-data__submit">
            <div type="submit" disabled="disabled" class="button personal-data__button blue disabled"> 
            Сохранить изменения
            </div>
        </div>
        </a>
        </form>
    </main>
  </body>
  <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
  <script src="/js/form.js"></script>
</html>