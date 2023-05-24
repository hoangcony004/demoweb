<?php
//Ket noi toi MySQL
$severName = 'localhost';
$userName = 'root';
$password = '';
$databaseName = 'user_admin';
$conn = mysqli_connect($severName, $userName, $password, $databaseName);

//Kiem tra ket noi thanh cong khong
if (!$conn) {
    echo 'ket noi that bai';
    exit();
}
?>