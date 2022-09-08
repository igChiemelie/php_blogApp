<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Tutorial - Form Handling</title>
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link rel="stylesheet" href="../fonts/material-icons.css">
    <link rel="stylesheet" href="../css/jbTut.css">
</head>
<body>
    <nav>
        <div class="nav-wrapper">
            <a href="../index.php" class="brand-logo">Logo</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                
                <?php
                    if(isset($_SESSION['loggedIn'])) {
                        
                        echo '<li><a class="dropdown-trigger" href="#!" data-target="userProfile">'.$names.'<i class="material-icons right">arrow_drop_down</i></a></li>';
                    } else {
                        echo '<li><a href="../index.php">Back To Homepage</a></li>';
                    }
                ?>
            </ul>
        </div>
    </nav>
    
    <ul class="sidenav" id="mobile-demo">
        <?php
            if(isset($_SESSION['loggedIn'])) {
                echo '<li><a class="modal-trigger" href="#regModal">'.$names.'</a></li>';
            } else {
                echo '<li><a href="../index.php">Back To Homepage</a></li>';
            }
        ?>
    </ul>

    <!-- Dropdown Structure -->
    <ul id="userProfile" class="dropdown-content">
        <li><a href="./logout.php">Logout</a></li>    
    </ul>