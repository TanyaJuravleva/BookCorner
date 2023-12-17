<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/app/database/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/path.php';
$errMsg = '';

$feedbacks = selectAll('feedback');

//Код для формы создания комментария
if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['feedback-create']))  
{
    $id_book = trim($_POST['id_book']);
    $email = trim($_POST['email']);
    $date = trim($_POST['date']);
    $rating = (int)trim($_POST['rating']);
    $text = trim($_POST['text']);
    if ($id_book === '' || $email === '' || $rating === '' || $date === '')
    {
        $errMsg = "Не все поля заполнены";
    }elseif((strlen($email) < 2)) {
        $errMsg = "более 2х символов";
    }else{
        $existance = findUserByEmail($email); 
        if (isset($existance['email']))
        {
            $feedback = [
                'id_book' => $id_book,
                'id_user' => $existance['id_user'],
                'text' => $text,
                'rating' => $rating,
                'date' => $date
            ];
            insert('feedback', $feedback);
            header('location:' . BASE_URL . "/admin/feedback/index.php");
        }
        else{
            $errMsg = 'Такого пользователя нет';
        }
    }
} else {
    $id_book = '';
    $email = '';
    $text = '';
    $rating = '';
    $date ='';
}

//Код для редактирования комментария
if (($_SERVER['REQUEST_METHOD'] === 'GET') && isset($_GET['id']))  {
    $id = $_GET['id'];
    $feedback = findFeedbackById($id);
    $id = $feedback['id_feedback'];
    $id_book = $feedback['id_book'];
    $email = findUserById($feedback['id_user'])['email'];
    $date = $feedback['date'];
    $text = $feedback['text'];
    $rating = $feedback['rating'];
    $_SESSION['id_feedback'] = $id;
}

if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['feedback-edit']))  
{
    $id_book = trim($_POST['id_book']);
    $email = trim($_POST['email']);
    $rating = (int)trim($_POST['rating']);
    $text = trim($_POST['text']);
    $date = trim($_POST['date']);
    if ($id_book === '' || $email === '' || $rating === '' || $date === '')
    {
        $errMsg = "Не все поля заполнены";
    }elseif((strlen($email) < 2)) {
        $errMsg = "более 2х символов";
    }else{
        $existance = findUserByEmail($email); 
        if (isset($existance['email']))
        {
            $feedback = [
                'id_book' => $id_book,
                'id_user' => $existance['id_user'],
                'text' => $text,
                'rating' => $rating,
                'date' => $date
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
    if (isset($_GET['id']))
    {
        header('location:' . BASE_URL . "/app/pages/book_02.php?id=".$_GET['id']);
    }
    else{
        header('location:' . BASE_URL . "/admin/feedback/index.php");
    }
}