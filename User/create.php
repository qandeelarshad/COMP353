<?php require_once '../database.php';

$db_name = "ruc353_1";
$table_name = ".User";
// $db_name = "local_ruc353_1";
// $table_name = ".user";

// check if all data has been passed
if(isset($_POST["user_first_name"])
 && isset($_POST["user_last_name"]) 
&& isset($_POST["user_phone"]) 
&& isset($_POST["user_email"]) 
&& isset($_POST["user_username"])
&& isset($_POST["user_password"]) 
// && isset($_POST["role_id"]) && isset($_POST["user_citizenship"])
) {
    
    $country = $conn->prepare("INSERT INTO " .$db_name.$table_name. " (user_first_name, user_last_name, 
                                                                        user_phone, user_email, user_username, 
                                                                        user_password, role_id, user_citizenship)
                                VALUES (:user_first_name, :user_last_name, 
                                :user_phone, :user_email, :user_username, 
                                :user_password, :role_id, :user_citizenship);");

    // $country->bindParam(":user_id", $_POST["user_id"]);
    $country->bindParam(":user_first_name", $_POST["user_first_name"]);
    $country->bindParam(":user_last_name", $_POST["user_last_name"]);
    $country->bindParam(":user_phone", $_POST["user_phone"]);
    $country->bindParam(":user_email", $_POST["user_email"]);
    $country->bindParam(":user_username", $_POST["user_username"]);
    $country->bindParam(":user_password", $_POST["user_password"]);
    $country->bindParam(":role_id", $_POST["role_id"]);
    $country->bindParam(":user_citizenship", $_POST["user_citizenship"]);
    // $country->bindParam(":user_is_suspended", $_POST["user_is_suspended"]);

    
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
    <title>Add User</title>
</head>
<body>
    <h1>Add User</h1>
    <form action="./create.php" method="post">

        <label for="user_first_name">First Name</label><br>
        <input type="text" name="user_first_name" id="user_first_name"> <br>

        <label for="user_last_name"> Last Name</label><br>
        <input type="text" name="user_last_name" id="user_last_name"> <br>

        <label for="user_phone"> Phone</label><br>
        <input type="text" name="user_phone" id="user_phone"> <br>

        <label for="user_email"> Email</label><br>
        <input type="text" name="user_email" id="user_email"> <br>

        <label for="user_username"> Username</label><br>
        <input type="text" name="user_username" id="user_username"> <br>

        <label for="user_password"> Password</label><br>
        <input type="text" name="user_password" id="user_password"> <br>

        <label for="role_id"> Role</label><br>
        <input type="number" name="role_id" id="role_id"> <br>

        <label for="user_citizenship"> Citizenship</label><br>
        <input type="text" name="user_citizenship" id="user_citizenship"> <br>

        <!-- <label for="user_is_suspended"> Suspension Date</label><br>
        <input type="date" name="user_is_suspended" id="user_is_suspended"> <br> -->
        
        <button type="submit">Add</button>
    </form>
    <a href="./"> Back to Users list</a>
</body>
</html>