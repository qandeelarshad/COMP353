<?php require_once '../database.php';

$delete = $conn->prepare("DELETE FROM local_ruc353_1.country
                            WHERE country_id = :country_id; ");

$delete->bindParam(":country_id", $_GET["country_id"]);
$delete->execute();
if ( $delete->execute()) {
    header("Location: ."); //brings to index of country
}
?>