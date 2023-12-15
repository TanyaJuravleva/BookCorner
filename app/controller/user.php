<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/app/database/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/path.php';
$errMsg = '';

$users = selectAll('user');
$roles = selectAll('role');

//Код для формы создания пользователя
if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['user-create']))  
{
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $date_of_birth = trim($_POST['date']);
    $phone_number = trim($_POST['phone']);
    $password = trim($_POST['pass']);
    $id_role = trim($_POST['user-role']);
    if ($name === '' || $email === '' || $password === '' || $id_role == ''){
        $errMsg = "Не все поля заполнены";
    }elseif(strlen($name) < 2 || strlen($email) < 2) {
        $errMsg = "более 2х символов";
    }else{
        $existance = selectOne('user', ['email' => $email]); 
        if ($existance['email'] == $email)
        {
            $errMsg = "Такой пользователь уже есть";
        }else{
            $user = [
                'name' => $name,
                'email' => $email,
                'date_of_birth' => $date_of_birth,
                'phone_number' => $phone_number,
                'password' => $password,
                'id_role' => $id_role
            ];
            insert('user', $user);
            header('location:' . BASE_URL . "/admin/user/index.php");
        }
    }
} else {
    $name = '';
    $email = '';
    $date_of_birth = '';
    $phone_number = '';
    $password = '';
    $id_role = '';
}
//Код для редактирования пользователя
if (($_SERVER['REQUEST_METHOD'] === 'GET') && isset($_GET['id']))  {
    $id = $_GET['id'];
    $user = selectOne('user', ['id_user' => $id]);
    $id = $user['id_user'];
    $name = $user['name'];
    $email = $user['email'];
    $date_of_birth = $user['date_of_birth'];;
    $phone_number = $user['phone_number'];
    $password = $user['password'];
    $id_role = $user['id_role'];
    $_SESSION['id_user'] = $id;
}

if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['user-edit']))  
{
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $date_of_birth = trim($_POST['date']);
    $phone_number = trim($_POST['phone']);
    $password = trim($_POST['pass']);
    $id_role = trim($_POST['user-role']);
    if ($name === '' || $email === '' || $password === '' || $id_role == ''){
        $errMsg = "Не все поля заполнены";
    }elseif(strlen($name) < 2 || strlen($email) < 2) {
        $errMsg = "более 2х символов";
    }else{
        $user = [
            'name' => $name,
            'email' => $email,
            'date_of_birth' => $date_of_birth,
            'phone_number' => $phone_number,
            'password' => $password,
            'id_role' => $id_role
        ];
        $id = $_POST['id'];
        update('user', $id, $user);
        unset($_SESSION['id_user']);
        header('location:' . BASE_URL . "/admin/user/index.php");
    }
}


//Код для удаления пользователя
if (($_SERVER['REQUEST_METHOD'] === 'GET') && isset($_GET['del_id']))  {
    $id = $_GET['del_id'];
    //удаление feedback
    delete('user', $id);
    header('location:' . BASE_URL . "/admin/user/index.php");
}