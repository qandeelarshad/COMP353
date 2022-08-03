<?php
// backend code goes here
require_once '../database.php';
session_start();

$db_name = "ruc353_1";
$table_name = ".User";
// $db_name = "local_ruc353_1";
// $table_name = ".user";

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
    <title>Users</title>
</head>
<body>
    <h1>List of Users</h1>
    <?php if (($_SESSION['role_id'] == 4 )) { ?>
    <a href="./create.php">Add a User</a>
    <?php } ?>
    <table>
        <!-- header -->
        <thead> 
            <!-- row -->
            <tr>
                <!-- cell -->
                <td>user_id</td>
                <td>user_first_name</td>
                <td>user_last_name</td>
                <td>user_phone</td>
                <td>user_email</td>       
                <td>user_username</td>       
                <td>user_password</td>       
                <td>role_id</td>       
                <td>user_citizenship</td>       
                <td>user_is_suspended</td>       
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { ?>
                <tr>
                    <td><?= $row["user_id"] ?></td>
                    <td><?= $row["user_first_name"] ?></td>
                    <td><?= $row["user_last_name"] ?></td>
                    <td><?= $row["user_phone"] ?></td>
                    <td><?= $row["user_email"] ?></td>
                    <td><?= $row["user_username"] ?></td>
                    <td><?= $row["user_password"] ?></td>
                    <td><?= $row["role_id"] ?></td>
                    <td><?= $row["user_citizenship"] ?></td>
                    <td><?= $row["user_is_suspended"] ?></td>
                    <td>

                        <?php if (($_SESSION['role_id'] == 4 )) { ?>

                        <a href="./show.php?user_id=<?=$row["user_id"] ?>">Show</a>
                        <a href="./edit.php?user_id=<?=$row["user_id"] ?>">Edit</a>
                        <a href="./delete.php?user_id=<?=$row["user_id"] ?>">Delete</a>

                        <!-- <form method="post">
                        <input type="submit" name="Suspend"
                            class="button" value="Suspend" />
                        </form> -->

                        <?php
        // if(array_key_exists('Suspend', $_POST)) {
        //     button1();
        // }

        // function button1() {
        //     require_once '../database.php';
        //     // $db_name = "ruc353_1";
        //     // $table_name = ".User";
        //     $db_name = "local_ruc353_1";
        //     $table_name = ".user";
        //     $countryUpdate = $conn->prepare("UPDATE " .$db_name.$table_name. " SET user_is_suspended = :user_is_suspended
        //                                                         WHERE user_id = :user_id;");
        // }
    ?> 
                        <?php } else {?>
                            <a href="./show.php?user_id=<?=$row["user_id"] ?>">Show</a>
                            <?php } ?>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
    <a href="../home.php">Back to homepage</a> <br>
    <a href="../logout.php">Logout </a>
</body>
</html>