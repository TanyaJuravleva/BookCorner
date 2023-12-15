<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/app/database/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/path.php';
$errMsg = '';

$series = selectAll('series');

//Код для формы создания категории
if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['seria-create']))  
{
    $name = trim($_POST['name']);
    if ($name === '')
    {
        $errMsg = "Название не заполнено";
    }elseif(strlen($name) < 2) {
        $errMsg = "Название серии более 2х символов";
    }else{
        $existance = selectOne('series', ['name' => $name]); 
        if ($existance['name'] == $name)
        {
            $errMsg = "Такая серия уже есть";
        }else{
            $seria = [
                'name' => $name
            ];
            insert('series', $seria);
            header('location:' . BASE_URL . "/admin/seria/index.php");
        }
    }
} else {
    $name = '';
}
//Код для редактирования категории
if (($_SERVER['REQUEST_METHOD'] === 'GET') && isset($_GET['id']))  {
    $id = $_GET['id'];
    $seria = selectOne('series', ['id_series' => $id]);
    $id = $seria['id_series'];
    $name = $seria['name'];
    $_SESSION['id_series'] = $id;
}

if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['seria-edit']))  
{
    $name = trim($_POST['name']);
    if ($name === '')
    {
        $errMsg = "Название не заполнено";
    }elseif(strlen($name) < 2) {
        $errMsg = "Название категории более 2х символов";
    }else{
        $seria = [
            'name' => $name
        ];
        $id = $_POST['id'];
        update('series', $id, $seria);
        unset($_SESSION['id_series']);
        header('location:' . BASE_URL . "/admin/seria/index.php");
    }
}


//Код для удаления категории
if (($_SERVER['REQUEST_METHOD'] === 'GET') && isset($_GET['del_id']))  {
    $id = $_GET['del_id'];
    $arr_book = selectAll('book', ['id_series' => $id]);
    foreach($arr_book as $key => $value)
    {
        update('book', $value['id_book'], ['id_series' => '']);
    }
    delete('series', $id);
    header('location:' . BASE_URL . "/admin/seria/index.php");
}