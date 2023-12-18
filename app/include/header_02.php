<?php
  require_once $_SERVER['DOCUMENT_ROOT']."/app/database/db.php";
  require_once $_SERVER['DOCUMENT_ROOT'].'/path.php';
?>
<header class="container-fluid main-header">
    <div class="container cont-top">
        <div class="row">
            <h1 class="main-header__title row"><a href="<?php echo BASE_URL .'/index_02.php'?>">BOOKCORNER</a></h1>
            <div class="input-group mb-3 search">
                <form action="<?=BASE_URL .'/app/pages/search.php'?>" method="POST">
                    <input name="search" type="text" class="form-control" placeholder="Search">
                </form>
                <!-- <button class="btn btn-outline-secondary" id="button-addon2">e</button> -->
            </div>
            <?php if (isset($_SESSION['id'])):?>
                <ul class="main-header__list main-header__user">
                    <li class="main-header__list_item"><a class="main-header__list_item-href" href="<?php echo BASE_URL. '/app/pages/profile_02.php'?>"><?=$_SESSION['name']?></a></li>
                    <?php if ($_SESSION['id_role'] == 1):?>
                        <li class="main-header__list_item"><a class="main-header__list_item-href" href="<?php echo BASE_URL. '/admin/book/index.php'?>">Админ панель</a></li>
                    <?php endif?>
                </ul>
            <?php else: ?>
                <div class="main-header__user">
                    <a href="<?php echo BASE_URL .'/app/authorization/login_form.php'?>" type="button" class="btn btn-outline-secondary main-header__enter-btn">Войти</a>
                    <a href="<?php echo BASE_URL .'/app/authorization/registration_form.php'?>" type="button" class="btn btn-link main-header__reg-btn">Регистрация</a>
                </div>
            <?php endif?>
        </div>
        <div class="row">
            <nav class="navbar navbar-expand-lg main-header__navbar col-8">
                <button class="navbar-toggler btn-list" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav main-header__list">
                        <li class="nav-item main-header__list_item"><a class="main-header__list_item-href" href="<?php echo BASE_URL .'/index_02.php'?>">Главное</a></li>
                        <li class="nav-item main-header__list_item"><a class="main-header__list_item-href" href="<?php echo BASE_URL .'/app/pages/genre_02.php'?>">Жанры</a></li>
                        <li class="nav-item main-header__list_item"><a class="main-header__list_item-href" href="<?php echo BASE_URL .'/app/pages/authors.php'?>">Авторы</a></li>
                        <li class="nav-item main-header__list_item"><a class="main-header__list_item-href" href="<?php echo BASE_URL .'/app/pages/popular.php'?>">Популярное</a></li>
                        <li class="nav-item main-header__list_item"><a class="main-header__list_item-href" href="<?php echo BASE_URL .'/app/pages/news.php'?>">Новинки</a></li>
                        <li class="nav-item main-header__list_item"><a class="main-header__list_item-href" href="<?php echo BASE_URL .'/app/pages/series.php'?>">Серии</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>