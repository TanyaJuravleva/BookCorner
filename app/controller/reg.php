<?php
require_once $_SERVER['DOCUMENT_ROOT']."/app/database/db.php";
$errMsg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user-create']))
{
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $pass = trim($_POST['pass']);
    $date = trim($_POST['date']);
    $id_role = 2;

    if ($name === '' || $email === '' || $pass == ''){
        $errMsg = "Не все поля заполнены";
    } elseif (strlen($name) < 2){
        $errMsg = "Логин должен быть более 2-х символов";
    } elseif (strlen($phone) < 12){
        $errMsg = "Телефон содержит 12 символов";
    }else{
        $existance = selectOne('user', ['email' => $email]); 
        if ($existance){
            if ($existance['email'] === $email)
            {
                $errMsg = "Такой пользовательуже есть";
            }
        }else{
                $post = [
                    'name' => $name,
                    'email' => $email,
                    'phone_number' => $phone,
                    'password' => $pass,
                    'date_of_birth' => $date,
                    'id_role' => $id_role,
                ];
                $id = insert('user', $post);
                $user = selectOne('user', ['id_user' => $id]);
                $_SESSION['id'] = $user['id_user'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['phone'] = $user['phone_number'];
                $_SESSION['id_role'] = $user['id_role'];
                $_SESSION['date'] = $user['date_of_birth'];
                $_SESSION['pass'] = $user['password'];
                header('location:' . BASE_URL . "/index_02.php");
            }
    }
} else {
    $name = '';
    $pass = '';
    $email = '';
    $phone = '';
}