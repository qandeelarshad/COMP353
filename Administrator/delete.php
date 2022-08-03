<?php require_once '../database.php';

$db_name = "ruc353_1";
$table_name = ".Country";
// $db_name = "local_ruc353_1";
// $table_name = ".country";

$delete = $conn->prepare("DELETE FROM " .$db_name.$table_name. " WHERE country_id = :country_id; ");

$delete->bindParam(":country_id", $_GET["country_id"]);
$delete->execute();
if ( $delete->execute()) {
    header("Location: ."); //brings to index of country
}
?>