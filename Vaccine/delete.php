<?php require_once '../database.php';

// $db_name = "ruc353_1";
// $table_name = ".Country";
$db_name = "local_ruc353_1";
$table_name = ".vaccine";

$delete = $conn->prepare("DELETE FROM " .$db_name.$table_name. " WHERE vaccine_id = :vaccine_id; ");

$delete->bindParam(":vaccine_id", $_GET["vaccine_id"]);
$delete->execute();
if ( $delete->execute()) {
    header("Location: ."); //brings to index of vaccine
}
?>