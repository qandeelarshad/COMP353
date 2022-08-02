<?php 
$sname= "localhost:3306";
$unmae= "root";
$password = "";
$db_name = "mysql";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {

    echo "Connection failed!";

}


session_start(); 

include "./database.php";

if (isset($_POST['user_username']) && isset($_POST['user_password'])) {

    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $uname = validate($_POST['user_username']);

    $pass = validate($_POST['user_password']);

    if (empty($uname)) {

        header("Location: index.php?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: index.php?error=Password is required");

        exit();

    } 
    else {

        $db_name = "local_ruc353_1";
        $table_name = ".user";

        // $getuser = $conn->prepare("SELECT * FROM " .$db_name.$table_name. " 
        //                                 WHERE user_username='$uname' AND user_password='$pass';");

         $sql = "SELECT * FROM " .$db_name.$table_name. " WHERE user_username='$uname' AND user_password='$pass';";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['user_username'] === $uname && $row['user_password'] === $pass) {

                echo "Logged in!";

                $_SESSION['user_username'] = $row['user_username'];

                $_SESSION['user_first_name'] = $row['user_first_name'];

                $_SESSION['user_id'] = $row['user_id'];

                header("Location: ./Country/index.php");

                exit();

            }else{

                header("Location: index.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: index.php?error=Incorect User name or password");

            exit();

        }

    }

} else {

    header("Location: index.php");

    exit();

}

?>

