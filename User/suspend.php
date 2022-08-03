<?php
// backend code goes here
require_once '../database.php';
session_start();

$db_name = "ruc353_1";
$table_name = ".User";
// $db_name = "local_ruc353_1";
// $table_name = ".user";

$sql_query = "SELECT * FROM " .$db_name.$table_name;
$statement = $conn->query($sql_query);

// $statement->execute();
?>