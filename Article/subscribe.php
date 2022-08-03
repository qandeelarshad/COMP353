<?php

        // $db_name = "ruc353_1";
        // $table_name = ".User";
        $db_name = "local_ruc353_1";
        $table_name = ".user";

        // get recipient
        $recipient = $conn->prepare("SELECT " .$db_name. ":user_email FROM " .$db_name.$table_name. " AS user
                                    WHERE user.user_id = :user_id;");

        $recipient->bindParam(":user_id", $_GET["user_id"]);
        $recipient->bindParam(":user_email", $_GET["user_email"]);
        $recipient->execute();

        $getrecipient = $recipient->fetch(PDO::FETCH_ASSOC); //fetch the data to country

        // get subject 
        // $db_name = "ruc353_1";
        // $table_name = ".Article";
        $db_name = "local_ruc353_1";
        $table_name = ".article";

        $getsubject = $conn->prepare("SELECT " .$db_name. ":article_title" .$db_name. ":article_body FROM " .$db_name.$table_name. ";");

        $getsubject->bindParam(":article_title", $_GET["article_title"]);
        $getsubject->bindParam(":user_email", $_GET["user_email"]);
        $getsubject->execute();

            // $db_name = "ruc353_1";
        // $table_name = ".EmailLog";
        $db_name = "local_ruc353_1";
        $table_name = ".emaillog";
        
        $emaillog = $conn->prepare("INSERT INTO " .$db_name.$table_name. " ($table_name.email_reciever, $table_name.email_subject, $table_name.email_body) 
                                    VALUES (email_reciever = :user_email, email_subject = :article_title, email_body = :article_body) ;");

        $emaillog->bindParam(":email_reciever", $_GET["user_email"]);
        $emaillog->bindParam(":email_subject", $_GET["article_title"]);
        $emaillog->bindParam(":email_body", $_GET["article_body"]);
        $emaillog->execute();



    if(array_key_exists('Subscribe', $_POST)) {
        button1();
    }
    
    function button1() {
        require_once '../database.php';

        // $db_name = "ruc353_1";
        // $table_name = ".User";
        $db_name = "local_ruc353_1";
        $table_name = ".user";

        //show current data of country:
        $getuser = $conn->prepare("SELECT " .$db_name. ":user_email, " .$db_name. "  FROM " .$db_name.$table_name. " AS user
                                    WHERE user.user_id = :user_id;");

        $getuser->bindParam(":user_id", $_GET["user_id"]);
        $getuser->bindParam(":user_email", $_GET["user_email"]);
        $getuser->execute();

        $user = $getuser->fetch(PDO::FETCH_ASSOC); //fetch the data to country

        // $db_name = "ruc353_1";
        // $table_name = ".EmailLog";
        $db_name = "local_ruc353_1";
        $table_name = ".emaillog";
        // $subscribe = $conn->prepare("UPDATE " .$db_name.$table_name. " SET email_reciever = :email_reciever
        //                                                     WHERE user_id = :user_id;");
    }
                        ?> 