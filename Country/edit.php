<?php require_once '../database.php';

//show current data of country:
$getcountry = $conn->prepare("SELECT * FROM local_ruc353_1.country AS country
                            WHERE country.country_id = :country_id;");

$getcountry->bindParam(":country_id", $_GET["country_id"]);
$getcountry->execute();
$country = $getcountry->fetch(PDO::FETCH_ASSOC); //fetch the data to country

// check if all data has been passed
if(isset($_POST["country_name"]) &&
   isset($_POST["region_id"]) && 
   isset($_POST["government_id"]) && 
   isset($_POST["country_id"])) {
    
    $countryUpdate = $conn->prepare("UPDATE local_ruc353_1.country SET country_name = :country_name,
                                                                    region_id = :region_id, 
                                                                    government_id = :government_id
                                WHERE country_id = :country_id;");

    $countryUpdate->bindParam(":country_name", $_POST["country_name"]);
    $countryUpdate->bindParam(":region_id", $_POST["region_id"]);
    $countryUpdate->bindParam(":government_id", $_POST["government_id"]);
    $countryUpdate->bindParam(":country_id", $_POST["country_id"]);


    if ( $countryUpdate->execute()) {
        header("Location: ."); //brings to index of country
    } else {
        header("Location: ./edit.php?country_id=".$_POST["country_id"]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Country</title>
</head>
<body>
    <h1>Edit country</h1>
    <form action="./edit.php" method="post">

        <label for="country_name"> Name</label><br>
        <input type="text" name="country_name" id="country_name" value="<?= $country["country_name"] ?>"> <br>

        <label for="region_id"> Region ID</label><br>
        <input type="number" name="region_id" id="region_id" value="<?= $country["region_id"] ?>"> <br>
 
        <label for="government_id"> Governement ID</label><br>
        <input type="number" name="government_id" id="government_id" value="<?= $country["government_id"] ?>"> <br>
        
        <!-- hidden input -->
        <input type="hidden" name="country_id" id="country_id" value="<?= $country["country_id"] ?>"> <br>

        <button type="submit">Update</button>
    </form>
    <a href="./"> Back to Country list</a>
</body>
</html>