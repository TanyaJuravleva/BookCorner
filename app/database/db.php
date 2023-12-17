<?php
session_start();
require('connect.php');

function tt($value) {
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}

//проверка выполнения запроса к БД
function dbCheckError($query) {
    if (!$query) {
        exit();
    }
    return true;
}

//Запрос на получения данных одной таблицы
function selectAll($table, $params = []) {
    global $link;
    $sql = "SELECT * FROM $table";
    if (!empty($params)) {
        $i = 0;
        foreach($params as $key => $value) {
            if (!is_numeric($value)){
                $value = "'" . $value . "'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE $key = $value";
            }
            else{
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

//Запрос на получения одной строки с выбранной таблицы
function selectOne($table, $params = [])
{
    global $link;
    $sql = "SELECT * FROM $table";
    if (!empty($params)){
        $i = 0;
        foreach($params as $key => $value){
            if (!is_numeric($value)){
                $value = "'" . $value . "'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE $key = $value";
            }
            else{
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }
    $sql = $sql . " LIMIT 1";

    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_array($query, MYSQLI_ASSOC);
}

function insert($table, $params){
    global $link;

    $i = 0;
    $coll = '';
    $mas = '';
    foreach($params as $key => $value){
        if (empty($value)) {
            if ($i !== 0){
                $coll = $coll . ", $key";
                $mas = $mas . ", ". 'NULL';
            }
            else{
                $coll = $coll . "$key";
                $mas = $mas . 'NULL';
            }
        }elseif ($i === 0) {
            $coll = $coll . "$key";
            $mas = $mas . "'" . "$value" . "'";
        }else{
            $coll = $coll . ", $key";
            $mas = $mas . ", '" . "$value" . "'";
        }
        $i++;
    }

    $sql = "INSERT INTO $table ($coll) VALUES ($mas)";

    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_insert_id($link);
}

//обновление строки в таблице
function update($table, $id, $params){
    global $link;

    $i = 0;
    $str = '';
    foreach($params as $key => $value){
        if (empty($value)) {
            if ($i !== 0){
                $str = $str . ", " . $key . " = " . 'NULL' ;
            }
            else{
                $str = $str . $key . " = " . 'NULL' ;
            }
        }
        elseif ($i === 0) {
            $str = $str . $key . " = '" . $value . "'";
        }else{
            $str = $str . ", " . $key . " = '" . $value . "'";
        }
        $i++;
    }

    $sql = "UPDATE $table SET $str WHERE id_$table = $id";
    print($sql);
    //exit();
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
}

function delete($table, $id)
{
    global $link;
    $sql = "DELETE FROM $table WHERE id_$table = $id";
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
}

function deleteCond($table, $params = [])
{
    global $link;
    $sql = "DELETE FROM $table";
    if (!empty($params)){
        $i = 0;
        foreach($params as $key => $value){
            if (!is_numeric($value)){
                $value = "'" . $value . "'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE $key = $value";
            }
            else{
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
}

function findBookByCategory($id_category)
{
    $sql = "SELECT DISTINCT book.id_book, book.name, book.photo_path FROM genre 
        JOIN category ON category.id_category = genre.id_category
        JOIN book_has_genres ON genre.id_genre = book_has_genres.id_genre
        JOIN book ON book.id_book = book_has_genres.id_book
        WHERE category.id_category = " . $id_category;
    global $link;
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function findBooksByGenre($id_genre)
{
    $sql = "SELECT DISTINCT book.id_book, book.name, book.photo_path FROM genre 
        JOIN book_has_genres ON genre.id_genre = book_has_genres.id_genre
        JOIN book ON book.id_book = book_has_genres.id_book
        WHERE genre.id_genre = " . $id_genre;
    global $link;
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function findGenreByIdGenre($id_genre)
{
    return selectOne('genre', ['id_genre' => $id_genre]);
}

function findCategoryByIdCategory($id_category)
{
    return selectOne('category', ['id_category' => $id_category]);
}

function findUserByEmail($email)
{
    return selectOne('user', ['email' => $email]); 
}

function findUserById($id_user)
{
    return selectOne('user', ['id_user' => $id_user]); 
}

function findAuthorById($id_author)
{
    return selectOne('author', ['id_author' => $id_author]); 
}

function findGenresByBookID($id_book)
{
    $sql = "SELECT genre.id_genre, genre.name FROM genre 
        JOIN book_has_genres ON genre.id_genre = book_has_genres.id_genre
        JOIN book ON book.id_book = book_has_genres.id_book
        WHERE book.id_book = " . $id_book;
    global $link;
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function findAuthorsByBookID($id_book)
{
    $sql = "SELECT author.first_name, author.last_name, author.id_author FROM author 
        JOIN author_has_books ON author_has_books.id_author = author.id_author
        JOIN book ON book.id_book = author_has_books.id_book
        WHERE book.id_book = " . $id_book;
    global $link;
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function findFeedbackById($id_feedback)
{
    return selectOne('feedback', ['id_feedback' => $id_feedback]);
}

function findAllFeedbacksByBookId($id_book)
{
   return selectAll('feedback', ['id_book' => $id_book]);
}




//$arr = [
   // 'id_role' => ,
//    'name' => 'ger'
//];

//insert('role', $arr);
//tt(selectAll('role'));

//  delete('role', 4);
//  tt(selectAll('role'));

// $arr = [
//     'name' => 'turbo'
// ];

// update('role', 3, $arr);
// tt(selectAll('role'));

// $arr = [
//     'id_role' => NULL,
//     'name' => 'ger'
// ];

//insert('role', $arr);
//tt(selectAll('role'));

// $params = [
//     //'id_role' => 2,
//     //'name' => 'bill'
// ];
// tt(selectOne('user', $params));
//if ($query)
//{
//    while ($row = mysqli_fetch_array($query)) {
 //       print($row);
 //   }
//}
//$user = mysqli_fetch_assoc($query);

//for ($row as $user)
//{
////    print($row);
//}
// if (!empty($user)) {
// } else {
// }
// function correctConenctToBD()
// {
//     include __DIR__.'/boot.php';
//     $link = connectToDB();
    
//     if ($link == false){
//         print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
//         return;
//     }
//     else {
//         mysqli_set_charset($link, "utf8");
//         return $link;
//     }
// }



//echo phpinfo();
//$link = mysqli_connect("127.0.0.1", "root", "123321tany", "bookcorner");
//$conn = new mysqli("localhost", "root", "123321tany", "hotelbooking");
?> 