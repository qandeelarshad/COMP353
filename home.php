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
    
<h1>Hello, <?php echo $_SESSION["user_username"], " Role: " .$_SESSION["role_id"]; ?> </h1>

Choose where you would like to go: <br> 
<?php 
if ($_SESSION['role_id'] == 1 ) {
    ?>
<select>  
  <option value="Select">Select</option>}  
  <option value="1">1</option>  
  <option value="2">2</option>  
</select>
<?php } else if ($_SESSION['role_id'] == 2 ) {
    ?>
<select>  
  <option value="Select">Select</option>}  
  <option value="3">3</option>  
  <option value="4">4</option>  
  <option value="5">5</option>  
</select>
<?php } else if ($_SESSION['role_id'] == 3 ) {
    ?>
<!-- <select>  
  <option value="Select">Select</option>}  
  <option value="6">6</option>  
  <option value="7">7</option>  
  <option value="8">8</option>  
  <option value="9">9</option>  
</select> -->
<a href="./User/index.php">View Users</a>
<?php } else if ($_SESSION['role_id'] == 4 ) {
    ?>
<!-- <select>  
  <option value="Select">Select</option>}  
  <option value="10">10</option>  
  <option value="11">11</option>  
  <option value="12">12</option>  
  <option value="13">13</option>  
  <option value="14">14</option>   
</select> -->
<a href="./User/index.php">View Users</a> <br>
<a href="./Country/index.php">View Countries</a>
<?php } ?>

<br>
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