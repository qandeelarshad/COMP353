<?php require_once '../database.php';

// $db_name = "ruc353_1";
// $table_name = ".Country";
$db_name = "local_ruc353_1";
$table_name = ".vaccine";

// check if all data has been passed
if(isset($_POST["vaccine_id"]) && isset($_POST["vaccine_name"])) {
    
    $vaccine = $conn->prepare("INSERT INTO " .$db_name.$table_name. " (vaccine_id, vaccine_name)
                                VALUES (:vaccine_id, :vaccine_name);");

    $vaccine->bindParam(":vaccine_id", $_POST["vaccine_id"]);
    $vaccine->bindParam(":vaccine_name", $_POST["vaccine_name"]);

    
    if ( $vaccine->execute()) {
        header("Location: ."); //brings to index of vaccine
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vaccine</title>
</head>
<body>
    <h1>Add vaccine</h1>
    <form action="./create.php" method="post">
        <label for="vaccine_id"> Vaccine ID</label><br>
        <input type="number" name="vaccine_id" id="vaccine_id"> <br>

        <label for="vaccine_name"> Vaccine name</label><br>
        <input type="text" name="vaccine_name" id="vaccine_name"> <br>
        
        <button type="submit">Add</button>
    </form>
    <a href="./"> Back to Vaccine list</a>
</body>
</html>