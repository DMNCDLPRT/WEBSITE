<?php

if(isset($_POST['delete'])){
    require_once 'dbh.php';

    $userid = $_POST['deleteID'];

    $query = "DELETE FROM users WHERE userID='$userid' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run) {

        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: ../admin-page.php'); 
    }
    else {

        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: ../admin-page.php'); 
    }    
}
