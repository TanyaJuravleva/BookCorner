<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/app/database/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/path.php';
$errMsg = '';
$id = '';

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
        header('location:' . BASE_URL . "/admin/category/index.php");
    }
}


//Код для удаления категории
if (($_SERVER['REQUEST_METHOD'] === 'GET') && isset($_GET['del_id']))  {
    $id = $_GET['del_id'];
    delete('category', $id);
    header('location:' . BASE_URL . "/admin/category/index.php");
}