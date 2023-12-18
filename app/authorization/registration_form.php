<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/path.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/app/controller/reg.php';
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
    <link rel="stylesheet" href="<?php echo BASE_URL.'/css/login_form.css'?>/">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php 
    include $_SERVER['DOCUMENT_ROOT']."/app/include/header_02.php";
    ?>
    <div class="text-center">
    
    <main class="form-reg">
      <form action="./registration_form.php" method="POST">
        <h1 class="h3 mb-3 fw-normal">Регистрация</h1>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Логин</label>
            <div class="col-sm-10">
              <input value="<?=$name?>" class="form-control" type="text" name="name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input value="<?=$email?>" class="form-control" type="email" name="email">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
            <input value="<?=$pass?>" name="pass" type="password" class="form-control" id="pass">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Номер телефона</label>
            <div class="col-sm-10">
              <input value="<?=$phone?>" class="form-control" type="tel" name="phone" pattern="\+7[0-9]{10}" placeholder="+79017389504">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Дата рождения</label>
            <div class="col-sm-10">
            <input value="<?=$date?>" class="form-control" type="date" name="date">
            </div>
        </div>
        <div class="mb-12 col-12 col-md-12 err">
            <p><?=$errMsg?></p>
        </div>
        <button name="user-create" class="w-100 btn btn-lg btn-primary form-reg__btn">Зарегистрироваться</button>
      </form>
    </main>
</div>
  </body>
</html>