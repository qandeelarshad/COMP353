<?php require_once '../database.php';

// $db_name = "ruc353_1";
// $table_name = ".User";
$db_name = "local_ruc353_1";
$table_name = ".user";

$delete = $conn->prepare("DELETE FROM " .$db_name.$table_name. " WHERE user_id = :user_id; ");

$delete->bindParam(":user_id", $_GET["user_id"]);
$delete->execute();
if ( $delete->execute()) {
    header("Location: ."); //brings to index of user
}
?>