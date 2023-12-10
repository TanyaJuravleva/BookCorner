<?php
//session_start();
// function connectToDB() {
//     static $link;
//     $data = include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
//     return !isset($link) ? $link = mysqli_connect($data['db_host'],$data['db_user'],$data['db_pass'],$data['db_name']) : $link; 
// }

// function check_auth(): bool
// {
//     return !!($_SESSION['user_id'] ?? false);
// }
$data = include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
$link = mysqli_connect($data['db_host'],$data['db_user'],$data['db_pass'],$data['db_name']);
if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    mysqli_set_charset($link, "utf8");
}