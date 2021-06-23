<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"> <!--for the eye password hidden/visible... CSS link-->
    <title>Online profile</title>
</head>
<body>
	<header>
		<div class="top">
			<div class="pos">
                <input id="searchbox" type="text" placeholder="Search">
				<?php
                    if(isset($_SESSION['userUid'])){
                        echo '<div class="navigation">
								<form action="include/logout.php" method="POST">
									<a href="form-login.php"><button class="navbtn">Log out</button></a>
								</form>
							 </div>'
							;
						if ($_SESSION['usertype'] == 1){
								echo '<div class="navigation">
										<form action="admin-page.php" method="POST">
											<a href="form-login.php"><button class="navbtn">Admin</button></a>
										</form>
								</div>';
						}
                    } else {
                        echo '<a href="form-login.php"><div class="navigation"><button class="navbtn">log in</button></div></a>';
                        echo '<a href="form-signup.php"><div class="navigation"><button class="navbtn">Sign up</button></div></a>';
                    }
                ?>
			</div>
			<div class="navigation" style="margin-left:50px;">
				<a href="home.php">
					<button class="navbtn">Home</button>
				</a>
			</div>
			<?php
				if (isset($_SESSION['userUid'])){
					echo '
					<div class="navigation">
						<a href="index.php">
							<button class="navbtn">Profile</button>
						</a>
					</div>';
					echo '<div class="navigation">
							<a href="Gallery.php">
								<button class="navbtn">Gallery</button>
							</a>
						</div>';
					echo '<div class="navigation">
							<a href="FAQ.php">
								<button class="navbtn">FAQ</button>
							</a>
						</div>';
				}
			?>
		</div>
	</header>