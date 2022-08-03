<?php require_once '../database.php';

// $db_name = "ruc353_1";
// $table_name = ".Country";
$db_name = "local_ruc353_1";
$table_name = ".country";

//show current data of country:
$getcountry = $conn->prepare("SELECT * FROM " .$db_name.$table_name. " AS country
                            WHERE country.country_id = :country_id;");

$getcountry->bindParam(":country_id", $_GET["country_id"]);
$getcountry->execute();
$country = $getcountry->fetch(PDO::FETCH_ASSOC); //fetch the data to country

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $country["country_name"] ?></title>
</head>
<body>
    <h1><?= $country["country_name"] ?></h1>
    <h2>Region ID: <?= $country["region_id"] ?></h2>
    <h2>Governement ID: <?= $country["government_id"] ?></h2>
    
</body>
</html>