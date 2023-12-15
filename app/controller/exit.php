<?php
include $_SERVER['DOCUMENT_ROOT']."/path.php";
require_once $_SERVER['DOCUMENT_ROOT']."/app/database/db.php";

if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['exit']))
{
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    unset($_SESSION['email']);
    unset($_SESSION['phone']);
    unset($_SESSION['id_role']);
    unset($_SESSION['date']);
    unset($_SESSION['pass']);
    
    header('location:' . BASE_URL . "/index_02.php");
}

// unset($_SESSION['id']);
// unset($_SESSION['name']);
// unset($_SESSION['email']);
// unset($_SESSION['phone']);
// unset($_SESSION['id_role']);
// unset($_SESSION['date']);
// unset($_SESSION['pass']);

// $response = [
//     'status' => 200
// ];
// echo json_encode($response);
