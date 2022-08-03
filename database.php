<?php
$servername = 'ruc353.encs.concordia.ca:3306';
$database = 'ruc353_1';
$username = 'ruc353_1';
$password = 'DROP_TAB';
// $servername = 'localhost:3306';
// $username = 'root';
// $password = '';
// $database = 'mysql';

// $conn = mysqli_connect($servername, $username, $password, $database);

// if (!$conn) {
//     echo "Connection Failed";
// }


    $conn = new PDO("mysql:host=$servername;dbname=$database;", $username, $password);

    if (!$conn) {
        echo "Connection Failed";
    }
?>