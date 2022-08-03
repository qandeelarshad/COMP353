<?php
// backend code goes here
require_once '../database.php';

$db_name = "ruc353_1";
$table_name = ".Country";
// $db_name = "local_ruc353_1";
// $table_name = ".country";

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
    <h1>List of Countries</h1>
    <a href="./create.php">Add a country</a>
    <table>
        <!-- header -->
        <thead> 
            <!-- row -->
            <tr>
                <!-- cell -->
                <td>country_id</td>
                <td>country_name</td>
                <td>region_id</td>      
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { ?>
                <tr>
                    <td><?= $row["country_id"] ?></td>
                    <td><?= $row["country_name"] ?></td>
                    <td><?= $row["region_id"] ?></td>
                    <td>
                        <a href="./show.php?country_id=<?=$row["country_id"] ?>">Show</a>
                        <a href="./edit.php?country_id=<?=$row["country_id"] ?>">Edit</a>
                        <a href="./delete.php?country_id=<?=$row["country_id"] ?>">Delete</a>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
    <a href="../home.php">Back to homepage</a>
</body>
</html>