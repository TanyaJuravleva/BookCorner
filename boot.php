<?php
session_start();
function connectToDB() {
    static $link;
    $data = include __DIR__.'/config/config.php';
    return !isset($link) ? $link = mysqli_connect($data['db_host'],$data['db_user'],$data['db_pass'],$data['db_name']) : $link; 
}

function check_auth(): bool
{
    return !!($_SESSION['user_id'] ?? false);
}