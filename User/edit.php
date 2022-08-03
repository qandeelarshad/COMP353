<?php require_once '../database.php';

// $db_name = "ruc353_1";
// $table_name = ".User";
$db_name = "local_ruc353_1";
$table_name = ".user";

//show current data of country:
$getuser = $conn->prepare("SELECT * FROM " .$db_name.$table_name. " AS user
                            WHERE user.user_id = :user_id;");

$getuser->bindParam(":user_id", $_GET["user_id"]);
$getuser->execute();
$user = $getuser->fetch(PDO::FETCH_ASSOC); //fetch the data to country

// check if all data has been passed
if(isset($_POST["user_first_name"]) && isset($_POST["user_last_name"]) 
&& isset($_POST["user_phone"]) && isset($_POST["user_email"]) && isset($_POST["user_username"])
&& isset($_POST["user_password"]) && isset($_POST["role_id"]) && isset($_POST["user_citizenship"])
&& isset($_POST["user_is_suspended"])) {
    
    $countryUpdate = $conn->prepare("UPDATE " .$db_name.$table_name. " SET user_first_name = :user_first_name,
                                                                            user_last_name =  :user_last_name, 
                                                                            user_phone = :user_phone,
                                                                            user_email = :user_email,
                                                                            user_username = :user_username,
                                                                            user_password = :user_password,
                                                                            role_id = :role_id,
                                                                            user_citizenship = :user_citizenship,
                                                                             user_is_suspended = :user_is_suspended
                                                                WHERE user_id = :user_id;");

    $countryUpdate->bindParam(":user_id", $_POST["user_id"]);                                                                
    $countryUpdate->bindParam(":user_first_name", $_POST["user_first_name"]);
    $countryUpdate->bindParam(":user_last_name", $_POST["user_last_name"]);
    $countryUpdate->bindParam(":user_phone", $_POST["user_phone"]);
    $countryUpdate->bindParam(":user_email", $_POST["user_email"]);
    $countryUpdate->bindParam(":user_username", $_POST["user_username"]);
    $countryUpdate->bindParam(":user_password", $_POST["user_password"]);
    $countryUpdate->bindParam(":role_id", $_POST["role_id"]);
    $countryUpdate->bindParam(":user_citizenship", $_POST["user_citizenship"]);
    $countryUpdate->bindParam(":user_is_suspended", $_POST["user_is_suspended"]);


    if ($countryUpdate->execute()) {
        header("Location: ."); //brings to index of country
    } else {
        header("Location: ./edit.php?user_id=".$_POST["user_id"]);
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
    <script>
        function checkDateZero(value){
            if (value == '0000-00-00') {
                return null;
            }
        }
    </script>
</head>
<body>
    <h1>Edit User</h1>
    <form action="./edit.php" method="post">

    <label for="user_first_name">First Name</label><br>

        <input type="text" name="user_first_name" id="user_first_name" value="<?= $user["user_first_name"] ?>"> <br>

        <label for="user_last_name"> Last Name</label><br>
        <input type="text" name="user_last_name" id="user_last_name" value="<?= $user["user_last_name"] ?>"> <br>

        <label for="user_phone"> Phone</label><br>
        <input type="text" name="user_phone" id="user_phone" value="<?= $user["user_phone"] ?>"> <br>

        <label for="user_email"> Email</label><br>
        <input type="text" name="user_email" id="user_email" value="<?= $user["user_email"] ?>"> <br>

        <label for="user_username"> Username</label><br>
        <input type="text" name="user_username" id="user_username" value="<?= $user["user_username"] ?>"> <br>

        <label for="user_password"> Password</label><br>
        <input type="text" name="user_password" id="user_password" value="<?= $user["user_password"] ?>"> <br>

        <label for="role_id"> Role</label><br>
        <input type="number" name="role_id" id="role_id" value="<?= $user["role_id"] ?>"> <br>

        <label for="user_citizenship"> Citizenship</label><br>
        <input type="text" name="user_citizenship" id="user_citizenship" value="<?= $user["user_citizenship"] ?>"> <br>

        <!-- <label for="user_is_suspended"> Suspension Date</label><br>
        <input type="date" name="user_is_suspended" id="user_is_suspended" value="<?= $date = $user["user_is_suspended"]?>" > <br>    -->
        

            
        <!-- hidden input -->
        <input type="hidden" name="user_id" id="user_id" value="<?= $user["user_id"] ?>"> <br>
        <input type="hidden" name="lblItemName" value="<?php echo $ItemName; ?>">
        
        <button type="submit" >Update</button>
    </form>

    <a href="./"> Back to User list</a>
</body>
</html>