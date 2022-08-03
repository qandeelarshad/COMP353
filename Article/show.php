<?php require_once '../database.php';

// $db_name = "ruc353_1";
// $table_name = ".Country";
$db_name = "local_ruc353_1";
$table_name = ".article";

//show current data of article:
$getarticle = $conn->prepare("SELECT * FROM " .$db_name.$table_name. " AS article
                            WHERE article.article_id = :article_id;");

$getarticle->bindParam(":article_id", $_GET["article_id"]);
$getarticle->execute();
$article = $getarticle->fetch(PDO::FETCH_ASSOC); //fetch the data to article

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $article["article_title"] ?></title>
</head>
<body>
    <h1><?= $article["article_id"] ?></h1>
    <h2>Article title: <?= $article["article_title"] ?></h2>
    <h2>Major topic: <?= $article["article_major_topic"] ?></h2>
    <h2>Minor topic: <?= $article["article_minor_topic"] ?></h2>
    <h2>Summary: <?= $article["article_summary"] ?></h2>
    <h2>Body: <?= $article["article_body"] ?></h2>
    <h2>Date published: <?= $article["article_date_published"] ?></h2>
    <h2>Researcher ID: <?= $article["article_researcher_id"] ?></h2>
    <h2>Organization ID: <?= $article["article_organization_id"] ?></h2>
    <h2>Article is removed: <?= $article["article_is_removed"] ?></h2>
    
</body>
</html>