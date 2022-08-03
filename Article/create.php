<?php require_once '../database.php';
session_start();

// $db_name = "ruc353_1";
// $table_name = ".Article";
$db_name = "local_ruc353_1";
$table_name = ".article";

// check if all data has been passed
if ($_SESSION['role_id'] == 2) {
    if(isset($_POST["article_title"]) 
        && isset($_POST["article_major_topic"]) 
        && isset($_POST["article_minor_topic"]) 
        && isset($_POST["article_summary"]) 
        && isset($_POST["article_body"]) 
        && isset($_POST["article_date_published"]) 
        && isset($_POST["article_researcher_id"])
        // && isset($_POST["article_organization_id"]) 
        //  && isset($_POST["article_is_removed"])
        ) {
    

    
    $article = $conn->prepare("INSERT INTO " .$db_name.$table_name. " (article_title, article_major_topic, 
    article_minor_topic, article_summary, article_body, article_date_published, article_researcher_id)
                                VALUES (:article_title, :article_major_topic, :article_minor_topic, :article_summary,
                            :article_body, :article_date_published, :article_researcher_id);");
    

    // $article->bindParam(":article_id", $_POST["article_id"]);
    $article->bindParam(":article_title", $_POST["article_title"]);
    $article->bindParam(":article_major_topic", $_POST["article_major_topic"]);
    $article->bindParam(":article_minor_topic", $_POST["article_minor_topic"]);
    $article->bindParam(":article_summary", $_POST["article_summary"]);
    $article->bindParam(":article_body", $_POST["article_body"]);
    $article->bindParam(":article_date_published", $_POST["article_date_published"]);
    $article->bindParam(":article_researcher_id", $_POST["article_researcher_id"]);

    if ( $article->execute()) {
        header("Location: ."); //brings to index of article
    }
        }

    // $article->bindParam(":article_is_removed", $_POST["article_is_removed"]);




     } else  {
        if(isset($_POST["article_title"]) 
     && isset($_POST["article_major_topic"]) 
     && isset($_POST["article_minor_topic"]) 
     && isset($_POST["article_summary"]) 
     && isset($_POST["article_body"]) 
     && isset($_POST["article_date_published"]) 
    //  && isset($_POST["article_researcher_id"])
      && isset($_POST["article_organization_id"]) 
     //  && isset($_POST["article_is_removed"])
     ) {
        $article = $conn->prepare("INSERT INTO " .$db_name.$table_name. " (article_title, article_major_topic, 
    article_minor_topic, article_summary, article_body, article_date_published, article_organization_id,
    article_is_removed)
                                VALUES (:article_id, :article_title, :article_major_topic, :article_minor_topic, :article_summary,
                            :article_body, :article_date_published, :article_organization_id);");

    // $article->bindParam(":article_id", $_POST["article_id"]);
    $article->bindParam(":article_title", $_POST["article_title"]);
    $article->bindParam(":article_major_topic", $_POST["article_major_topic"]);
    $article->bindParam(":article_minor_topic", $_POST["article_minor_topic"]);
    $article->bindParam(":article_summary", $_POST["article_summary"]);
    $article->bindParam(":article_body", $_POST["article_body"]);
    $article->bindParam(":article_date_published", $_POST["article_date_published"]);
    
    $article->bindParam(":article_organization_id", $_POST["article_organization_id"]);
    // $article->bindParam(":article_is_removed", $_POST["article_is_removed"]);

    if ( $article->execute()) {
        header("Location: ."); //brings to index of article
    }


     }
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Article</title>
</head>
<body>
    <h1>Add article</h1>
    <form action="./create.php" method="post">

        <!-- <label for="article_id"> Article ID</label><br>
        <input type="number" name="article_id" id="article_id"> <br> -->

        <label for="article_title"> Article title</label><br>
        <input type="text" name="article_title" id="article_title"> <br>

        <label for="article_major_topic"> Major topic</label><br>
        <input type="text" name="article_major_topic" id="article_major_topic"> <br>

        <label for="article_minor_topic"> Minor topic</label><br>
        <input type="text" name="article_minor_topic" id="article_minor_topic"> <br>

        <label for="article_summary"> Summary</label><br>
        <input type="text" name="article_summary" id="article_summary"> <br>

        <label for="article_body">Body</label><br>
        <input type="text" name="article_body" id="article_body"> <br>

        <label for="article_date_published"> Date published</label><br>
        <input type="date" name="article_date_published" id="article_date_published"> <br>
        
        <?php if ($_SESSION['role_id'] == 2){ ?>
        <label for="article_researcher_id"> Researcher id</label><br>
        <input type="number" value=<?=$_SESSION['user_id']?> name="article_researcher_id" id="article_researcher_id" readonly="readonly"> <br>
        <?php } ?>
        
        <?php if ($_SESSION['role_id'] == 3){ ?>
        <label for="article_organization_id"> Organization ID</label><br>
        <input type="number" value=<?=$_SESSION['user_id']?> name="article_organization_id" id="article_organization_id" readonly="readonly"> <br>
        <?php } ?>

        <!-- <label for="article_is_removed"> Article is removed</label><br>
        <input type="date" name="article_is_removed" id="article_is_removed"> <br> -->

        <button type="submit" value='article_submitted' >Add</button>
    </form>

    
    <?php
     if (isset($_POST['article_title'])) {
        // include("../mail.php");
        // $db_name = "ruc353_1";
        // $table_name = ".Article";
        $db_name = "local_ruc353_1";
        $table_name = ".subscription";
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT * FROM " .$db_name.$table_name. " WHERE subscription_researcher_id = '$user_id'";
        $result = $conn->query($sql);

        
        while ($row = $result->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
            $to = $row["subscription_subscriber"];
            $subject = $_POST['article_title'];
            $message = $_POST['article_body']. "\n ";
            $headers = 'FROM: <ry_hani@encs.concordia.ca>'."\r\n";
            if (mail($to,$subject,$message,$headers)) {
                echo "Email send succefully";
            } else {
                echo "Email did not send";
            }
        }
    }
    ?>

    <a href="./"> Back to Article list</a>
</body>
</html>