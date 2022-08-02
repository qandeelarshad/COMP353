<?php require_once '../database.php';

// $db_name = "ruc353_1";
// $table_name = ".User";
$db_name = "local_ruc353_1";
$table_name = ".user";

// check if all data has been passed
if(isset($_POST["country_name"]) && isset($_POST["region_id"]) && isset($_POST["government_id"])) {
    $country = $conn->prepare("INSERT INTO " .$db_name.$table_name. " (country_name, region_id, government_id)
                                VALUES (:country_name, :region_id, :government_id);");

    $country->bindParam(":country_name", $_POST["country_name"]);
    $country->bindParam(":region_id", $_POST["region_id"]);
    $country->bindParam(":government_id", $_POST["government_id"]);

    
    if ( $country->execute()) {
        header("Location: ."); //brings to index of country
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Country</title>
</head>
<body>
    <h1>Add country</h1>
    <form action="./create.php" method="post">
        <label for="country_name"> Name</label><br>
        <input type="text" name="country_name" id="country_name"> <br>

        <label for="region_id"> Region ID</label><br>
        <input type="number" name="region_id" id="region_id"> <br>

        <label for="government_id"> Governement ID</label><br>
        <input type="number" name="government_id" id="government_id"> <br>
        
        <button type="submit">Add</button>
    </form>
    <a href="./"> Back to Country list</a>
</body>
</html>