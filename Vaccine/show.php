<?php require_once '../database.php';

// $db_name = "ruc353_1";
// $table_name = ".Country";
$db_name = "local_ruc353_1";
$table_name = ".vaccine";

//show current data of vaccine:
$getvaccine = $conn->prepare("SELECT * FROM " .$db_name.$table_name. " AS vaccine
                            WHERE vaccine.vaccine_id = :vaccine_id;");

$getvaccine->bindParam(":vaccine_id", $_GET["vaccine_id"]);
$getvaccine->execute();
$vaccine = $getvaccine->fetch(PDO::FETCH_ASSOC); //fetch the data to vaccine

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $vaccine["vaccine_id"] ?></title>
</head>
<body>
    <h1><?= $vaccine["vaccine_id"] ?></h1>
    <h2>vaccine name: <?= $vaccine["vaccine_name"] ?></h2>
    
</body>
</html>