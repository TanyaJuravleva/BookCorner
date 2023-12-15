<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/path.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/app/controller/user.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/app/database/db.php';
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
                        <div class="profile-admin__table-row col-3">Login</div>
                        <div class="profile-admin__table-row col-5">Email</div>
                        <div class="profile-admin__table-row col-1">Role</div>
                        <div class="profile-admin__table-row col-1">Edit</div>
                        <div class="profile-admin__table-row col-1">Delete</div>
                    </div>
                </div>
                <!-- Прогонять бд по циклу -->
                <?php foreach($users as $key => $user):?>
                  <div class="profile-admin__table-data row">
                    <div class="profile-admin__table-row col-1"><?=$user['id_user']?></div>
                    <div class="profile-admin__table-row col-3"><?=$user['name']?></div>
                    <div class="profile-admin__table-row col-5"><?=$user['email']?></div>
                    <div class="profile-admin__table-row col-1"><?=selectOne('role', ['id_role' => $user['id_role']])['name']?></div>
                    <div class="profile-admin__table-row profile-admin__table-data_edit col-1"><a href="edit.php?id=<?=$user['id_user']?>">Edit</a></div>
                    <div class="profile-admin__table-row profile-admin__table-data_del col-1"><a href="edit.php?del_id=<?=$user['id_user']?>">Delete</a></div>
                  </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
  </body>
  </body>
</html>