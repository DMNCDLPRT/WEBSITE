<?php
    session_start();

    if($_SESSION['usertype'] !== 1){
        header("location: ./index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
    <title>Admin Page</title>
</head>
<body>
    <header class="top">
        <div class="navigation" style="margin-left:50px;">
            <a href="home.php">
                <button class="navbtn">Home</button>
            </a>
        </div>
        <div class="navigation">
            <a href="index.php">
                <button class="navbtn">Profile</button>
            </a>
        </div>
        <div class="navigation">
            <a href="Gallery.php">
                <button class="navbtn">Gallery</button>
            </a>
        </div>
        <div class="navigation">
            <a href="FAQ.php">
            <button class="navbtn">FAQ</button>
            </a>
        </div>
        <div class="pos">
        <?php
            if(isset($_SESSION['userUid'])){
                echo '<div class="navigation">
                        <form action="include/logout.php" method="POST">
                            <a href="form-login.php"><button class="navbtn">Log out</button></a>
                        </form>
                    </div>';
                    if ($_SESSION['usertype'] == 1){
                        echo '<div class="navigation">
                                <form action="admin-page.php" method="POST">
                                    <a href="form-login.php"><button class="navbtn">Admin</button></a>
                                </form>
                        </div>';
                    }
            }
        ?>
        </div>
    </header>