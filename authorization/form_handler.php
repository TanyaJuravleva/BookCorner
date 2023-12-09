<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/boot.php';
$link = connectToDB();

function getPOSTParameter($name)
{
    return isset($_POST[$name]) ? $_POST[$name]: null;
}

$name = getPOSTParameter('name');
$password = getPOSTParameter('password');

if (!empty($name) and !empty($password)) {
    
    $query = "SELECT id_user, name, password FROM user WHERE name='$name' AND password='$password'";
    $res = mysqli_query($link, $query);
    $user = mysqli_fetch_assoc($res);
    
    if (!empty($user)) {
        $_SESSION['user_id'] = $user['id_user'];
        header('Location: ../index.php');
    } else {
        //print("нет такого");
        header('Location: ../index.php');
    }
 }