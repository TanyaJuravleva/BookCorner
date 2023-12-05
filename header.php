<?php
    include 'form_login.php'
?>
<?php
    include 'form_registration.php'
?>
<header class="top-header">
        <div class="top-header__top">
          <div class="top-header__container">
            <div class="main-info">
              <img class="main-info__logo" src="./images/logo.png">
              <div class="user-menu">
                <button data-custom-open="popupFormLogin" href="#" type="submit" class="main-info__login">Войти</button>
                <span data-custom-open="popupFormRegistration" class="main-info__registration">Регистрация</span>
              </div>
            </div>
          </div>
        </div>
        <div class="top-header__bottom">
          <div class="top-header__container">
            <ul class="menu-general">
            <li class="menu-general__item">
                <a class="menu-general__link" href="./index.php">Главная</a>
              </li>
              <li class="menu-general__item">
                <a class="menu-general__link" href="./genre.php">Жанры</a>
              </li>
              <li class="menu-general__item">
                <a class="menu-general__link">Авторы</a>
              </li>
              <li class="menu-general__item">
                <a class="menu-general__link">Новинки</a>
              </li>
              <li class="menu-general__item">
                <a class="menu-general__link">Бестеллеры</a>
              </li>
              <li class="menu-general__item">
                <a class="menu-general__link">Рейтинги</a>
              </li>
            </ul>
          </div>
        </div>
    </header>