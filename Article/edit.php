<?php require_once '../database.php';

// $db_name = "ruc353_1";
// $table_name = ".Country";
$db_name = "local_ruc353_1";
$table_name = ".article";

//show current data of country:
$getarticle = $conn->prepare("SELECT * FROM " .$db_name.$table_name. " AS article
                            WHERE article.article_id = :article_id;");

$getarticle->bindParam(":article_id", $_GET["article_id"]);
$getarticle->execute();
$article = $getarticle->fetch(PDO::FETCH_ASSOC); //fetch the data to article

// check if all data has been passed
if(isset($_POST["article_id"]) &&
   isset($_POST["article_title"]) && 
   isset($_POST["article_major_topic"]) && 
   isset($_POST["article_minor_topic"]) &&
   isset($_POST["article_summary"]) &&
   isset($_POST["article_body"]) &&
   isset($_POST["article_date_published"]) &&
   isset($_POST["article_researcher_id"]) &&
   isset($_POST["article_organization_id"]) &&
   isset($_POST["article_is_removed"]) 
   ) {
    
    $articleUpdate = $conn->prepare("UPDATE " .$db_name.$table_name. " SET article_id = :article_id,
                                                                    article_title = :article_title, 
                                                                    article_major_topic = :article_major_topic
                                                                    article_minor_topic = :article_minor_topic
                                                                    article_summary = :article_summary
                                                                    article_body = :article_body
                                                                    article_date_published = :article_date_published
                                                                    article_researcher_id = :article_researcher_id
                                                                    article_organization_id = :article_organization_id
                                                                    article_is_removed = :article_is_removed
                                WHERE article_id = :article_id;");

    $articleUpdate->bindParam(":article_id", $_POST["article_id"]);
    $articleUpdate->bindParam(":article_title", $_POST["article_title"]);
    $articleUpdate->bindParam(":article_major_topic", $_POST["article_major_topic"]);
    $articleUpdate->bindParam(":article_minor_topic", $_POST["article_minor_topic"]);
    $articleUpdate->bindParam(":article_summary", $_POST["article_summary"]);
    $articleUpdate->bindParam(":article_body", $_POST["article_body"]);
    $articleUpdate->bindParam(":article_date_published", $_POST["article_date_published"]);
    $articleUpdate->bindParam(":article_researcher_id", $_POST["article_researcher_id"]);
    $articleUpdate->bindParam(":article_organization_id", $_POST["article_organization_id"]);
    $articleUpdate->bindParam(":article_is_removed", $_POST["article_is_removed"]);

    if ( $articleUpdate->execute()) {
        header("Location: ."); //brings to index of country
    } else {
        header("Location: ./edit.php?article_id=".$_POST["article_id"]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Article</title>
</head>
<body>
    <h1>Edit article</h1>
    <form action="./edit.php" method="post">

        <label for="article_id"> Article ID</label><br>
        <input type="number" name="article_id" id="article_id" value="<?= $article["article_id"] ?>"> <br>

        <label for="article_title"> Article title</label><br>
        <input type="text" name="article_title" id="article_title" value="<?= $article["article_title"] ?>"> <br>

        <label for="article_major_topic"> Article major topic</label><br>
        <input type="text" name="article_major_topic" id="article_major_topic" value="<?= $article["article_major_topic"] ?>"> <br>

        <label for="article_minor_topic"> Article minor topic</label><br>
        <input type="text" name="article_minor_topic" id="article_minor_topic" value="<?= $article["article_minor_topic"] ?>"> <br>

        <label for="article_summary"> Summary</label><br>
        <input type="text" name="article_summary" id="article_summary" value="<?= $article["article_summary"] ?>"> <br>

        <label for="article_body"> Body</label><br>
        <input type="text" name="article_body" id="article_body" value="<?= $article["article_body"] ?>"> <br>

        <label for="article_date_published"> Date published</label><br>
        <input type="date" name="article_date_published" id="article_date_published" value="<?= $article["article_date_published"] ?>"> <br>

        <label for="article_researcher_id"> Researcher ID</label><br>
        <input type="number" name="article_researcher_id" id="article_researcher_id" value="<?= $article["article_researcher_id"] ?>"> <br>

        <label for="article_organization_id"> Organization ID</label><br>
        <input type="number" name="article_organization_id" id="article_organization_id" value="<?= $article["article_organization_id"] ?>"> <br>

        <label for="article_is_removed"> Article is removed</label><br>
        <input type="date" name="article_is_removed" id="article_is_removed" value="<?= $article["article_is_removed"] ?>"> <br>

        <button type="submit">Update</button>
    </form>
    <a href="./"> Back to Article list</a>
</body>
</html>