<?php
require_once $_SERVER['DOCUMENT_ROOT']."/app/database/db.php";

$isSubmit = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $pass = trim($_POST['password']);
    $id_role = 2;

    if ($login === '' || $email === '' || $pass)
    {
        
    }

    $post = [
        'name' => $name,
        'email' => $email,
        'phone_number' => $phone,
        'password' => $pass,
        'id_role' => $id_role,
    ];

    $id = insert('user', $post);
    $last_row = selectOne('user', ['id_user' => $id]);
    tt($last_row);
}

// if (isset($_POST['name']))
// {


// }