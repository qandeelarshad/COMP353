<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMP 353_1 Database</title>
</head>
<body>
    

    <form action="login.php" method="post">

        <h2>LOGIN</h2>

        <!-- check for errors -->
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <label>User Name</label>
        <input type="text" name="user_username" placeholder="User Name"><br>

        <label>Password</label>
        <input type="password" name="user_password" placeholder="Password"><br> 

        <button type="submit">Login</button>

     </form>


    <!-- <a href="./login.php">Log in</a> -->
</body>
</html>