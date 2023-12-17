<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/path.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/app/controller/enter_feedback.php';
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
        <!-- <div class="row profile-admin"> -->
            <!-- <div class="profile-admin__table col-9"> -->
                <h2 class="profile-admin__table-title">Редактирование комментария</h2>
                <div class="info">
                    <form class="form" action="./enter_feedback.php" method="POST">
                        <input value="<?=$_SESSION['id_feedback']?>" type="hidden" name="id"/>
                        <div class="col">
                            <label>Текст комментария</label>
                            <textarea name="text" class="form-control"><?=$text?></textarea>
                        </div>
                        <div class="col">
                            <label>Рэйтинг(1-5)</label>
                            <input value="<?=strval($rating)?>" class="form-control" type="number" name="rating" min="1" max="5" step="1"/>
                        </div>
                        <div class="mb-12 col-12 col-md-12 err">
                            <p><?=$errMsg?></p>
                        </div>
                        <div class="col">
                            <button name="feedback-edit" class="btn btn-primary">Редактировать комментарий</buton>
                        </div>
                    </form>
                </div>
            <!-- </div> -->
        <!-- </div> -->
    </div>
  </body>
  </body>
</html>