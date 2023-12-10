<?php
  // require_once $_SERVER['DOCUMENT_ROOT'].'/boot.php';
  // if (check_auth()) {
  //   //unset($_SESSION['user_id']);
  // }
  // else
  //{
    include 'authorization/form_login.php';
    include 'authorization/form_registration.php';
  //}
?>
<header class="top-header">
  <div class="top-header__top">
    <div class="top-header__container">
      <div class="main-info">
        <img class="main-info__logo" src="./images/logo.png">
        <?php
          //if (check_auth()) {
          //  include 'app/include/enter_buttons.php';
          //}
          //else
          //{
            include 'app/include/no_enter_buttons.php';
          //}
        ?>
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