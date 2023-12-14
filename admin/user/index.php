<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/path.php';
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="<?php echo BASE_URL.'/node_modules/bootstrap/dist/css/bootstrap.min.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL.'/css/styles.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL.'/css/header_02.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL.'/css/profile_admin.css'?>/">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php 
    include $_SERVER['DOCUMENT_ROOT']."/app/include/header_02.php";
    ?>
    <div class="container">
        <div class="row profile-admin">
            <?php include $_SERVER['DOCUMENT_ROOT']."/admin/slidebar_admin.php" ?> 
            <div class="profile-admin__table col-9">
                <div class="profile-admin__btns">
                    <a href="<?php echo BASE_URL.'/admin/user/create.php'?>" class="btn btn-primary btn-lg">Добавить пользователя</a>
                    <a href="#" class="btn btn-secondary btn-lg">Редактировать пользователя</a>
                </div>
                <h2 class="profile-admin__table-title">Управление пользователями</h2>
                <div>
                    <div class="profile-admin__table-names row">
                        <div class="profile-admin__table-row col-1">ID</div>
                        <div class="profile-admin__table-row col-2">Login</div>
                        <div class="profile-admin__table-row col-3">Email</div>
                        <div class="profile-admin__table-row col-1">Edit</div>
                        <div class="profile-admin__table-row col-1">Delete</div>
                    </div>
                </div>
                <!-- Прогонять бд по циклу -->
                <div class="profile-admin__table-data row">
                    <div class="profile-admin__table-row col-1">1</div>
                    <div class="profile-admin__table-row col-2">Какое то азвание</div>
                    <div class="profile-admin__table-row col-3">Какой то автор</div>
                    <div class="profile-admin__table-row profile-admin__table-data_edit col-1"><a href="#">Edit</a></div>
                    <div class="profile-admin__table-row profile-admin__table-data_del col-1"><a href="#">Delete</a></div>
                </div>
                <div class="profile-admin__table-data row">
                    <div class="profile-admin__table-row col-1">1</div>
                    <div class="profile-admin__table-row col-2">Какое то азвание</div>
                    <div class="profile-admin__table-row col-3">Какой то автор</div>
                    <div class="profile-admin__table-row profile-admin__table-data_edit col-1"><a href="#">Edit</a></div>
                    <div class="profile-admin__table-row profile-admin__table-data_del col-1"><a href="#">Delete</a></div>
                </div>
            </div>
        </div>
    </div>
  </body>
  </body>
</html>