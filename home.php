<?php
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['user_username'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    
<h1>Hello, <?php echo $_SESSION["user_username"]; ?> </h1>
<a href="logout.php">Logout </a>
</body>
</html>

<?php
}
else {
    header("Location: index.php");
    exit();
}

?>