<?php require_once '../database.php';

// $db_name = "ruc353_1";
// $table_name = ".Country";
$db_name = "local_ruc353_1";
$table_name = ".vaccine";

//show current data of country:
$getvaccine = $conn->prepare("SELECT * FROM " .$db_name.$table_name. " AS vaccine
                            WHERE vaccine.vaccine_id = :vaccine_id;");

$getvaccine->bindParam(":vaccine_id", $_GET["vaccine_id"]);
$getvaccine->execute();
$vaccine = $getvaccine->fetch(PDO::FETCH_ASSOC); //fetch the data to country

// check if all data has been passed
if(isset($_POST["vaccine_id"]) &&
   isset($_POST["vaccine_name"]) 
   ) {
    
    $vaccineUpdate = $conn->prepare("UPDATE " .$db_name.$table_name. " SET vaccine_id = :vaccine_id,
                                                                         vaccine_name = :vaccine_name
                                WHERE vaccine_id = :vaccine_id;");

    $vaccineUpdate->bindParam(":vaccine_id", $_POST["vaccine_id"]);
    $vaccineUpdate->bindParam(":vaccine_name", $_POST["vaccine_name"]);

    if ( $vaccineUpdate->execute()) {
        header("Location: ."); //brings to index of vaccine
    } else {
        header("Location: ./edit.php?vaccine_id=".$_POST["vaccine_id"]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Vaccine</title>
</head>
<body>
    <h1>Edit vaccine</h1>
    <form action="./edit.php" method="post">

        <label for="vaccine_id"> Vaccine ID</label><br>
        <input type="number" name="vaccine_id" id="vaccine_id" value="<?= $vaccine["vaccine_id"] ?>"> <br>

        <label for="vaccine_name"> Vaccine name</label><br>
        <input type="text" name="vaccine_name" id="vaccine_name" value="<?= $vaccine["vaccine_name"] ?>"> <br>

        <button type="submit">Update</button>
    </form>
    <a href="./"> Back to Vaccine list</a>
</body>
</html>