<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/app/database/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/path.php';
date_default_timezone_set('UTC');
$errMsg = '';

$books = selectAll('book');
$series = selectAll('series');
$genres = selectAll('genre');
$authors = selectAll('author');

//Код для формы создания книги
if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['book-create']))  
{
    $name = trim($_POST['name']);
    $id_seria =trim($_POST['book-seria']);
    $date_of_receipt = date('y-m-j');//сегодня
    $annotatinon = trim($_POST['text']);
    $age_restrictions = trim($_POST['age']);
    $publish_year = trim($_POST['publish']);;
    $photo_path = trim($_POST['photo']);
    $str_book_authors = trim($_POST['authors']);
    $str_book_genres = trim($_POST['genres']);
    $book_authors = explode(',', $str_book_authors);
    $book_genres = explode(',', $str_book_genres);
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

// if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['book-edit']))  
// {
//     $name = trim($_POST['category-name']);
//     if ($name === '')
//     {
//         $errMsg = "Название не заполнено";
//     }elseif(strlen($name) < 2) {
//         $errMsg = "Название категории более 2х символов";
//     }else{
//         $category = [
//             'name' => $name
//         ];
//         $id = $_POST['id'];
//         update('category', $id, $category);
//         unset($_SESSION['id_category']);
//         header('location:' . BASE_URL . "/admin/category/index.php");
//     }
// }


// //Код для удаления книги
// if (($_SERVER['REQUEST_METHOD'] === 'GET') && isset($_GET['del_id']))  {
//     $id = $_GET['del_id'];
//     deleteCond('genre', ['id_category' => $id]);
//     delete('category', $id);
//     header('location:' . BASE_URL . "/admin/category/index.php");
// }