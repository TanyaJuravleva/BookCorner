<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/app/database/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/path.php';
date_default_timezone_set('UTC');
$errMsg = '';

$books = selectAll('book');
$series = selectAll('series');
$genres = selectAll('genre');
$authors = selectAll('author');

function photoSecurity($photo)
{
    $name = $photo['name'];
    $type = $photo['type'];
    $blacklist = array(".php", ".js", ".html");

    foreach($blacklist as $row)
    {
        if(preg_match("/$row\$/i", $name)) return false;
    }

    if(($type != "image/png") && ($type != "image/jpg") && ($type != "image/jpeg")) return false;

    return true;
}

function loadPhoto($photo)
{
    $type = $photo['type'];
    $name = md5(microtime()).'.'.substr($type, strlen("image/"));
    $dir = $_SERVER['DOCUMENT_ROOT'] . '/images/books/';
    $uploadFile = $dir  .$name;

    if(move_uploaded_file($photo['tmp_name'], $uploadFile)){
        return $name;
    }
}

//Код для формы создания книги
if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['book-create']))  
{
    $name = trim($_POST['name']);
    $id_seria =trim($_POST['book-seria']);
    $date_of_receipt = date('y-m-j');//сегодня
    $annotatinon = trim($_POST['text']);
    $age_restrictions = trim($_POST['age']);
    $publish_year = trim($_POST['publish']);;
    $str_book_authors = trim($_POST['authors']);
    $str_book_genres = trim($_POST['genres']);
    $book_authors = explode(',', $str_book_authors);
    $book_genres = explode(',', $str_book_genres);
    $photo_path = '';

    $photo_file = $_FILES['photo'];

    if ($name === '' || $annotatinon === '' || $age_restrictions === '' || $publish_year === '') 
    {
        $errMsg = " Не все поля заполнены";
    }elseif(strlen($name) < 2 || strlen($annotatinon) < 2) {
        $errMsg = "более 2х символов";
    }else{
        $existance = selectOne('book', ['name' => $name]); 
        if ($existance)
        {
            if ($existance['name']=== $name)
            {
                $errMsg = "Такая книга уже есть";
            }
        }else{
            if (photoSecurity($photo_file)) $photo_path = loadPhoto($photo_file);
            $book = [
                'name' => $name,
                'id_series' => $id_seria,
                'date_of_receipt' => $date_of_receipt,
                'annotatinon' => $annotatinon,
                'age_restrictions' => $age_restrictions,
                'publish_year' => $publish_year,
                'photo_path' => $photo_path
            ];
            $id_book = insert('book', $book);
            if ($book_genres[0] !== '')
            {
                foreach($book_genres as $key => $id_genre)
                {
                    $param = [
                        'id_book' => $id_book,
                        'id_genre'=> $id_genre
                    ];
                    insert('book_has_genres', $param);
                }
            }
            if ($book_authors[0] !== '')
            {
                foreach($book_authors as $key => $id_author)
                {
                    $param = [
                        'id_book' => $id_book,
                        'id_author'=> $id_author
                    ];
                    insert('author_has_books', $param);
                }
            }
            header('location:' . BASE_URL . "/admin/book/index.php");
        }
    }
} else {
    $name = '';
    $id_seria ='';
    $date_of_receipt = '';
    $annotatinon = '';
    $age_restrictions = '';
    $publish_year = '';
    $photo_path = '';
    $book_authors = array();
    $book_genres = array();
    $str_book_authors = '';
    $str_book_genres = '';
    $photo_file = array();
}
//Код для редактирования книги
if (($_SERVER['REQUEST_METHOD'] === 'GET') && isset($_GET['id']))  {
    $id = $_GET['id'];
    $book = selectOne('book', ['id_book' => $id]);
    $id = $book['id_book'];
    $name = $book['name'];
    $id_seria = $book['id_series'];
    $date_of_receipt = $book['date_of_receipt'];
    $annotatinon = $book['annotatinon'];
    $age_restrictions = $book['age_restrictions'];
    $publish_year = $book['publish_year'];
    $photo_path = $book['photo_path'];
    $feedbacks = findAllFeedbacksByBookId($id);
    $_SESSION['photo_path'] = $photo_path;

    $arr_sql_genres = selectAll('book_has_genres', ['id_book'=>$id]);
    $book_genres = array();
    foreach($arr_sql_genres as $key => $val)
    {
        $id_genre = $val['id_genre'];
        array_push($book_genres, $id_genre);
    }
    $str_book_genres = implode(",", $book_genres);


    $arr_sql_authors = selectAll('author_has_books', ['id_book'=>$id]);
    $book_authors = array();
    foreach($arr_sql_authors as $key => $val)
    {
        $id_author = $val['id_author'];
        array_push($book_authors, $id_author);
    }
    $str_book_authors = implode(",", $book_authors);
    $_SESSION['id_book'] = $id;
}

