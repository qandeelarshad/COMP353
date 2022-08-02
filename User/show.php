<?php require_once '../database.php';

// $db_name = "ruc353_1";
// $table_name = ".User";
$db_name = "local_ruc353_1";
$table_name = ".user";
$primary_key = "user_id";

//show current data of country:
$getuserid = $conn->prepare("SELECT * FROM " .$db_name.$table_name. " AS user
                            WHERE user.$primary_key = :$primary_key;");

$getuserid->bindParam(":$primary_key", $_GET["$primary_key"]);
$getuserid->execute();
$user = $getuserid->fetch(PDO::FETCH_ASSOC); //fetch the data to country

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $user["user_first_name"] ?></title>
</head>
<body>
    <h1><?= $user["user_first_name"] ?></h1>
    <h2>Citizenship: <?= $user["user_citizenship"] ?></h2>
</body>
</html>