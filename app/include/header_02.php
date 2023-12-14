<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/path.php';
?>
<header class="container-fluid main-header">
    <div class="container cont-top">
        <div class="row">
            <h1 class="main-header__title row"><a href="#">BOOKCORNER</a></h1>
            <div class="main-header__user">
                <a href="<?php echo BASE_URL .'/app/authorization/login_form.php'?>" type="button" class="btn btn-outline-secondary main-header__enter-btn">Войти</a>
                <a href="<?php echo BASE_URL .'/app/authorization/registration_form.php'?>" type="button" class="btn btn-link main-header__reg-btn">Регистрация</a>
            </div>
        </div>
        <div class="row">
            <nav class="navbar navbar-expand-lg main-header__navbar col-8">
                <button class="navbar-toggler btn-list" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav main-header__list">
                        <li class="nav-item main-header__list_item"><a class="main-header__list_item-href" href="#">Главное</a></li>
                        <li class="nav-item main-header__list_item"><a class="main-header__list_item-href" href="#">Жанры</a></li>
                        <li class="nav-item main-header__list_item"><a class="main-header__list_item-href" href="#">Популярное</a></li>
                        <li class="nav-item main-header__list_item"><a class="main-header__list_item-href" href="#">Авторы</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>