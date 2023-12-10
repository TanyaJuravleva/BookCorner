<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/app/database/db.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/path.php';
  if (isset($_SESSION['id'])) {
    //unset($_SESSION['id']);
  }
  else
  {
    include  $_SERVER['DOCUMENT_ROOT'].'/app/include/authorization/form_login.php';
    include  $_SERVER['DOCUMENT_ROOT'].'/app/include/authorization/form_registration.php';
  }
?>
<header class="top-header">
  <div class="top-header__top">
    <div class="top-header__container">
      <div class="main-info">
        <img class="main-info__logo" src="<?php echo BASE_URL.'/images/logo.png'?>">
        <?php if (isset($_SESSION['id'])): ?>
          <button onclick="document.location='<?php 
              if ($_SESSION['id_role'] == 2)
              {
                echo BASE_URL.'/app/pages/profile.php';
              }
              if ($_SESSION['id_role'] == 1)
              {
                echo BASE_URL.'/app/pages/profile_admin.php';
              }
            ?>'" 
            type="submit" class="main-info__login">Профиль</button>
        <?php else:?>
          <div class="user-menu">
            <button data-custom-open="popupFormLogin" href="#" type="submit" class="main-info__login">Войти</button>
            <span data-custom-open="popupFormRegistration" class="main-info__registration">Регистрация</span>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="top-header__bottom">
    <div class="top-header__container">
      <ul class="menu-general">
      <li class="menu-general__item">
          <a class="menu-general__link" href="<?php echo BASE_URL?>">Главная</a>
        </li>
        <li class="menu-general__item">
          <a class="menu-general__link" href="<?php echo BASE_URL.'/app/pages/genre.php'?>">Жанры</a>
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