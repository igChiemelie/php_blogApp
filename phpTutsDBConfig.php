<?php
    $dbHost = "localhost";
    $username = "root";
    $password = "";
    $dbSeleceted = "blog2";

    // Create connection nd save d connection to $db
    $db = new mysqli($dbHost, $username, $password, $dbSeleceted);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } else {
        
        //create Tables
        $sql1 = "CREATE TABLE IF NOT EXISTS states (
            id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            state VARCHAR(11) NOT NULL
        )";

        $createStateTable = $db->query($sql1);

        if($createStateTable){
            $sql = "CREATE TABLE IF NOT EXISTS users (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(30) NOT NULL,
                lastname VARCHAR(30) NOT NULL,
                email VARCHAR(50) NOT NULL,
                othername VARCHAR(30),
                password VARCHAR(32),
                gender ENUM('M', 'F') NOT NULL,
                stateId INT(3) NOT NULL,
                dateCreated Date NOT NULL       
            )";
    
            $createUserTable = $db->query($sql);

            if($createUserTable) {
                $sql2 = "CREATE TABLE IF NOT EXISTS categories (
                    id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    category VARCHAR(100) NOT NULL
                )";

                $createCatTable = $db->query($sql2);

                if($createCatTable){
                    $sql3 = "CREATE TABLE IF NOT EXISTS articles (
                        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        title VARCHAR(100) NOT NULL,
                        article TEXT NOT NULL,
                        userId INT(11) NOT NULL,
                        catId INT(3) NOT NULL,
                        datePosted Date NOT NULL,
                        fileName VARCHAR(75) NOT NULL   
                    )";

                    $createArtTable = $db->query($sql3);

                    if($createArtTable){
                        $sql4 = "CREATE TABLE IF NOT EXISTS comments (
                            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                            comment VARCHAR(150) NOT NULL,
                            userId INT(11) NOT NULL,
                            articleId INT(11) NOT NULL,
                            datePosted Date NOT NULL
                        )";

                        $db->query($sql4);
                    }
                }
                
            }
        }       
    }
?>