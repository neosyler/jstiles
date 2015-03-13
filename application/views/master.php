<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
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
		<meta property="fb:admins" content="jtstiles" />
		<meta property="og:title" content="Free Your Imagination by <?php echo $author; ?>" />
		<meta property="og:description" content="<?php echo $description; ?>" />
		<meta property="og:image" content="http://www.jstiles.com/assets/images/logo.jpg" />
		<meta property="og:url" content="http://www.jstiles.com" />
		<meta property="og:site_name" content="<?php echo $author; ?>, <?php echo $title; ?>" />		
		<meta property="og:type" content="website" />
		<link rel="image_src" href="http://www.jstiles.com/assets/images/logo.jpg" / >
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Averia+Gruesa+Libre" />
		<link rel="stylesheet" href="/assets/css/magnific-popup.css" />
		<link rel="stylesheet" href="/assets/css/all.css" />
		<link rel="shortcut icon" href="/assets/favicon.ico" />
	</head>
	<body>
		<div id="topbar">
			<div class="container">
				<div class="left-side">
					<a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
				</div>
				<nav class="right-side">
					<button id="stack" class="btn btn-primary" onclick="$('#inner-body nav').slideToggle('fast');">
						<span class="glyphicon glyphicon-align-justify"></span>
					</button>
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
							<li><a href="/#blog">Blog</a></li>
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
							</ul>
						</div>
					</div>
				</header>
				<section id="profile" class="page">
					<?php include('sections/profile.php'); ?>
				</section>
				<section id="portfolio" class="page">
					<?php include('sections/portfolio.php'); ?>
				</section>
				<section id="apps" class="page">
					<?php include('sections/apps.php'); ?>
				</section>
				<section id="cv" class="page">
					<?php include('sections/cv.php'); ?>
				</section>
				<section id="blog" class="page">
					<?php include('sections/blog.php'); ?>
				</section>
				<section id="contact" class="page">
					<?php include('sections/contact.php'); ?>
				</section>
				<section id="css-sprite-generator" class="page" data-parent="#apps">
					<?php include('sections/apps/css-sprite-generator.php'); ?>
				</section>
				<section id="blogpost" class="page" data-parent="#blog">
					<div id="blogpost-details" class="clearfix">
						<div class="clearfix">
							<h2 class="title">Loading the post, please wait...</h2>
							<a class="closeThis" href="#blog">
								<button class="btn btn-primary">
									<span class="glyphicon glyphicon-remove"></span>
									Close
								</button>
							</a>
						</div>
					</div>
					<ul class="post-details">
						<li class="date"></li>
					</ul>
					<div class="post-content"></div>
				</section>
				<?php
				foreach($portfolio as $key=>$val) {
					?>
					<section id="<?php echo $key; ?>" class="page" data-parent="#portfolio">
						<?php
						$file = 'sections/portfolio/' . $key . '.php';
						
						if (file_exists(FCPATH . "application/views/" . $file)) {
							include($file);
						}
						?>
					</section>
					<?php
				}
				?>
				<footer>
					<div class="latest-posts col-md-4">
						<h3>Latest Posts</h3>
						<?php
						
						for($i = 0; $i < count($latest_posts)-1; $i++) {
							$post= $latest_posts[$i];
							$title_link = str_replace(" ", "_", $post['title']);
							$title_link = str_replace(":", "", $post['title']);
							?>
							<h4><a href="/#blogpost/<?php echo $title_link; ?>"><?php echo $post['title']; ?></a></h4>
							<p class="date"><?php echo date("F jS, Y", strtotime($post['created'])); ?></p>
							<?php				
							$content = substr(strip_tags(stripslashes($post['content'])),0,125) . "...";
							echo $content;
							?> <a class="link" href="/#blogpost/<?php echo $title_link; ?>">Read more.</a> <?php
						}
						?>
					</div>
					<div class="col-md-4">
						<h3>Favorite Links</h3>
						<ul>
							<li><a href="http://www.iridescentmoments.com">Iridescent Moments</a></li>
							<li><a href="http://www.stackoverflow.com">Stack Overvlow</a></li>
							<li><a href="http://www.stilesconstructioninc.com">Stiles Construction</a></li>
							<li><a href="http://www.thesimpledollar.com">The Simple Dollar</a></li>
							<li><a href="http://code.tutsplus.com">Tuts+ Code Tutorials</a></li>
							<li><a href="http://www.wikipedia.com">Wikipedia</a></li>
						</ul>
					</div>
					<div class="col-md-4">
						<h3>Menu</h3>
						<ul class="menu">
							<li><a href="/#profile">Profile</a></li>
							<li><a href="/#portfolio">Portfolio</a></li>
							<li><a href="/#apps">Apps</a></li>
							<li><a href="/#cv">CV</a></li>
							<li><a href="/#blog">Blog</a></li>
							<li><a href="/#contact">Contact</a></li>
						</ul>
					</div>
					<div class="copyright clearfix">&copy; <?php echo date("Y"); ?> jstiles.com | Jason T. Stiles. All rights reserved.</div>
				</footer>
			</div>
		</div>
		<!-- SCRIPTS -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="/assets/js/jquery.magnific-popup.min.js"></script>
		<script src="/assets/js/all.js"></script>
		<?php
		if (isset($hash)) {
			?>
			<script type="text/javascript">
				$(document).ready(function() {
					location.hash='<?php echo $hash; ?>';
				});
			</script>
			<?php
		}
		?>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-19509277-1', 'auto');
		  ga('send', 'pageview');
		
		</script>
	</body>
</html>
