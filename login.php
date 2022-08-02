<?php 
session_start(); 

require_once "database.php";

// if (isset($_POST['user_username']) && isset($_POST['user_password'])) {

//     function validate($data){
//        $data = trim($data);
//        $data = stripslashes($data);
//        $data = htmlspecialchars($data);
//        return $data;
//     }
// }

    // $uname = validate($_POST['user_username']);
    // $pass = validate($_POST['user_password']);

    $uname = $_POST['user_username'];
    $pass = $_POST['user_password'];

    if (empty($uname)) {
        header("Location: index.php?error=User Name is required");
        exit();

    } else if (empty($pass)){
        header("Location: index.php?error=Password is required");
        exit();
    }

        $db_name = "local_ruc353_1";
        $table_name = ".user";

        // $getuser = $conn->prepare("SELECT * FROM " .$db_name.$table_name. " 
        //                                 WHERE user_username='$uname' AND user_password='$pass';");

        $sql_query = "SELECT * FROM " .$db_name.$table_name. " WHERE user_username='$uname' AND user_password='$pass';";

    
        $result = $conn->query($sql_query);
        

        if ($result->rowCount() === 1) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {

            // $row = mysqli_fetch_assoc($result);


            if ($row['user_username'] == $uname && $row['user_password'] == $pass) {

                echo "Logged in!";

                // Log in session
                $_SESSION['user_username'] = $row['user_username'];
                $_SESSION['user_first_name'] = $row['user_first_name'];
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['role_id'] = $row['role_id'];

                header("Location: home.php"); //check this
                exit();

            }
            else{

                header("Location: index.php?error=Incorect User name or password");
                exit();

            }

        }
    }
        else{

            header("Location: index.php?error=Incorect User name or password");
            exit();

        }

?>

