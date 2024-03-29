<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/path.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/app/controller/seria.php';
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
                    <a href="<?php echo BASE_URL.'/admin/seria/create.php'?>" class="btn btn-primary btn-lg">Добавить серию</a>
                    <a href="#" class="btn btn-secondary btn-lg">Редактировать серию</a>
                </div>
                <h2 class="profile-admin__table-title">Создание серии</h2>
                <div class="info">
                    <form class="form" action="./create.php" method="POST">
                        <div class="col">
                            <label>Название</label>
                            <input value=<?=$name?> class="form-control" type="text" name="name">
                        </div>
                        <div class="mb-12 col-12 col-md-12 err">
                            <p><?=$errMsg?></p>
                        </div>
                        <div class="col">
                            <button name="seria-create" class="btn btn-primary">Сохранить серию</buton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </body>
  </body>
</html>