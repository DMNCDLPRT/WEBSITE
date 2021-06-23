<?php    
if (isset($_POST['submit-button'])) {

    require 'dbh.php';

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

    if(empty($type) && empty($first) && empty($last) && empty($email) &&empty($phone) &&empty($gender) && 
        empty($pwd) &&empty($repeatpwd) && empty($birthdate) && empty($stat)) {
        header("location: ../form-signup.php?form=emptyfield");
        exit();
    } else {
        if (!preg_match('/^[a-zA-Z _]+$/',$first)){
            header("location: ../form-signup.php?signup=firstinvalid&usertype=$type&last=$last&email=$email&phone=$phone&password=$pwd&gender=$gender&birthdate=$birthdate&status=$stat");
            exit();
        } else if (!preg_match('/^[a-zA-Z _]+$/',$last)) {
            header("location: ../form-signup.php?signup=lastinvalid&usertype=$type&first=$first&email=$email&phone=$phone&password=$pwd&gender=$gender&birthdate=$birthdate&status=$stat");
            exit();
        } else if (!preg_match('/^\d{11}$/', $phone)) {
            header("location: ../form-signup.php?signup=phonenumbermustcontain11digits&usertype=$type&first=$first&last=$last&email=$email&phone=$phone&gender=$gender&birthdate=$birthdate&status=$stat");
            exit();
        }
        
        $sql = "SELECT email, phone_num FROM users WHERE (email='$email' or phone_num='$phone')";
        $query_run = mysqli_query($conn, $sql);
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../form-signup.php?error=sqlerror");
            exit();
        } else {

            if (mysqli_num_rows($query_run) > 0) {
                $row = mysqli_fetch_assoc($query_run);
                if ($row['phone_num'] == $phone && $row['email'] == $email){
                    header("location: ../form-signup.php?signup=phonenumberandemailalreadytaken&usertype=$type&first=$first&last=$last&gender=$gender&birthdate=$birthdate&status=$stat");
                    exit();
                } else if ($row['phone_num'] == $phone){
                    header("location: ../form-signup.php?signup=phonenumberalreadytaken&usertype=$type&first=$first&last=$last&email=$email&gender=$gender&birthdate=$birthdate&status=$stat");
                    exit();
                }else if  ($row['email'] == $email){
                    header("location: ../form-signup.php?signup=emailalreadytaken&usertype=$type&first=$first&last=$last&phone=$phone&gender=$gender&birthdate=$birthdate&status=$stat");
                    exit();
                } elseif (empty($type)) {
                    header("location: ../form-signup.php?signup=emptyusertype&first=$first&last=$last&email=$email&phone=$phone&gender=$gender&birthdate=$birthdate&status=$stat");
                    exit();
                }
            } else {
                $sql = "INSERT INTO users (userType, firstName, lastName, email, phone_num, gender, pwd, repeatpwd, birthdate, stat) VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../form-signup.php?error=sqlerror");
                    exit();
                } else {
                    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "isssssssss", $type, $first, $last, $email, $phone, $gender, $hashedpwd, $repeatpwd, $birthdate, $stat);
                    mysqli_stmt_execute($stmt);

                    header("location: ../form-signup.php?signup=success");
                    exit();
                }
            }     
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

else{
    header("location: ../form-signup.php?error submit button");
    exit();
}