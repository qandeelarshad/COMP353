<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMP 353_1 Database</title>
</head>
<body>
    <h1>Choose what you would like to do</h1>


    <?php
        include('database.php');
        $error = false; // Becomes true if there is a validation error

        $db_name = "local_ruc353_1";
        $table_name = ".user";

        $sql_query = "SELECT * FROM " .$db_name.$table_name;
        $user = $conn->query($sql_query);

        // Username validation
        if (isset($_POST['user_username']) && $_POST['user_username'] == '') {
            echo '<div id="error" class="alert alert-danger" role="alert"><strong>ERROR: </strong> Username can not be empty.</div>';
            $error = true;
        }
        // Password validation
        else if (isset($_POST['user_password'])) {
            if ($_POST['user_password'] == '') {
                echo '<div id="error" class="alert alert-danger" role="alert"><strong>ERROR: </strong> Password can not be empty.</div>';
                $error = true;
            }
        }
        // Validation passed
        if (isset($_POST['user_username']) && !$error) {
            $username = $_POST['user_username'];
            $password = hash("md5" ,$_POST['user_password']);
        
            // Fetch password of the user
            $sql = "SELECT * FROM " .$db_name.$table_name. " WHERE username = '$user_username'";
            $result = $conn->query($sql);
            // If there is no user with that username
            if ($result->num_rows == 0) {
                echo '<div id="error" class="alert alert-danger" role="alert"><strong>ERROR: </strong> Username does not exist.</div>';
            }
            // If the user exists
            else {
                $row = $result->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT);
                // Compare md5 hashes of the login password with the password in DB
                if ($user_password == $row["user_password"]) {
                    echo '<div id="error" class="alert alert-success" role="alert"><strong>SUCCESS: </strong> You are now logged in.</div>';
                    $_SESSION['loggedin'] = true;
                    $_SESSION['user_username'] = $row['user_username'];
                    echo "<script type='text/javascript'>document.location.href='index.php';</script>";
                }
                else {
                    echo '<div id="error" class="alert alert-danger" role="alert"><strong>ERROR: </strong> Password is incorrect.</div>';
                }
            }
        }
        ?>

        <form action="./Country/index.php" method="post">

        <label for="user_username"> Username</label><br>
        <input type="text" name="user_username" id="user_username" value="<?= $country["user_username"] ?>"> <br>

        <label for="user_password"> Region ID</label><br>
        <input type="text" name="user_password" id="user_password" value="<?= $country["user_password"] ?>"> <br>

        <button type="submit">Log In</button>
        </form>

    <a href="./Country/">Countries</a>
</body>
</html>