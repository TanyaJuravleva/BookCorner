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
        if ($i === 0) {
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
        if ($i === 0) {
            $str = $str . $key . " = '" . $value . "'";
        }else{
            $str = $str . ", " . $key . " = '" . $value . "'";
        }
        $i++;
    }

    $sql = "UPDATE $table SET $str WHERE id_$table = $id";

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