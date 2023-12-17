<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/app/database/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/path.php';

if (($_SERVER['REQUEST_METHOD'] === 'GET') && isset($_GET['id_genre']))  {
    $id = $_GET['id_genre'];
    $genre = findGenreByIdGenre($id);
    $name = $genre['name'];
    $books = findBooksByGenre($id);
}

if (($_SERVER['REQUEST_METHOD'] === 'GET') && isset($_GET['id_category']))  {
    $id = $_GET['id_category'];
    $category = findCategoryByIdCategory($id);
    $name = $category['name'];
    $books = findBookByCategory($id);
}