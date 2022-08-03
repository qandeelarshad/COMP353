<?php
// backend code goes here
require_once '../database.php';

session_start();

// $db_name = "ruc353_1";
// $table_name = ".Country";
$db_name = "local_ruc353_1";
$table_name = ".article";

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
    <h1>List of Articles</h1>
    <?php if (($_SESSION['role_id'] == 3 ) OR ($_SESSION['role_id'] == 2 )) { ?>
    <a href="./create.php">Add an article</a>
    <?php }?>
    <table>
        <!-- header -->
        <thead> 
            <!-- row -->
            <tr>
                <!-- cell -->
                <td>article_id</td>
                <td>article_title</td>
                <td>article_major_topic</td>     
                <td>article_minor_topic</td> 
                <td>article_summary</td> 
                <td>article_body</td> 
                <td>article_date_published</td> 
                <td>article_researcher_id</td>  
                <td>article_organization_id</td> 
                <td>article_is_removed</td> 
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { ?>
                <tr>
                    <td><?= $row["article_id"] ?></td>
                    <td><?= $row["article_title"] ?></td>
                    <td><?= $row["article_major_topic"] ?></td>
                    <td><?= $row["article_minor_topic"] ?></td>
                    <td><?= $row["article_summary"] ?></td>
                    <td><?= $row["article_body"] ?></td>
                    <td><?= $row["article_date_published"] ?></td>
                    <td><?= $row["article_researcher_id"] ?></td>
                    <td><?= $row["article_organization_id"] ?></td>
                    <td><?= $row["article_is_removed"] ?></td>
                    <td>

                        <a href="./show.php?article_id=<?=$row["article_id"] ?>">Show</a>
                        <!-- <form method="post" action="subscribe.php">
                        <input type="submit" name="Subscribe"
                            class="button" value="Subscribe" />
                        </form> -->
                        <a href="./subscribe.php?article_id=<?=$row["article_id"] ?>">Subscribe</a>

                        

                        <?php 
                            if (($_SESSION['role_id'] == 2 && $_SESSION['user_id'] == $row["article_researcher_id"] ) OR ($_SESSION['role_id'] == 3 && $_SESSION['user_id'] == $row["article_researcher_id"] )) { ?>

                        <a href="./edit.php?article_id=<?=$row["article_id"] ?>">Edit</a>
                        <a href="./delete.php?article_id=<?=$row["article_id"] ?>">Delete</a>

                        <?php } ?>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
    <a href="../home.php">Back to homepage</a>
</body>
</html>