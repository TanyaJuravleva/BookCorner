<?php
require_once $_SERVER['DOCUMENT_ROOT']."/app/database/db.php";

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, true);

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $name = $input['name'];
    $email = $input['email'];
    $phone = $input['phone'];
    $pass = $input['pass'];
    $id_role = 2;

    // if ($name === '' || $email === '' || $pass == ''){
    //     $response = [
    //         'status' => 500,
    //         'errMsg' => "Не все поля заполнены"
    //     ];
    //     echo json_encode($response);
    // } elseif (strlen($name) < 2){
    //     $response = [
    //         'status' => 500,
    //         'errMsg' => "Логин должен быть более 2-х символов"
    //     ];
    //     echo json_encode($response);
    // }else{
        $existance = selectOne('user', ['email' => $email]); 

        if ($existance){
            if ($existance['email'] === $email)
            {
                $response = [
                    'status' => 500
                ];
                echo json_encode($response);
            }
        }else{
                $post = [
                    'name' => $name,
                    'email' => $email,
                    'phone_number' => $phone,
                    'password' => $pass,
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
                $response = [
                    'status' => 200
                ];
                echo json_encode($response);
            }
    //}
} else {
    $name = '';
    $pass = '';
    $email = '';
    $phone = '';
}