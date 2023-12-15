<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/app/database/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/path.php';
$errMsg = '';

$authors = selectAll('author');

//Код для формы создания автора
if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['author-create']))  
{
    $first_name = trim($_POST['first']);
    $last_name = trim($_POST['last']);
    $patron = trim($_POST['patron']);
    if ($first_name === '')
    {
        $errMsg = "Поле имя не заполнено";
        // || (strlen($last_name) < 2) || (strlen($patron) < 2)
    }elseif((strlen($first_name) < 2)) {
        $errMsg = "Имя должно быть более 2х символов";
    }else{
        $param = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'patronymic' => $patron
        ];
        $existance = selectOne('author', $param); 
        if ($existance['first_name'] == $first_name && $existance['last_name'] == $last_name && $existance['patronymic'] == $patron)
        {
            $errMsg = "Такой автор уже есть";
        }else{
            $author = [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'patronymic' => $patron
            ];
            insert('author', $author);
            header('location:' . BASE_URL . "/admin/author/index.php");
        }
    }
} else {
    $first_name = '';
    $last_name = '';
    $patron = '';
}

//Код для редактирования автора
if (($_SERVER['REQUEST_METHOD'] === 'GET') && isset($_GET['id']))  {
    $id = $_GET['id'];
    $author = selectOne('author', ['id_author' => $id]);
    $id = $author['id_author'];
    $first_name = $author['first_name'];
    $last_name = $author['last_name'];
    $patron = $author['patronymic'];
    $_SESSION['id_author'] = $id;
}

if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['author-edit']))  
{
    $first_name = trim($_POST['first']);
    $last_name = trim($_POST['last']);
    $patron = trim($_POST['patron']);
    if ($first_name === '')
    {
        $errMsg = "Поле имя не заполнено";
    }elseif((strlen($first_name) < 2)) {
        $errMsg = "Имя должно быть более 2х символов";
    }else{
        $author = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'patronymic' => $patron
        ];
        $id = $_POST['id'];
        update('author', $id, $author);
        unset($_SESSION['id_author']);
        header('location:' . BASE_URL . "/admin/author/index.php");
    }
}


//Код для удаления автора
if (($_SERVER['REQUEST_METHOD'] === 'GET') && isset($_GET['del_id']))  {
    $id = $_GET['del_id'];
    //удалить книгу
    deleteCond('author_has_books', ['id_author' => $id]);
    delete('author', $id);
    header('location:' . BASE_URL . "/admin/author/index.php");
}