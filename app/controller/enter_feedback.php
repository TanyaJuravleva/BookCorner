<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/app/database/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/path.php';
date_default_timezone_set('Europe/Moscow');
$errMsg = '';


if (($_SERVER['REQUEST_METHOD'] === 'GET') && isset($_GET['id']))  {
    $id_book = trim($_GET['id']);
    $id_user = trim($_SESSION['id']);
    $_SESSION['id_book'] = $id_book;
}

if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['feedback-enter']))  
{
    $id_book = $_SESSION['id_book'];
    $id_user = $_SESSION['id'];
    $rating = (int)trim($_POST['rating']);
    $date = date("Y-m-d H:i:s");//сегодня
    $text = trim($_POST['text']);
    if ($rating == NULL)
    {
        $errMsg = "Проставте рэйтинг";
    }else{
        $feedback = [
            'id_book' => $id_book,
            'id_user' => $id_user,
            'text' => $text,
            'rating' => $rating,
            'date' => $date
        ];
        $id = insert('feedback', $feedback);
        $id_book = findFeedbackById($id)['id_book'];
        unset($_SESSION['id_book']);
        header('location:' . BASE_URL . "/app/pages/book_02.php?id=".$id_book);
    }
} else {
    $id_book = '';
    $id_user = '';
    $text = '';
    $rating = '';
    $date ='';
}

if (($_SERVER['REQUEST_METHOD'] === 'GET') && isset($_GET['id_feed']))  {
    $id = $_GET['id_feed'];
    $feed = findFeedbackById($id);
    $rating = $feed['rating'];
    $text = $feed['text'];
    $_SESSION['id_feedback'] = $id;
}



if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['feedback-edit']))  
{
    $id = $_SESSION['id_feedback'];
    $rating = (int)trim($_POST['rating']);
    $date = date("Y-m-d H:i:s");//сегодня
    $text = trim($_POST['text']);
    if ($rating == NULL)
    {
        $errMsg = "Проставте рэйтинг";
    }else{
        $feedback = [
            'text' => $text,
            'rating' => $rating,
            'date' => $date
        ];
        update('feedback',$id, $feedback);
        $id_book = findFeedbackById($id)['id_book'];
        unset($_SESSION['id_feedback']);
        header('location:' . BASE_URL . "/app/pages/book_02.php?id=".$id_book);
    }
}