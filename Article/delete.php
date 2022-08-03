<?php require_once '../database.php';

// $db_name = "ruc353_1";
// $table_name = ".Country";
$db_name = "local_ruc353_1";
$table_name = ".article";

$delete = $conn->prepare("DELETE FROM " .$db_name.$table_name. " WHERE article_id = :article_id; ");

$delete->bindParam(":article_id", $_GET["article_id"]);
$delete->execute();
if ( $delete->execute()) {
    header("Location: ."); //brings to index of article
}
?>