<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/header_02.css">
    <link rel="stylesheet" href="./css/profile_admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php 
    include "./header_02.php";
    ?>
    <div class="container">
        <div class="row profile-admin">
            <?php include "./slidebar_admin.php" ?> 
            <div class="profile-admin__table col-9">
                <div class="profile-admin__btns">
                    <a href="./create_book.php" class="btn btn-primary btn-lg">Добавить книгу</a>
                    <a href="#" class="btn btn-secondary btn-lg">Редактировать книгу</a>
                </div>
                <h2 class="profile-admin__table-title">Управление книгами</h2>
                <div>
                    <div class="profile-admin__table-names row">
                        <div class="profile-admin__table-row col-1">ID</div>
                        <div class="profile-admin__table-row col-5">Название</div>
                        <div class="profile-admin__table-row col-2">Автор</div>
                        <div class="profile-admin__table-row col-1">Edit</div>
                        <div class="profile-admin__table-row col-1">Delete</div>
                    </div>
                </div>
                <!-- Прогонять бд по циклу -->
                <div class="profile-admin__table-data row">
                    <div class="profile-admin__table-row col-1">1</div>
                    <div class="profile-admin__table-row col-5">Какое то азвание</div>
                    <div class="profile-admin__table-row col-2">Какой то автор</div>
                    <div class="profile-admin__table-row profile-admin__table-data_edit col-1"><a href="#">Edit</a></div>
                    <div class="profile-admin__table-row profile-admin__table-data_del col-1"><a href="#">Delete</a></div>
                </div>
                <div class="profile-admin__table-data row">
                    <div class="profile-admin__table-row col-1">1</div>
                    <div class="profile-admin__table-row col-5">Какое то азвание</div>
                    <div class="profile-admin__table-row col-2">Какой то автор</div>
                    <div class="profile-admin__table-row profile-admin__table-data_edit col-1"><a href="#">Edit</a></div>
                    <div class="profile-admin__table-row profile-admin__table-data_del col-1"><a href="#">Delete</a></div>
                </div>
            </div>

            <div class="profile-admin__table col-9">
                <div class="profile-admin__btns">
                    <a href="./create_user.php" class="btn btn-primary btn-lg">Добавить пользователя</a>
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

            <div class="profile-admin__table col-9">
                <div class="profile-admin__btns">
                    <a href="./create_author.php" class="btn btn-primary btn-lg">Добавить автора</a>
                    <a href="#" class="btn btn-secondary btn-lg">Редактировать автора</a>
                </div>
                <h2 class="profile-admin__table-title">Управление автором</h2>
                <div>
                    <div class="profile-admin__table-names row">
                        <div class="profile-admin__table-row col-1">ID</div>
                        <div class="profile-admin__table-row col-5">First Name</div>
                        <div class="profile-admin__table-row col-2">Last Name</div>
                        <div class="profile-admin__table-row col-1">Patronymic</div>
                        <div class="profile-admin__table-row col-1">Edit</div>
                        <div class="profile-admin__table-row col-1">Delete</div>
                    </div>
                </div>
                <!-- Прогонять бд по циклу -->
                <div class="profile-admin__table-data row">
                    <div class="profile-admin__table-row col-1">1</div>
                    <div class="profile-admin__table-row col-2">First Name</div>
                    <div class="profile-admin__table-row col-2">Last Name</div>
                    <div class="profile-admin__table-row col-2">Patro</div>
                    <div class="profile-admin__table-row profile-admin__table-data_edit col-1"><a href="#">Edit</a></div>
                    <div class="profile-admin__table-row profile-admin__table-data_del col-1"><a href="#">Delete</a></div>
                </div>
                <div class="profile-admin__table-data row">
                    <div class="profile-admin__table-row col-1">1</div>
                    <div class="profile-admin__table-row col-2">Какое то азвание</div>
                    <div class="profile-admin__table-row col-2">Какой то автор</div>
                    <div class="profile-admin__table-row col-2">Какой то автор</div>
                    <div class="profile-admin__table-row profile-admin__table-data_edit col-1"><a href="#">Edit</a></div>
                    <div class="profile-admin__table-row profile-admin__table-data_del col-1"><a href="#">Delete</a></div>
                </div>
            </div>

            <div class="profile-admin__table col-9">
                <div class="profile-admin__btns">
                    <a href="./create_category.php" class="btn btn-primary btn-lg">Добавить категорию</a>
                    <a href="#" class="btn btn-secondary btn-lg">Редактировать категорию</a>
                </div>
                <h2 class="profile-admin__table-title">Управление категориями</h2>
                <div>
                    <div class="profile-admin__table-names row">
                        <div class="profile-admin__table-row col-1">ID</div>
                        <div class="profile-admin__table-row col-5">Name</div>
                    </div>
                </div>
                <!-- Прогонять бд по циклу -->
                <div class="profile-admin__table-data row">
                    <div class="profile-admin__table-row col-1">1</div>
                    <div class="profile-admin__table-row col-5">First Name</div>
                </div>
                <div class="profile-admin__table-data row">
                    <div class="profile-admin__table-row col-1">1</div>
                    <div class="profile-admin__table-row col-5">Какое то азвание</div>
                </div>
            </div>

            <div class="profile-admin__table col-9">
                <div class="profile-admin__btns">
                    <a href="./create_genre.php" class="btn btn-primary btn-lg">Добавить жанр</a>
                    <a href="#" class="btn btn-secondary btn-lg">Редактировать жанр</a>
                </div>
                <h2 class="profile-admin__table-title">Управление жанрами</h2>
                <div>
                    <div class="profile-admin__table-names row">
                        <div class="profile-admin__table-row col-1">ID</div>
                        <div class="profile-admin__table-row col-5">Name</div>
                        <div class="profile-admin__table-row col-5">Category Name</div>
                    </div>
                </div>
                <!-- Прогонять бд по циклу -->
                <div class="profile-admin__table-data row">
                    <div class="profile-admin__table-row col-1">1</div>
                    <div class="profile-admin__table-row col-5">First Name</div>
                    <div class="profile-admin__table-row col-5">First Name</div>
                </div>
                <div class="profile-admin__table-data row">
                    <div class="profile-admin__table-row col-1">1</div>
                    <div class="profile-admin__table-row col-5">Какое то азвание</div>
                    <div class="profile-admin__table-row col-5">First Name</div>
                </div>
            </div>

            <div class="profile-admin__table col-9">
                <div class="profile-admin__btns">
                    <a href="./create_seria.php" class="btn btn-primary btn-lg">Добавить серию</a>
                    <a href="#" class="btn btn-secondary btn-lg">Редактировать серию</a>
                </div>
                <h2 class="profile-admin__table-title">Управление сериями</h2>
                <div>
                    <div class="profile-admin__table-names row">
                        <div class="profile-admin__table-row col-1">ID</div>
                        <div class="profile-admin__table-row col-5">Name</div>
                    </div>
                </div>
                <!-- Прогонять бд по циклу -->
                <div class="profile-admin__table-data row">
                    <div class="profile-admin__table-row col-1">1</div>
                    <div class="profile-admin__table-row col-5">First Name</div>
                </div>
                <div class="profile-admin__table-data row">
                    <div class="profile-admin__table-row col-1">1</div>
                    <div class="profile-admin__table-row col-5">Какое то азвание</div>
                </div>
            </div>


        </div>
    </div>
  </body>
  </body>
</html>