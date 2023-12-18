<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/path.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/app/controller/profile_edit.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/app/database/db.php';
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заголовок страницы</title>
    <link rel="stylesheet" href="<?php echo BASE_URL.'/node_modules/bootstrap/dist/css/bootstrap.min.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL.'/css/styles.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL.'/css/header_02.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL.'/css/form.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL.'/css/persanal_data.css'?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  </head>
  <body class="body">
  <?php 
      include $_SERVER['DOCUMENT_ROOT']."/app/include/header_02.php";
    ?>
    <main class="page-content container">
    <div class="row profile-admin">
            <div class="profile-admin__table col-9">
                <h2 class="profile-admin__table-title">Редактирование профиля</h2>
                <div class="info">
                    <form class="form" action="./form_edit_2.php" method="POST">
                        <input value="<?=$_SESSION['id_user']?>" type="hidden" name="id">
                        <div class="col">
                            <label>Имя</label>
                            <input value="<?=$name?>" class="form-control" type="text" name="name">
                        </div>
                        <div class="col">
                            <label>Дата рождения</label>
                            <input value="<?=$date_of_birth?>" class="form-control" type="date" name="date">
                        </div>
                        <div class="col">
                            <label>Email</label>
                            <input value="<?=$email?>" class="form-control" type="email" name="email">
                        </div>
                        <div class="col">
                            <label>Password</label>
                            <input value="<?=$password?>" class="form-control" type="text" name="pass">
                        </div>
                        <div class="col">
                            <label>Номер телефона</label>
                            <input value="<?=$phone_number?>" class="form-control" type="tel" name="phone" pattern="\+7[0-9]{10}" placeholder="+79017389504">
                        </div>
                        <div class="mb-12 col-12 col-md-12 err">
                            <p><?=$errMsg?></p>
                        </div>
                        <div class="col">
                            <button name="user-edit" class="btn btn-primary">Изменить</buton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
  </body>
  <script src="/js/form.js"></script>
</html>