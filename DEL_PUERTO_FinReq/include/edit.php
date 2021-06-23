<?php

if(isset($_POST['updatebtn'])){
    include_once 'dbh.php';

    $id = $_POST['update'];

    $type = $_POST["usertype"];
    $first = $_POST["firstName"];
    $last = $_POST["lastName"];
    $email = $_POST["email"];
    $phone = $_POST["phone_num"];
    $gender = $_POST["gender"];
    $pwd = $_POST["pwd"];
    $repeatpwd = $_POST["confirm"];
    $birthdate = date('Y-m-d', strtotime($_POST["birthdate"]));
    $stat = $_POST["stat"];

    if(empty($type) && empty($first) && empty($last) && empty($email) &&empty($phone) && empty($gender) && 
        empty($pwd) &&empty($repeatpwd) && empty($birthdate) && empty($stat)) {
        header("location: ../admin-page.php?edit=emptyfield");
        exit();
    } else {
        if (!preg_match('/^[a-zA-Z _]+$/',$first)){
            header("location: ../admin-page.php?edit=firstinvalid");
            exit();
        } else if (!preg_match('/^[a-zA-Z _]+$/',$last)) {
            header("location: ../admin-page.php?edit=lastinvalid");
            exit();
        } else if (!preg_match('/^\d{11}$/', $phone)) {
            header("location: ../admin-page.php?edit=phonenumbermustcontain11digits");
            exit();
        } else if ($pwd != $repeatpwd){
            header("location: ../admin-page.php?edit=passworddontmatch");
            exit();
        }
         
            $sql = "SELECT email, phone_num FROM users WHERE ((email='$email') OR (phone_num='$phone')) NOT IN (SELECT userID='$id')";
            $query_run = mysqli_query($conn, $sql);
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../admin-page.php?error=sqlerror");
                exit();
            } else {

                if (mysqli_num_rows($query_run) > 0) {
                
                    $row = mysqli_fetch_assoc($query_run);

                    if ($row['phone_num'] == $phone && $row['email'] == $email){
                            header("location: ../admin-page.php?edit=phonenumberandemailalreadytaken");
                            exit();
                    } else if ($row['phone_num'] == $phone){
                        header("location: ../admin-page.php?edit=phonenumberalreadytaken");
                        exit();
                    }else if  ($row['email'] == $email){
                        header("location: ../admin-page.php?edit=emailalreadytaken");
                        exit();
                    } else {
                        $hasedpwd = password_hash($pwd, PASSWORD_DEFAULT);
                    
                        $sql = "UPDATE users SET userType='$type' ,firstName='$first', lastName='$last', email='$email', phone_num='$phone', gender='$gender', pwd='$hasedpwd', repeatpwd='$repeatpwd', birthdate='$birthdate', stat='$stat' WHERE userID='$id' ";
                        $query_run = mysqli_query($conn, $sql);

                        if($query_run){

                            $_SESSION['status'] = "Your Data is Updated";
                            $_SESSION['status_code'] = "success";
                            header('Location: ../admin-page.php?success=userupdated'); 
                        } else {

                            $_SESSION['status'] = "Your Data is NOT Updated";
                            $_SESSION['status  _code'] = "error";
                            header('Location: ../admin.php?error=error'); 
                        }
                    }
                } else {
                    
                    $hasedpwd = password_hash($pwd, PASSWORD_DEFAULT);

                    $sql = "UPDATE users SET userType='$type' ,firstName='$first', lastName='$last', email='$email', phone_num='$phone', gender='$gender', pwd='$hasedpwd', repeatpwd='$repeatpwd', birthdate='$birthdate', stat='$stat' WHERE userID='$id' ";
                    $query_run = mysqli_query($conn, $sql);

                    if($query_run){

                        $_SESSION['status'] = "Your Data is Updated";
                        $_SESSION['status_code'] = "success";
                        header('Location: ../admin-page.php?success=userupdated'); 
                    } else {

                        $_SESSION['status'] = "Your Data is NOT Updated";
                        $_SESSION['status_code'] = "error";
                        header('Location: ../admin.php?error=error'); 
                    }
                } 
            } 
        }
} else {
    header("location: ../admin-page.php?error=updatebtnnotset");
    exit();
}