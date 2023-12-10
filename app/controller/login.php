<?php

require_once $_SERVER['DOCUMENT_ROOT']."/app/database/db.php";

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, true);

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $email = $input['email'];
    $pass = $input['pass'];
    $existance = selectOne('user', ['email' => $email]); 
    if ($existance){
        if ($existance['email'] === $email)
        {
            if ($existance['password'] === $pass)
            {
                $_SESSION['id'] = $existance['id_user'];
                $_SESSION['name'] = $existance['name'];
                $_SESSION['email'] = $existance['email'];
                $_SESSION['phone'] = $existance['phone_number'];
                $_SESSION['id_role'] = $existance['id_role'];
                $_SESSION['date'] = $existance['date_of_birth'];
                $_SESSION['pass'] = $existance['password'];
                $response = [
                    'status' => 200
                ];
                echo json_encode($response);
            } else {
                $response = [
                    'status' => 500
                ];
                echo json_encode($response);
            }
        }
    }else{
        $response = [
            'status' => 500
        ];
        echo json_encode($response);
    }
} else {
    $name = '';
    $pass = '';
}

// $name = getPOSTParameter('name');
// $password = getPOSTParameter('password');

// if (!empty($name) and !empty($password)) {
    
//     $query = "SELECT id_user, name, password FROM user WHERE name='$name' AND password='$password'";
//     $res = mysqli_query($link, $query);
//     $user = mysqli_fetch_assoc($res);
    
//     if (!empty($user)) {
//         $_SESSION['id'] = $user['id_user'];
//         $_SESSION['name'] = $user['name'];
//         $_SESSION['email'] = $user['email'];
//         $_SESSION['phone'] = $user['phone_number'];
//         $_SESSION['id_role'] = $user['id_role'];
//         $_SESSION['date'] = $user['date_of_birth'];
//         $_SESSION['pass'] = $user['password'];
//         header('Location: ../index.php');
//     } else {
//         header('Location: ../index.php');
//     }
//  }