<?php
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
?>