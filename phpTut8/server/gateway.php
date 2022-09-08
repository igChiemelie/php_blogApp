<?php
    // include 'partials/serverHeader.php';

    if(isset($_POST['banye'])){//LOGIN
       
        $errMsg = "";
        // Validation
        
        if(isset($_POST['loginPassword']) && $_POST['loginPassword'] != ""){
            $pass = $_POST['loginPassword'];
        } else {
            $errMsg .= '<li class="collection-item">Please all password fields re required.</li>';
        }

        if(isset($_POST['loginEmail']) && $_POST['loginEmail'] != ""){
            $email = $_POST['loginEmail'];
        } else {
            $errMsg .= '<li class="collection-item">Please Email field is required</li>';
        }


        if($errMsg == ""){
            //TODO: Get all records from DB where email = $email and password = $pass
            require '../../phpTutsDBConfig.php';

            $res = $db->query('SELECT * FROM users WHERE email = "'.$email.'" AND password = "'.$pass.'"');
            $nmRws = $res->num_rows;

            if($nmRws == 1){
                //LOGIN SECTION
                session_start();//start seesion

                $row = $res->fetch_assoc();
                
                $_SESSION["loggedIn"] = true;
                $_SESSION["id"] = $row['id'];
                $_SESSION["fName"] = $row['firstname'];
                $_SESSION["lName"] = $row['lastname'];
                $_SESSION["oName"] = $row['othername'];
                $_SESSION["email"] = $row['email'];
                $_SESSION["gender"] = $row['gender'];

                // header('location: dash.php');//redirect user to dashboard
                echo 200;
                // Login ends Here
            } else {
                echo 501;
            }
            
        } else {
            echo 501;
        }
    } elseif(isset($_POST['debanye'])){//REGISTRATION
        $errMsg = "";
        // Validation
        if(isset($_POST['firstName']) && $_POST['firstName'] != ""){
            $fName = $_POST['firstName'];
        } else {
            $errMsg .= '<li class="collection-item">Please Enter Firstname</li>';
        }

        if(isset($_POST['lastName']) && $_POST['lastName'] != ""){
            $lName = $_POST['lastName'];
        } else {
            $errMsg .= '<li class="collection-item">Please Enter Lastname</li>';
        }

        if(isset($_POST['password']) && $_POST['password'] != "" && $_POST['password'] == $_POST['cPassword']){
            $pass = $_POST['password'];
        } else {
            $errMsg .= '<li class="collection-item">Please all password fields re required.</li>';
        }

        if(isset($_POST['email']) && $_POST['email'] != ""){
            $email = $_POST['email'];
        } else {
            $errMsg .= '<li class="collection-item">Please Email field is required</li>';
        }

        if(isset($_POST['gender']) && $_POST['gender'] != ""){
            $gender = $_POST['gender'];
        } else {
            $errMsg .= '<li class="collection-item">Please Enter Gender</li>';
        }

        if(isset($_POST['state']) && $_POST['state'] != ""){
            $state = $_POST['state'];
        } else {
            $errMsg .= '<li class="collection-item">Please Enter State</li>';
        }
        $oName = $_POST['oName'];

        if($errMsg == ""){
            require '../../phpTutsDBConfig.php';
            
            //TODO: INSERT USERS RECORD INTO DB
            $res = $db->query('INSERT INTO users (firstname, lastname, othername, password, gender, stateId, email, dateCreated) VALUES ("'.$fName.'","'.$lName.'","'.$oName.'","'.$pass.'","'.$gender.'",4, "'.$email.'", NOW())');
            $inserted = $db->affected_rows;
            // echo $res;
            if($inserted){
                $userId = $db->insert_id;
                //LOGIN SECTION
                session_start();//start seesion

                $_SESSION["loggedIn"] = true;
                $_SESSION["id"] = $userId;
                $_SESSION["fName"] = $fName;
                $_SESSION["lName"] = $lName;
                $_SESSION["oName"] = $oName;
                $_SESSION["email"] = $email;
                $_SESSION["gender"] = $gender;

                echo 200;
                // Login ends Here
            } else {
                echo 501;
            }
            
        } else {
            echo 501;
        }
    } else {
        echo 401;//unauthorized access
    }

    // include 'partials/serverFooter.php';
?>