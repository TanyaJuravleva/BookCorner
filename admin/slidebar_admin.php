<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/path.php';
?>
<div class="sidebar col-3">
    <ul class="sidebar-list">
        <li><a class="sidebar-list__href" href="<?php echo BASE_URL.'/admin/book/index.php'?>">Книги</a></li>
        <li><a class="sidebar-list__href" href="<?php echo BASE_URL.'/admin/user/index.php'?>">Пользователи</a></li>
        <li><a class="sidebar-list__href" href="<?php echo BASE_URL.'/admin/author/index.php'?>">Авторы</a></li>
        <li><a class="sidebar-list__href" href="<?php echo BASE_URL.'/admin/category/index.php'?>">Категории</a></li>
        <li><a class="sidebar-list__href" href="<?php echo BASE_URL.'/admin/genre/index.php'?>">Жанры</a></li>
        <li><a class="sidebar-list__href" href="<?php echo BASE_URL.'/admin/seria/index.php'?>">Серии книг</a></li>
        <li><a class="sidebar-list__href" href="<?php echo BASE_URL.'/admin/feedback/index.php'?>">Комментарии</a></li>
    </ul>
</div>