<?php
//echo phpinfo();
$link = mysqli_connect("localhost", "root", "123321tany", "hotelbooking");
//$conn = new mysqli("localhost", "root", "123321tany", "hotelbooking");
if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    print("Соединение установлено успешно");
}
?>