<?php
	include 'header-website.php';
?>
	<main>
	<div class="container">
		<div class="box">
			<div class="info">
				<h4>Info</h4>
				<ul>
					<li><a href="#">Bukidnon State University</a> </li>
					<li><a href="#">See contact info</a> </li>
					<li><a href="#">See Connections (500+)</a></li>
					<li><a href="#">See Connections (500+)</a></li>
					<li><a href="#">See Connections (500+)</a></li>
				</ul>
			</div>
			<div class="info">
				<h4>People You may know +</h4>
				<ul>
					<li><a href="#">Firstname Lastname</a> </li>
					<li><a href="#">Firstname Lastname</a> </li>
					<li><a href="#">Firstname Lastname</a> </li>
					<li><a href="#">Firstname Lastname</a> </li>
					<li><a href="#">Firstname Lastname</a> </li>
					<li><a href="#">Firstname Lastname</a> </li>
					<li><a href="#">See Connections (500+)</a></li>
				</ul>
			</div>
			<div class="info">
				<h4>Who's Viewed Your Profile</h4>
				<p class="viewed">Your profile has been viewed by 9 people in the past 15 days</p>
				<p class="viewed">You have shown up in serch results 24 times in the past 3 days</p>
			</div>
		</div>
		<div class="contain">
			<div id="upper">
				<div class="about_me">
					<div class="dispaly-grid">
						<div id="profile_holder">
							<?php
								if(isset($_SESSION['userUid'])){
									include_once 'include/dbh.php';

									$id = $_SESSION['userid'];
											
									$query = "SELECT * FROM users WHERE userID='$id' ";
									$query_run = mysqli_query($conn, $query);

									foreach($query_run as $row){
							?>
							<img id="face" <?php if(($row['gender'] == 'male') || ($row['gender'] == 'Male')) { echo 'src="image/male.png"';} else {echo 'src="image/female.png"';}?>  alt="profile picture">
							<h1 class="name"><?php echo $row['firstName']?><br><?php echo $row['lastName'] ?></h1>
							<?php
									} 
								} else {
									echo '<img id="face" src="image/user.png" alt="profile picture">
										<h1 class="name">Dominic<br>Del Puerto</h1>';
								}
							?>
							<p id="line">___</p>
							<br>
							<div class="wrapper">
								<h4 class="anthr">Information Technology Student</h4>
							</div>
								<div class="contact-article-one">
									<ul>
										<a href="#" class="fa fa-facebook"></a>
										<a href="#" class="fa fa-twitter"></a>
										<a href="#" class="fa fa-google"></a>
										<a href="#" class="fa fa-instagram"></a>
									</ul>
								</div>
						</div>
						<div class="main_top_nav">
							<div class="intro">
								<h1 id="hello">Hello!</h1>
								<h2 id="me">a bit about me:</h2>
							</div>
							<nav class="navigation" aria-label="Main">
								<div class="navigation">
									<a href="#main_about">
										<button class="navbtn" id="current-page">About!</button>
									</a>
								</div>
								<div class="navigation">
									<a href="#main_project">
										<button class="navbtn">Services</button>
									</a>
								</div>
								<div class="navigation">
									<a href="Gallery.php">
										<button class="navbtn">Gallery</button>
									</a>
								</div>
							</nav>
								<p style="margin-top: 26px; padding-top: 55px;">Information Technology Student</p>
								<p>Studied at Bukidnon State University</p>
								<p style="margin-bottom: 20px;">Born on February 24,2001 at Kibawe, Bukidnon</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div id="main_about">
			<div class="dispaly-grid">
				<div class="head-about" id="head-about">
					<img src="image/about.png" alt="me!">
				</div>
				<div class="article">
					<section id="about_title">
							<h1 id="about-me">About Me!</h1>
					</section>
					<section class="what">
						<p class="content-who">My name is Dominic Del Puerto, and I'm a Collage Student at Bukidnon State University. I do Love Editing, Creating Web-page, and also Music.</p>
						<p class="content-life">I'm a nice fun and friendly person, I'm honest and punctual, I work well in a team but also on my own as I like to set myself goals which I will achieve. I have a creative mind and am always up for new challenges.</p>
						<p class="content-life">I love making websites that are functional and user friendly but at the same time attractive.</p>
					</section>
					<div class="navigation">
						<a href="#">
							<button class="navbtn">HIRE ME</button>
						</a>
					</div>
					<div class="navigation">							
						<a href="#">
							<button class="navbtn">DOWNLOAD MY CV</button>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
			<div id="main_project">
				<div class="head">
					<section class="heading">
						<h1 id="project_h1">Services</h1>
						<p id="qoute">Hi, I'm Dominic! I'm here to show you through my owm experiments 
							<br> exactly how you can stop trading time for money and start a building  
							<br> a bussiness that works for you. I'm here to show you how it works.</p>
					</section>
				</div>
				<div class="project_contents">
					<div class="projects" style="background-image: url(image/wrench\ \(4x5\).jpg);">
						<div class="navigation">
							<a href="#">
								<button class="navbtn"> 1 </button>
							</a>
						</div>
						<section>
							<h2>Web Design</h2>
							<p>Hi, I'm Dominic! I'm here to show you through my owm experiments exactly how you can stop trading time for money and start a building a bussiness that works for you. I'm here to show you how it works.</p>
						</section>
					</div>
					<div class="projects" style="background-image: url(image/pen\ \(4x5\).jpg);">
						<div class="navigation">
							<a href="#">
								<button class="navbtn"> 2 </button>
							</a>
						</div>
						<section>
							<h2>Web Development</h2>
							<p>Hi, I'm Dominic! I'm here to show you through my owm experiments exactly how you can stop trading time for money and start a building a bussiness that works for you. I'm here to show you how it works.</p>
						</section>
					</div>
					<div class="projects" style="background-image: url(image/graph\ \(4x5\).jpg);">
						<div class="navigation">
							<a href="#">
								<button class="navbtn"> 3 </button>
							</a>
						</div>
						<section>
							<h2>Security/SEO</h2>
							<p>Hi, I'm Dominic! I'm here to show you through my owm experiments exactly how you can stop trading time for money and start a building a bussiness that works for you. I'm here to show you how it works.</p>
						</section>
					</div>
				</div>
			</div>	
	</div>
	</main>
<?php
	include 'footer-website.php';
?>