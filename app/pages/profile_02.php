<?php
  require_once $_SERVER['DOCUMENT_ROOT']."/app/database/db.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/app/controller/exit.php";
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php include $_SERVER['DOCUMENT_ROOT']."/app/include/header_02.php";?>
    <main class="container-fluid">
      <section class="profile">
        <div class="profile-block">
            <h1 class="profile-headline">Личные данные</h1>
            <div class="profile-info">
                <span class="profile-info__name"><?php echo $_SESSION['name']?></span>
                <span class="profile-info__phone"><?php echo $_SESSION['phone']?></span>
                <span class="profile-info__email"><?php echo $_SESSION['email']?></span>
            </div>
        </div>
        <div class="personal-data">
            <div class="personal-data__submit">
                <a class="menu-general__link" href="./form_edit_2.php">
                <div type="submit" disabled="disabled" class="button personal-data__button blue"> 
                    Изменить данные 
                </div>
                </a>
            </div>
            <form action="./profile_02.php" method="POST">
                <button name="exit" class="btn btn-primary">Выйти</button>
            </form>
        </div>
      </section>
    </main>
  </body>
  </body>
</html>