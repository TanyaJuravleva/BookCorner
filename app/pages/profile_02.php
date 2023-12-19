<?php
  require_once $_SERVER['DOCUMENT_ROOT']."/app/database/db.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/app/controller/exit.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/app/controller/feedback.php";
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
    <link rel="stylesheet" href="<?php echo BASE_URL.'/css/persanal_data.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL.'/css/profile.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL.'/css/feedback.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL.'/css/profile_admin.css'?>">
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
                <div class="str"><p class="str-name">Дата рождения:</p><span class="profile-info__date"><?php echo $_SESSION['date']?></span></div>
                <div class="str"><p class="str-name">Номер телефона:</p><span class="profile-info__phone"><?php echo $_SESSION['phone']?></span></div>
                <div class="str"><p class="str-name">Email:</p><span class="profile-info__email"><?php echo $_SESSION['email']?></span></div>
            </div>
        </div>
        <div class="personal-data">
            <div class="personal-data__submit">
                <a class="menu-general__link" href="./form_edit_2.php?id_user=<?=$_SESSION['id']?>">
                <div type="submit" disabled="disabled" class="button personal-data__button blue"> 
                    Изменить данные 
                </div>
                </a>
            </div>
            <form action="./profile_02.php" method="POST">
                <button name="exit" class="exit-bitton">Выйти</button>
            </form>
        </div>
      </section>
      <article class="feedback">
        <div class="feedback__headline">
          <h2 class="feedback-header">Ваши отзывы</h2>
        </div>
        <?php foreach($feedbacksUser as $key => $feedback):?>
        <div class="feedback-block">
          <div class="feedback-block__user">
            <!-- <h3 class="feedback-block__name"><?=findUserById($feedback['id_user'])['name']?></h3> -->
            <h3 class="">Отзыв к книге "<?=selectOne('book', ['id_book' => $feedback['id_book']])['name']?>"</h3>
            <span class="feedback-block__date"><?=$feedback['date']?></span>
            <div class="feedback-block__rating-block">
              <?php for($i=1; $i<=$feedback['rating']; $i++): ?>
              <svg width="16" height="16" fill="#ffc72c"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.486 13.376a1 1 0 00-.973 0l-2.697 1.502a1 1 0 01-1.474-1.033l.543-3.35a1 1 0 00-.27-.855L1.277 7.225a1 1 0 01.566-1.684l3.136-.483a1 1 0 00.754-.566l1.361-2.921a1 1 0 011.813 0l1.362 2.921a1 1 0 00.754.566l3.136.483a1 1 0 01.566 1.684l-2.34 2.415a1 1 0 00-.269.856l.542 3.349a1 1 0 01-1.473 1.033l-2.698-1.502z"></path></svg>
              <?php endfor; ?>
              <?php for($i=1; $i<=5 - $feedback['rating']; $i++): ?>
              <div class="ant-rate-star-first"><svg width="16" height="16" fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.486 13.376a1 1 0 00-.973 0l-2.697 1.502a1 1 0 01-1.474-1.033l.543-3.35a1 1 0 00-.27-.855L1.277 7.225a1 1 0 01.566-1.684l3.136-.483a1 1 0 00.754-.566l1.361-2.921a1 1 0 011.813 0l1.362 2.921a1 1 0 00.754.566l3.136.483a1 1 0 01.566 1.684l-2.34 2.415a1 1 0 00-.269.856l.542 3.349a1 1 0 01-1.473 1.033l-2.698-1.502z"></path></svg></div>
              <?php endfor; ?>
              <span class="feedback-block__rating"><?=$feedback['rating']?></span>
            </div>
          </div>
          <p class="feedback-block__text">
            <?=$feedback['text']?>
          </p>
          <div class="feed-admin">
            <?php if(isset($_SESSION['id_role'])): ?>
              <?php if ($_SESSION['id_role'] == 1): ?>
                <div class="profile-admin__table-data_del col-2"><a href="<?=BASE_URL . '/admin/feedback/edit.php?del_id=' . $feedback['id_feedback'].'&id='.$id?>">Delete</a></div>
              <?php endif;?>
            <?php endif;?>
            <?php if(isset($_SESSION['id'])): ?>
              <?php if ($_SESSION['id'] == findUserById($feedback['id_user'])['id_user']): ?>
                <div class="profile-admin__table-data_change col-2"><a href="<?=BASE_URL . '/app/pages/edit_feedback.php?id_feed='.$feedback['id_feedback']?>">Изменить</a></div>
              <?php endif;?>
            <?php endif;?>
            </div>
        </div>
        <?php endforeach;?>
      </arcticle>
    </main>
  </body>
  </body>
</html>