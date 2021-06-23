<?php 

if (isset($_POST['loginButton'])) {
	require 'dbh.php';

	$emailuid = $_POST['userID'];
	$password = $_POST['password'];

	if (empty($emailuid) && empty($password)){
		header("location: ../form-login.php?login=emptyfield");
		exit();
	} else {
        $sql = "SELECT * FROM users WHERE email=? or phone_num=?";
        $stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../form-signup.php?error=sqlerror");
			exit();
		} 
		else {
			mysqli_stmt_bind_param($stmt, "ss", $emailuid, $emailuid);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
				$pwdCheck = password_verify($password, $row['pwd']);

				if (!$pwdCheck){
					header("location: ../form-login.php?login=wrongpassword&first=$emailuid");
					exit();
				} else if ($pwdCheck){
					session_start();
					$_SESSION['userid'] = $row['userID'];
					$_SESSION['usertype'] = $row['userType'];
					$_SESSION['userUid'] = $row['email'];
					$_SESSION['userUid'] = $row['phone_num'];

					header("location: ../index.php");
					exit();
				} 
			} else {
				header("location: ../form-login.php?login=nouser");
				exit();
			}
		}	
	}

}else{
	header("Location: ../form-login.php");
	exit();
}