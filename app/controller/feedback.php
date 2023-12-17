<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/app/database/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/path.php';
$errMsg = '';

$feedbacks = selectAll('feedback');

//Код для формы создания комментария
if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['feedback-create']))  
{
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $rating = (int)trim($_POST['rating']);
    $text = trim($_POST['text']);
    if ($name === '' || $email === '' || $rating === '')
    {
        $errMsg = "Не все поля заполнены";
    }elseif((strlen($email) < 2)) {
        $errMsg = "более 2х символов";
    }else{
        $existance = findUserByEmail($email); 
        if (isset($existance['email']))
        {
            $feedback = [
                'id_book' => $name,
                'id_user' => $existance['id_user'],
                'text' => $text,
                'rating' => $rating
            ];
            insert('feedback', $feedback);
            header('location:' . BASE_URL . "/admin/feedback/index.php");
        }
        else{
            $errMsg = 'Такого пользователя нет';
        }
    }
} else {
    $name = '';
    $email = '';
    $text = '';
    $rating = '';
}

//Код для редактирования комментария
if (($_SERVER['REQUEST_METHOD'] === 'GET') && isset($_GET['id']))  {
    $id = $_GET['id'];
    $feedback = findFeedbackById($id);
    $id = $feedback['id_feedback'];
    $name = $feedback['id_book'];
    $email = findUserById($feedback['id_user'])['email'];
    $text = $feedback['text'];
    $rating = $feedback['rating'];
    $_SESSION['id_feedback'] = $id;
}

if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['feedback-edit']))  
{
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $rating = (int)trim($_POST['rating']);
    $text = trim($_POST['text']);
    if ($name === '' || $email === '' || $rating === '')
    {
        $errMsg = "Не все поля заполнены";
    }elseif((strlen($email) < 2)) {
        $errMsg = "более 2х символов";
    }else{
        $existance = findUserByEmail($email); 
        if (isset($existance['email']))
        {
            $feedback = [
                'id_book' => $name,
                'id_user' => $existance['id_user'],
                'text' => $text,
                'rating' => $rating
            ];
            $id = $_POST['id'];
            update('feedback', $id, $feedback);
            unset($_SESSION['id_feedback']);
            header('location:' . BASE_URL . "/admin/feedback/index.php");
        }
        else{
            $errMsg = 'Такого пользователя нет';
        }
    }
}


//Код для удаления автора
if (($_SERVER['REQUEST_METHOD'] === 'GET') && isset($_GET['del_id']))  {
    $id = $_GET['del_id'];
    delete('feedback', $id);
    header('location:' . BASE_URL . "/admin/feedback/index.php");
}