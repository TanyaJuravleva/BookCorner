<!-- <?php
function correctConenctToBD()
{
    include __DIR__.'/boot.php';
    $link = connectToDB();
    
    if ($link == false){
        print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
        return;
    }
    else {
        mysqli_set_charset($link, "utf8");
        return $link;
    }
}



//echo phpinfo();
//$link = mysqli_connect("127.0.0.1", "root", "123321tany", "bookcorner");
//$conn = new mysqli("localhost", "root", "123321tany", "hotelbooking");
?> -->