<?php
    //TODO: ensure user is loggedin
    if(isset($_POST['articleCommentAction'])){
        $err = 0;
        if(isset($_POST['articleComment']) && $_POST['articleComment'] != ""){
            $articleComment = $_POST['articleComment'];
        } else {
            $err = 1;
        } 

        if(isset($_POST['articleId']) && $_POST['articleId'] != ""){
            $articleId = $_POST['articleId'];
        } else {
            $err = 1;
        } 

        $userId = 1;

        if($err == 0){
            //require dbconnection file
            require('../../phpTutsDBConfig.php');
            
            $res = $db->query('INSERT INTO comments (comment, userId, articleId, datePosted) VALUES ("'.$articleComment.'", '.$userId.', '.$articleId.', NOW())');
            $idOfJustInsertedComment = $db->insert_id;
            if($idOfJustInsertedComment > 0){
                echo 200;
            } else {
                echo 501;
            }
        } else {
            echo 502;
        }
    } else {
        echo 501;
    }
?>