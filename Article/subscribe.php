<?php
        require_once '../database.php';
        session_start();
        // $db_name = "ruc353_1";
        // $table_name = ".User";
        $db_name = "local_ruc353_1";
        $table_name = ".user";

        // get recipient
        // $recipient = $conn->prepare("SELECT " .$db_name. ":user_email FROM " .$db_name.$table_name. " AS user
        //                             WHERE user.user_id = :user_id;");

        $user_id = $_SESSION['user_id'];

        $sql = "SELECT * FROM " .$db_name.$table_name. " AS user
        WHERE user.user_id = '$user_id';";
        $result = $conn->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT);

        $user_email = $row["user_email"];
        
        echo "You have subscribed using the follwing email: " .$user_email;
        

        $article_id = $_GET["article_id"];
        
        $article_query = "SELECT * FROM $db_name.article WHERE article_id = $article_id";
        $result_article = $conn->query($article_query);
        $row = $result_article->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT);

        $article_title = $row['article_title'];
        $email_body = $row['article_body'];
        
        $article_reasearcher_id = $row['article_researcher_id'];
        if ($article_reasearcher_id == NULL) {
            $article_organization_id = $row['article_organization_id'];
        }

        // echo $article_title. " ". $article_title. " ". $email_body;

        // $table_name = ".EmailLog";
        $table_name = ".emaillog";

        $update_emaillog = "INSERT INTO " .$db_name.$table_name. " ($table_name.email_receiver, $table_name.email_subject, $table_name.email_body) 
                                         VALUES ('$user_email', '$article_title', '$email_body');";
        $conn->query($update_emaillog);

        // person researcher sub

//         SELECT u.user_email 
//          FROM Subscription s, User u 
//          WHERE s.subscription_subscriber = u.user_id AND 
//       subscription_researcher_id = 17;

        // $table_name = ".Subscription";
        $table_name = ".subscription";
        if ($article_reasearcher_id == NULL) {
            $sql_sub_org = "INSERT INTO " .$db_name.$table_name. " ($table_name.subscription_subscriber, $table_name.article_organization_id)
            VALUES ('$user_id', '$article_organization_id');";
            $conn->query($sql_sub_org);

        } else {
            $sql_sub_res = "INSERT INTO " .$db_name.$table_name. " ($table_name.subscription_subscriber, $table_name.subscription_researcher_id)
                    VALUES ('$user_id', '$article_reasearcher_id');";
                    $conn->query($sql_sub_res);
        }
    


        ?> <br>
        <a href="./index.php">Back to Artciles </a>


    <!-- //     $recipient->bindParam(":user_id", $_GET["user_id"]);
    //     $recipient->bindParam(":user_email", $_GET["user_email"]);
    //     $recipient->execute();

    //     $getrecipient = $recipient->fetch(PDO::FETCH_ASSOC); //fetch the data to country

    //     // get subject 
    //     // $db_name = "ruc353_1";
    //     // $table_name = ".Article";
    //     $db_name = "local_ruc353_1";
    //     $table_name = ".article";

    //     $getsubject = $conn->prepare("SELECT " .$db_name. ":article_title" .$db_name. ":article_body FROM " .$db_name.$table_name. ";");

    //     $getsubject->bindParam(":article_title", $_GET["article_title"]);
    //     $getsubject->bindParam(":user_email", $_GET["user_email"]);
    //     $getsubject->execute();

    //     // $db_name = "ruc353_1";
    //     // $table_name = ".EmailLog";
    //     $db_name = "local_ruc353_1";
    //     $table_name = ".emaillog";
        
    //     $emaillog = $conn->prepare("INSERT INTO " .$db_name.$table_name. " ($table_name.email_reciever, $table_name.email_subject, $table_name.email_body) 
    //                                 VALUES (email_reciever = :user_email, email_subject = :article_title, email_body = :article_body) ;");

    //     $emaillog->bindParam(":email_reciever", $_GET["user_email"]);
    //     $emaillog->bindParam(":email_subject", $_GET["article_title"]);
    //     $emaillog->bindParam(":email_body", $_GET["article_body"]);
    //     $emaillog->execute();

    //     // $db_name = "ruc353_1";
    //     // $table_name1 = ".Subscription";
    //     // $table_name2 = ".subscription";
    //     $db_name = "local_ruc353_1";
    //     $table_name1 = ".subscription";
    //     $table_name2 = ".subscription";
        
    //     $emaillog = $conn->prepare("INSERT INTO " .$db_name.$table_name. " ($table_name.email_reciever, $table_name.email_subject, $table_name.email_body) 
    //                                 VALUES (email_reciever = :user_email, email_subject = :article_title, email_body = :article_body) ;");

    //     $emaillog->bindParam(":email_reciever", $_GET["user_email"]);
    //     $emaillog->bindParam(":email_subject", $_GET["article_title"]);
    //     $emaillog->bindParam(":email_body", $_GET["article_body"]);
    //     $emaillog->execute();



    // if(array_key_exists('Subscribe', $_POST)) {
    //     button1();
    // }
    
    // function button1() {
    //     require_once '../database.php';

    //     // $db_name = "ruc353_1";
    //     // $table_name = ".User";
    //     $db_name = "local_ruc353_1";
    //     $table_name = ".user";

    //     //show current data of country:
    //     $getuser = $conn->prepare("SELECT " .$db_name. ":user_email, " .$db_name. "  FROM " .$db_name.$table_name. " AS user
    //                                 WHERE user.user_id = :user_id;");

    //     $getuser->bindParam(":user_id", $_GET["user_id"]);
    //     $getuser->bindParam(":user_email", $_GET["user_email"]);
    //     $getuser->execute();

    //     $user = $getuser->fetch(PDO::FETCH_ASSOC); //fetch the data to country

    //     // $db_name = "ruc353_1";
    //     // $table_name = ".EmailLog";
    //     $db_name = "local_ruc353_1";
    //     $table_name = ".emaillog";
    //     // $subscribe = $conn->prepare("UPDATE " .$db_name.$table_name. " SET email_reciever = :email_reciever
    //     //                                                     WHERE user_id = :user_id;");
    // } -->
                        