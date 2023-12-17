<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/app/database/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/path.php';
$errMsg = '';

$users = selectAll('user');

//Код для редактирования пользователя
if (($_SERVER['REQUEST_METHOD'] === 'GET') && isset($_GET['id_user']))  {
    $id = $_GET['id_user'];
    $user = selectOne('user', ['id_user' => $id]);
    $id = $user['id_user'];
    $name = $user['name'];
    $email = $user['email'];
    $date_of_birth = $user['date_of_birth'];;
    $phone_number = $user['phone_number'];
    $password = $user['password'];
    $_SESSION['id_user'] = $id;
}

if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['user-edit']))  
{
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $date_of_birth = trim($_POST['date']);
    $phone_number = trim($_POST['phone']);
    $password = trim($_POST['pass']);
    if ($name === '' || $email === '' || $password === ''){
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
        ];
        $id = $_POST['id'];
        update('user', $id, $user);
        $user = findUserById($id);
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['phone'] = $user['phone_number'];
        $_SESSION['date'] = $user['date_of_birth'];
        $_SESSION['pass'] = $user['password'];
        unset($_SESSION['id_user']);
        header('location:' . BASE_URL . "/app/pages/profile_02.php");
    }
}