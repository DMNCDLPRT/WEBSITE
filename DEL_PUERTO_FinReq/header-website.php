<?php
 	session_start();
	if (!isset($_SESSION['userUid'])){
		header("location: ./home.php?login-signin=welcome!");
	}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Online profile</title>
</head>
<body>
	<header>
		<div class="top">
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
					}else {
                        echo '<a href="form-login.php"><div class="navigation"><button class="navbtn">log in</button></div></a>';
                        echo '<a href="form-signup.php"><div class="navigation"><button class="navbtn">Sign up</button></div></a>';
                    }
                ?>  
				<input id="searchbox" type="text" placeholder="Search">
			</div>
            <div class="navigation" style="margin-left:20px;">
				<a href="Contact.php"><button class="dropbtn" id="dropbtn"> Contact Me</button></a>
				<div class="dropdown-content">
					<a href="#">Facebook</a>
					<a href="#">Twitter</a>
					<a href="#">Gmail</a>
					<a href="#">Outlook</a>
					<a href="#">Leave msg.</a>
				</div>
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
		</div>
	</header>