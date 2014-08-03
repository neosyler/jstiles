<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta charset="utf-8" />
		<title>Free Your Imagination | <?php echo $author . ", " . $title; ?></title>
		<meta name="description" content="<?php echo $description; ?>" />
		<meta name="author" content="<?php echo $author; ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate, private, post-check=0, pre-check=0" />
		<meta http-equiv="expires" content="Thu, 01 Jan 1970 00:00:00 GMT" />
		<meta http-equiv="keep-alive" content="timeout=15, max=98" />
		<meta property="og:title" content="Free Your Imagination | Jason T. Stiles, Web Developer and Enthusiast" />
		<!-- TODO: Check Logo -->
		<meta property="og:image" content="/images/logo.png" />
		<meta property="og:site_name" content="<?php echo $author; ?>, <?php echo $title; ?>" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Averia+Gruesa+Libre" />
		<link rel="stylesheet" href="/assets/css/magnific-popup.css" />
		<link rel="stylesheet" href="/assets/css/default.css" />
		<link rel="shortcut icon" href="/assets/favicon.ico" />
	</head>
	<body>
		<div id="topbar">
			<div class="container">
				<div class="left-side">
					<a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
				</div>
				<nav class="right-side">
					<ul>
						<li><a href="#">Login</a></li>
					</ul>
				</nav>
			</div>
		</div>
		<div id="inner-body">
			<div class="container">
				<header>
					<nav>
						<ul>
							<li class="active"><a href="/#profile">Profile</a></li>
							<li><a href="/#portfolio">Portfolio</a></li>
							<li><a href="/#apps">Apps</a></li>
							<li><a href="/#cv">CV</a></li>
							<li><a href="/#contact">Contact</a></li>
						</ul>
						<div class="clearfix">&nbsp;</div>
					</nav>
					<div class="profile-header">
						<div class="profile-header-info">
							<h1><?php echo $author; ?></h1>
							<h2><?php echo $title; ?></h2>
						</div>
						<div class="profile-social-info">
							<ul>
								<li class="social facebook" alt="Find me on Facebook" title="Find me on Facebook"><a href="http://www.facebook.com/<?php echo $social['facebook']; ?>"></a></li>
								<li class="social twitter" alt="Find me on Twitter" title="Find me on Twitter"><a href="http://www.twitter.com/<?php echo $social['twitter']; ?>"></a></li>
								<li class="social google-plus" alt="Find me on Google+" title="Find me on Google+"><a href="http://www.google.com/<?php echo $social['google']; ?>"></a></li>
								<li class="social linkedin" alt="Find me on LinkedIn" title="Find me on LinkedIn"><a href="http://www.linkedin.com/in/<?php echo $social['linkedin']; ?>"></a></li>
								<li class="social skype" alt="Find me on Skype" title="Find me on Skype"></li>
							</ul>
						</div>
					</div>
				</header>
				<section id="profile" class="page">
					<?php include('/sections/profile.php'); ?>
				</section>
				<section id="portfolio" class="page">
					<?php include('/sections/portfolio.php'); ?>
				</section>
				<section id="apps" class="page">
					<?php include('/sections/apps.php'); ?>
				</section>
				<section id="cv" class="page">
					<?php include('/sections/cv.php'); ?>
				</section>
				<section id="contact" class="page">
					<?php include('/sections/contact.php'); ?>
				</section>
				<section id="css-sprite-generator" class="page" data-parent="#apps">
					<?php include('/sections/apps/css-sprite-generator.php'); ?>
				</section>
				<?php
				foreach($portfolio as $key=>$val) {
					?>
					<section id="<?php echo $key; ?>" class="page" data-parent="#portfolio">
						<?php
						$file = '/sections/portfolio/' . $key . '.php';
						
						if (file_exists(FCPATH . "application/views/" . $file)) {
							include($file);
						}
						?>
					</section>
					<?php
				}
				?>
				<footer>
				
				</footer>
			</div>
		</div>
		<!-- SCRIPTS -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="/assets/js/jquery.magnific-popup.min.js"></script>
		<script src="/assets/js/scripts.js"></script>
	</body>
</html>
