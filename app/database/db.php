<?php
session_start();
require('connect.php');

function tt($value) {
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    //exit();
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

function findBooksByGenreForPopular($id_genre)
{
    $sql = "SELECT DISTINCT book.id_book, book.name, book.photo_path, AVG(feedback.rating) as rat FROM genre 
    JOIN book_has_genres ON genre.id_genre = book_has_genres.id_genre
    JOIN book ON book.id_book = book_has_genres.id_book
    LEFT JOIN feedback ON feedback.id_book = book.id_book
    WHERE genre.id_genre = " . $id_genre .
        " GROUP BY book.id_book
        ORDER BY rat DESC";
    global $link;
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function findBooksByGenreForDate($id_genre)
{
    $sql = "SELECT DISTINCT book.id_book, book.name, book.photo_path, book.date_of_receipt FROM genre 
    JOIN book_has_genres ON genre.id_genre = book_has_genres.id_genre
    JOIN book ON book.id_book = book_has_genres.id_book
    WHERE genre.id_genre = " . $id_genre .
        " ORDER BY book.date_of_receipt DESC";
    global $link;
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function findBooksByCategoryForPopular($id_category)
{
    $sql = "SELECT DISTINCT book.id_book, book.name, book.photo_path, AVG(feedback.rating) AS rat FROM genre 
            JOIN category ON category.id_category = genre.id_category
            JOIN book_has_genres ON genre.id_genre = book_has_genres.id_genre
            JOIN book ON book.id_book = book_has_genres.id_book
            LEFT JOIN feedback ON feedback.id_book = book.id_book
            WHERE category.id_category = " . $id_category . 
                " GROUP BY book.id_book
                ORDER BY rat DESC";
    global $link;
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function findBooksByCategoryForDate($id_category)
{
    $sql = "SELECT DISTINCT book.id_book, book.name, book.photo_path, book.date_of_receipt FROM genre 
            JOIN category ON category.id_category = genre.id_category
            JOIN book_has_genres ON genre.id_genre = book_has_genres.id_genre
            JOIN book ON book.id_book = book_has_genres.id_book
            WHERE category.id_category = " . $id_category .
                " ORDER BY book.date_of_receipt DESC";
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
    $sql = "SELECT * FROM feedback
            WHERE id_book =" . $id_book . 
            " ORDER BY date DESC";
    global $link;
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function findCategoryByBookId($id_book)
{
    $sql = "SELECT DISTINCT category.id_category, category.name FROM category
        JOIN genre ON genre.id_category = category.id_category
        JOIN book_has_genres ON book_has_genres.id_genre = genre.id_genre
        JOIN book ON book_has_genres.id_book = book.id_book
        WHERE book.id_book = " . $id_book;
    global $link;
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function findRatingByBookId($id_book)
{
    $sql = "SELECT AVG(feedback.rating) AS avg_rating FROM book
            JOIN feedback ON feedback.id_book = book.id_book
            WHERE book.id_book = " . $id_book;
    global $link;
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_array($query, MYSQLI_ASSOC);
}

function findAuthorsByAsc()
{
    $sql = "SELECT * FROM author ".
           " ORDER BY first_name, last_name, patronymic ASC";
    global $link;
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function findSeriesByAsc()
{
    $sql = "SELECT * FROM series ".
           " ORDER BY name ASC";
    global $link;
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function findBooksOfSeriesBySeriesId($id_seria)
{
    $sql = "SELECT * FROM book WHERE id_series = ".$id_seria .
            " ORDER BY name ASC";
    global $link;
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function findBooksOfAuthorsByIdAuthor($id_author)
{
    $sql = "SELECT * FROM book 
            JOIN author_has_books ON author_has_books.id_book = book.id_book
            JOIN author ON author.id_author = author_has_books.id_author 
            WHERE author.id_author = ". $id_author . 
           " ORDER BY book.date_of_receipt DESC";
    global $link;
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function findNewBooks()
{
    $sql = "SELECT * FROM book ORDER BY date_of_receipt DESC";
    global $link;
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function findNewBooksLimit()
{
    $sql = "SELECT * FROM book ORDER BY date_of_receipt DESC LIMIT 5";
    global $link;
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function findPopularBooks()
{
    $sql = "SELECT DISTINCT book.id_book, book.name, book.photo_path, AVG(feedback.rating) as rat FROM book 
    LEFT JOIN feedback ON feedback.id_book = book.id_book
        GROUP BY book.id_book
        ORDER BY rat DESC";
    global $link;
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function findPopularBooksLimit()
{
    $sql = "SELECT DISTINCT book.id_book, book.name, book.photo_path, AVG(feedback.rating) as rat FROM book 
        LEFT JOIN feedback ON feedback.id_book = book.id_book
        GROUP BY book.id_book
        ORDER BY rat DESC LIMIT 5";
    global $link;
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function findAuthorsByGenreId($id_genre)
{
    $sql = "SELECT  DISTINCT author.id_author, author.first_name, author.last_name, author.patronymic, AVG(feedback.rating) as rat FROM author 
        JOIN author_has_books ON author_has_books.id_author = author.id_author
        JOIN book ON book.id_book = author_has_books.id_book
        LEFT JOIN feedback ON feedback.id_book = book.id_book
        JOIN book_has_genres ON book_has_genres.id_book = book.id_book
        JOIN genre ON genre.id_genre = book_has_genres.id_genre
        WHERE genre.id_genre = " . $id_genre .
        " GROUP BY author.id_author
          ORDER BY rat DESC";
    global $link;
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function findAuthorsByCategoryId($id_category)
{
    $sql = "SELECT  DISTINCT author.id_author, author.first_name, author.last_name, author.patronymic, AVG(feedback.rating) as rat FROM author 
        JOIN author_has_books ON author_has_books.id_author = author.id_author
        JOIN book ON book.id_book = author_has_books.id_book
        LEFT JOIN feedback ON feedback.id_book = book.id_book
        JOIN book_has_genres ON book_has_genres.id_book = book.id_book
        JOIN genre ON genre.id_genre = book_has_genres.id_genre
        JOIN category ON category.id_category = genre.id_category
        WHERE category.id_category = " . $id_category .
        " GROUP BY author.id_author
          ORDER BY rat DESC";
    global $link;
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function findAuthorsByRating()
{
    $sql = "SELECT  DISTINCT author.id_author, author.first_name, author.last_name, author.patronymic, AVG(feedback.rating) as rat FROM author 
        JOIN author_has_books ON author_has_books.id_author = author.id_author
        JOIN book ON book.id_book = author_has_books.id_book
        LEFT JOIN feedback ON feedback.id_book = book.id_book
         GROUP BY author.id_author
         ORDER BY rat DESC";
    global $link;
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function findNameByAsc($table_name, $params =[])
{
    $sql = "SELECT * FROM " . $table_name;
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
    $sql = $sql . " ORDER BY name ASC";
    global $link;
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

//поиск по названию книги
function findBooksBySearch($text)
{
    $text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));
    $sql = "SELECT  * FROM book
        WHERE name LIKE '%$text%'";
    global $link;
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function findNotThisAuthor($id_author, $id_book)
{
    $sql = "SELECT  * FROM author_has_books WHERE id_author != " . $id_author . " AND id_book = " . $id_book;
    global $link;
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function findAllBooksWithFeedbackByUserId($id_user)
{
    $sql = "SELECT  * FROM book 
            JOIN feedback ON feedback.id_book = book.id_book
            JOIN user ON feedback.id_user = user.id_user
            WHERE user.id_user = " . $id_user;
    global $link;
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function findBookAnotherGenres($id_genre, $id_book)
{
    $sql = "SELECT * FROM book
            JOIN book_has_genres ON book_has_genres.id_book = book.id_book
            WHERE book_has_genres.id_genre != " . $id_genre . " AND book.id_book = " . $id_book;
    global $link;
    $query = mysqli_query($link, $sql);
    dbCheckError($query);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function deleteBook($id)
{
    $book = selectOne('book', ['id_book' => $id]);
    unlink( $_SERVER['DOCUMENT_ROOT']. '\\images\books\\' . $book['photo_path']);
    deleteCond('feedback', ['id_book' => $id]);
    deleteCond('author_has_books', ['id_book' => $id]);
    deleteCond('book_has_genres', ['id_book' => $id]);
    delete('book', $id);
}

function deleteGenre($id)
{
    $booksOfGenre = selectAll('book_has_genres', ['id_genre' => $id]);
    foreach($booksOfGenre as $key => $val)
    {
        $id_book = $val['id_book'];
        $arr = findBookAnotherGenres($id, $id_book);
        if (!$arr)
        {
            deleteBook($id_book);
        } 
    }
    deleteCond('book_has_genres', ['id_genre' => $id]);
    delete('genre', $id);
}