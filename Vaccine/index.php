<?php
// backend code goes here
require_once '../database.php';

// $db_name = "ruc353_1";
// $table_name = ".Country";
$db_name = "local_ruc353_1";
$table_name = ".vaccine";

$sql_query = "SELECT * FROM " .$db_name.$table_name;
$statement = $conn->query($sql_query);
// $statement->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMP353_test</title>
</head>
<body>
    <h1>List of Vaccines</h1>
    <a href="./create.php">Add a vaccine</a>
    <table>
        <!-- header -->
        <thead> 
            <!-- row -->
            <tr>
                <!-- cell -->
                <td>vaccine_id</td>
                <td>vaccine_name</td>     
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { ?>
                <tr>
                    <td><?= $row["vaccine_id"] ?></td>
                    <td><?= $row["vaccine_name"] ?></td>
                    <td>
                        <a href="./show.php?vaccine_id=<?=$row["vaccine_id"] ?>">Show</a>
                        <a href="./edit.php?vaccine_id=<?=$row["vaccine_id"] ?>">Edit</a>
                        <a href="./delete.php?vaccine_id=<?=$row["vaccine_id"] ?>">Delete</a>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
    <a href="../home.php">Back to homepage</a>
</body>
</html>