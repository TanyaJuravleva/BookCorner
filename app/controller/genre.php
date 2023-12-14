<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/app/database/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/path.php';
$errMsg = '';
$id = '';

$genres = selectAll('genre');
$categories = selectAll('category');

//Код для формы создания жанра
if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['genre-create']))  
{
    $name = trim($_POST['genre-name']);
    $id_category = trim($_POST['genre-category']);
    if ($name === '' || $id_category === '')
    {
        $errMsg = "Не все поля заполнены";
    }elseif(strlen($name) < 2) {
        $errMsg = "Название жанра более 2х символов";
    }else{
        $existance = selectOne('genre', ['name' => $name]); 
        if ($existance['name'] == $name)
        {
            $errMsg = "Такой жанр уже есть";
        }else{
            $genre = [
                'name' => $name,
                'id_category' => $id_category
            ];
            insert('genre', $genre);
            header('location:' . BASE_URL . "/admin/genre/index.php");
        }
    }
} else {
    $name = '';
    $id_category = '';
}



//Код для редактирования жанра
if (($_SERVER['REQUEST_METHOD'] === 'GET') && isset($_GET['id']))  {
    $id = $_GET['id'];
    $genre = selectOne('genre', ['id_genre' => $id]);
    $id = $genre['id_genre'];
    $name = $genre['name'];
    $id_category = $genre['id_category'];
    $_SESSION['id_genre'] = $id;
}

if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['genre-edit']))  
{
    $name = trim($_POST['genre-name']);
    $id_category = trim($_POST['genre-category']);
    if ($name === '' || $id_category === '')
    {
        $errMsg = "Не все поля заполнены";
    }elseif(strlen($name) < 2) {
        $errMsg = "Название жанра более 2х символов";
    }else{
        $genre = [
            'name' => $name,
            'id_category' => $id_category
        ];
        $id = $_POST['id'];
        update('genre', $id, $genre);
        unset($_SESSION['id_genre']);
        header('location:' . BASE_URL . "/admin/genre/index.php");
    }
}


//Код для удаления жанра
if (($_SERVER['REQUEST_METHOD'] === 'GET') && isset($_GET['del_id']))  {
    $id = $_GET['del_id'];
    deleteCond('book_has_genres', ['id_genre' => $id]);
    delete('genre', $id);
    header('location:' . BASE_URL . "/admin/genre/index.php");
}