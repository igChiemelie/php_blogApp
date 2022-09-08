<?php
    session_start();

    // if($_SESSION['loggedIn']){
    //     echo 'yes';
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Tutorial - Form Handling</title>
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="fonts/material-icons.css">
    <link rel="stylesheet" href="css/jbTut.css">
    <style>
        img.responsive-img{
            height:40vh;
        }
        img.vG{
            height:400px;
            width:100%
        }
        .next{
            height:10vh;
            /* text-align: justify; */
            /* overflow: scroll; */
            /* text-overflow: ellipsis; */
           
            /* overflow: hidden; */
            white-space: pre-wrap;
            width:100%;
             margin-left: auto;
            margin-right: auto;
            margin-top: 15px;
            
        }

        small {
            font-size: 55%;
        }

        .nexxt{
          height: 10vh;
        }

        header {
            background-image: url("./img/bg-1.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: scroll;
            background-color: rgba(0, 0, 0, 0.5);
            /* height: 100%; */
            /* background-color: red; */
        }
        .section{
            min-height: 600px;
            background-color: rgba(0, 0, 0, 0.5);
        }

        html, body {
            margin: 0px;
            padding: 0px;
        }

        @font-face {
            font-family: 'gozie';
            src: url('./fonts/OpenSans-Light.ttf');
            font-weight: normal;
            font-style: normal;
        }

        h1.intro {
            width: 50%;
            margin-left: auto;
            margin-right: auto;
            font-family: 'gozie';
            /* font-family: 'Times New Roman', Times, serif; */
            font-weight: lighter;
            font-size: 3.8rem;
            line-height: 130%;
            /* color: green; */
        }

    </style>
</head>
<body class="grey lighten-1">
  
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="./index.php" class="brand-logo">Logo</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <?php
                        if(isset($_SESSION['loggedIn'])) {
                            $fName = $_SESSION['fName'];
                            $lName = $_SESSION['lName'];
                            $oName = $_SESSION['oName'];

                            $names = $fName.' '.$lName;
                            echo '<li><a class="dropdown-trigger" href="#!" data-target="userProfile">'.$names.'<i class="material-icons right">arrow_drop_down</i></a></li>';
                        } else {
                            echo '<li><a class="modal-trigger" href="#regModal">Login/Register</a></li>';
                        }
                    ?>
                    
                </ul>
            </div>
        </nav>
    </div>
   
    
    <ul class="sidenav" id="mobile-demo">
        <?php
            if(isset($_SESSION['loggedIn'])) {
                echo '<li><a class="modal-trigger" href="#regModal">'.$names.'</a></li>';
            } else {
                echo '<li><a class="modal-trigger" href="#regModal">Login/Register</a></li>';
            }
        ?>
    </ul>
    <!-- Dropdown Structure -->
    <ul id="userProfile" class="dropdown-content">
        <li><a href="./server/logout.php">Logout</a></li>    
    </ul>