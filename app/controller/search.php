<?php
  require_once $_SERVER['DOCUMENT_ROOT']."/app/database/db.php";
  require_once $_SERVER['DOCUMENT_ROOT'].'/path.php';
 
  if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['search']))  
  {
    $search = $_POST['search'];
    $books = findBooksBySearch($search);
  }