if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['book-edit']))  
{
    $name = trim($_POST['name']);
    $id_seria =trim($_POST['book-seria']);
    $date_of_receipt = trim($_POST['date_of_receipt']);
    $annotatinon = trim($_POST['text']);
    $age_restrictions = trim($_POST['age']);
    $publish_year = trim($_POST['publish']);;
    $str_book_authors = trim($_POST['authors']);
    $str_book_genres = trim($_POST['genres']);
    $book_authors = explode(',', $str_book_authors);
    $book_genres = explode(',', $str_book_genres);
    $photo_file = $_FILES['photo'];

    if ($name === '' || $annotatinon === '' || $age_restrictions === '' || $publish_year === '') 
    {
        $errMsg = " Не все поля заполнены";
    }elseif(strlen($name) < 2 || strlen($annotatinon) < 2) {
        $errMsg = "более 2х символов";
    }else{
        if ($photo_file)
        {
            unlink( $_SERVER['DOCUMENT_ROOT']. '\\images\books\\' . $_SESSION['photo_path']);
            if (photoSecurity($photo_file)) $photo_path = loadPhoto($photo_file);
        }
        unset($_SESSION['photo_path']);
        $book = [
            'name' => $name,
            'id_series' => $id_seria,
            'date_of_receipt' => $date_of_receipt,
            'annotatinon' => $annotatinon,
            'age_restrictions' => $age_restrictions,
            'publish_year' => $publish_year,
            'photo_path' => $photo_path
        ];
        $id = $_POST['id'];
        //удалить старые author и genres
        deleteCond('book_has_genres', ['id_book' => $id]);
        deleteCond('author_has_books', ['id_book' => $id]);
        if ($book_genres[0] !== '')
        {
            foreach($book_genres as $key => $id_genre)
            {
                $param = [
                    'id_book' => $id,
                    'id_genre'=> $id_genre
                ];
                insert('book_has_genres', $param);
            }
        }
        if ($book_authors[0] !== '')
        {
            foreach($book_authors as $key => $id_author)
            {
                $param = [
                    'id_book' => $id,
                    'id_author'=> $id_author
                ];
                insert('author_has_books', $param);
            }
        }
        update('book', $id, $book);
        unset($_SESSION['id_book']);
        header('location:' . BASE_URL . "/admin/book/index.php");
    }
}


//Код для удаления книги
if (($_SERVER['REQUEST_METHOD'] === 'GET') && isset($_GET['del_id']))  {
    $id = $_GET['del_id'];
    $book = selectOne('book', ['id_book' => $id]);
    unlink( $_SERVER['DOCUMENT_ROOT']. '\\images\books\\' . $book['photo_path']);
    deleteCond('author_has_books', ['id_book' => $id]);
    deleteCond('book_has_genres', ['id_book' => $id]);
    delete('book', $id);
    header('location:' . BASE_URL . "/admin/book/index.php");
}