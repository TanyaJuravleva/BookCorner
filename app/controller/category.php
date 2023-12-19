<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/app/database/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/path.php';
$errMsg = '';

$categories = selectAll('category');

//Код для формы создания категории
if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['category-create']))  
{
    $name = trim($_POST['category-name']);
    if ($name === '')
    {
        $errMsg = "Название не заполнено";
    }elseif(strlen($name) < 2) {
        $errMsg = "Название категории более 2х символов";
    }else{
        $existance = selectOne('category', ['name' => $name]); 
        if ($existance['name'] == $name)
        {
            $errMsg = "Такая категория уже есть";
        }else{
            $category = [
                'name' => $name
            ];
            insert('category', $category);
            header('location:' . BASE_URL . "/admin/category/index.php");
        }
    }
} else {
    $name = '';
}
//Код для редактирования категории
if (($_SERVER['REQUEST_METHOD'] === 'GET') && isset($_GET['id']))  {
    $id = $_GET['id'];
    $category = selectOne('category', ['id_category' => $id]);
    $id = $category['id_category'];
    $name = $category['name'];
    $_SESSION['id_category'] = $id;
}

if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['category-edit']))  
{
    $name = trim($_POST['category-name']);
    if ($name === '')
    {
        $errMsg = "Название не заполнено";
    }elseif(strlen($name) < 2) {
        $errMsg = "Название категории более 2х символов";
    }else{
        $category = [
            'name' => $name
        ];
        $id = $_POST['id'];
        update('category', $id, $category);
        unset($_SESSION['id_category']);
        header('location:' . BASE_URL . "/admin/category/index.php");
    }
}


//Код для удаления категории
if (($_SERVER['REQUEST_METHOD'] === 'GET') && isset($_GET['del_id']))  {
    $id = $_GET['del_id'];
    $arrGenres = selectAll('genre', ['id_category' => $id]);
    foreach($arrGenres as $key => $val)
    {
        deleteGenre($val['id_genre']);
        // $arrBook = findBooksByGenre($val['id_genre']);
        // foreach($arrBook as $key1 => $value)
        // {
        //     $arr = findBookAnotherGenres($val['id_genre'], $value['id_book']);
        //     if (!$arr)
        //     {
        //        deleteCond('feedback', ['id_book' => $id_book]);
        //         deleteCond('book_has_genres', ['id_book' => $id_book]);
        //         deleteCond('author_has_books', ['id_book' => $id_book]);
        //         delete('book', $id_book);
        //     }
        // }
    }
    // $arrbook = findBookByCategory($id);
    // foreach($arrbook as $key => $val)
    // {
    //     $id_book = $val['id_book'];
    //     $arr = findBookAnotherGenres($id, $id_book);
    //     if (!$arr)
    //     {
    //         deleteCond('feedback', ['id_book' => $id_book]);
    //         deleteCond('book_has_genres', ['id_book' => $id_book]);
    //         deleteCond('author_has_books', ['id_book' => $id_book]);
    //         delete('book', $id_book);
    //     }
    // }
    // deleteCond('genre', ['id_category' => $id]);
    delete('category', $id);
    header('location:' . BASE_URL . "/admin/category/index.php");
}