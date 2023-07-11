<?php

	$parts = ['404'];
	$queried = get_queried_object();

	if ($queried) {
		if (is_single())
			array_unshift($parts, $queried->post_type);

		array_unshift($parts, $queried->post_name);

    }

	if (is_front_page())
	    array_unshift($parts, 'home');
	
	if (is_search())
	    array_unshift($parts, 'search');

?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
		
		<?php $debug = false; ?>

        <link rel="preload" as="style" href="<?php echo assetsurl(); ?>index<?php echo !$debug ? '.min' : ''; ?>.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <meta property="og:title" content="intibiome">
        <meta property="og:site_name" content="<?php bloginfo('name'); ?>">

        <meta name="description" content="<?php bloginfo('description'); ?>">
        <meta property="og:description" content="<?php bloginfo('description'); ?>">

        <meta property="og:image" content="<?php echo assetsurl(); ?>images/card.jpg">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="650">
        <meta property="og:image:type" content="image/jpg">

        <link rel="icon" type="image/png" href="<?php echo assetsurl(); ?>images/favicon.png">
        <link rel="favorite icon" type="image/png" href="<?php echo assetsurl(); ?>images/favicon.png">
        <link rel="shortcut icon" type="image/png" href="<?php echo assetsurl(); ?>images/favicon.png">

        <link rel="stylesheet" type="text/css" href="<?php echo assetsurl(); ?>index<?php echo !$debug ? '.min' : ''; ?>.css">

		<title>intibiome</title>
	</head>
	<body>
		<h1 class="for-reader">intibiome</h1>

		<header class="site-header">
			<nav class="navbar">
				<div class="top">

					<div class="container">
						<div class="d-flex f-wrap justify-content-between">
							<div class="col-2 col-lg-4 d-flex align-items-center justify-content-start">
								<button type="button" aria-label="Open and close menu" class="toggle">
									<span></span>
									<span></span>
									<span></span>
								</button>
							</div>

							<div class="col-8 col-lg-4 d-flex align-items-center justify-content-center">
								<a href="<?php bloginfo('url'); ?>" class="d-block brand">
									<span class="for-reader">Come back to home</span>
									<img src="<?php echo assetsurl(); ?>images/logomarca.jpg" alt="Logo Intibiome" width="195" height="69">
								</a>
							</div>
							<div class="col-2 col-lg-4  d-flex align-items-center justify-content-end">
								<form method="get" action="#" novalidate class="search">
									<div class="group d-flex align-items-center justify-content-end">
										<label for="s-search" class="for-reader">Search</label>
										<input type="search" id="s-search" name="s">
										<button type="button" aria-label="button to search"><i class="icon-search"></i></button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

				<?php wp_nav_menu(['theme_location' => 'menu-header']); ?>
			</nav>
		</header>

		<?php 
			foreach ($parts as $part) {
				if (is_file(__DIR__ . "/templates/{$part}.php")) {
					?> 
					<main page="<?php echo $part; ?>">
						<?php require __DIR__ . "/templates/$part.php"; ?>
					</main>
					<?php
					break;
				}
			}
		?>

		<footer class="site-footer">
			<div class="container">
				<?php wp_nav_menu(['theme_location' => 'menu-footer']); ?>

				<div class="final d-flex f-wrap-reverse align-items-center justify-content-between">
					<div class="col-lg-6">
						<img src="<?php echo assetsurl(); ?>images/ulab-logo.png" alt="Brand Ulab" width="232" height="58" loading="lazy">
					</div>

					<div class="col-lg-6 text-right">
						<a href="#" target="_blank" rel="noopener">
							<span class="for-reader">Follow the instagram page</span>
							<i class="icon-instagram"></i>
						</a>
					</div>
				</div>
			</div>
		</footer>
		
		<?php if (is_file(__DIR__.'/assets/templates/s-'.$part.'.css')) { ?>
		<link rel="stylesheet" href="<?php echo assetsurl() . "templates/s-$part.css"; ?>">
		<?php } ?>
		<script src="<?php echo assetsurl(); ?>index<?php echo !$debug ? '.min' : ''; ?>.js"></script>

		<?php if (is_file(__DIR__.'/assets/templates/s-'.$part.'.js')) { ?>
		<script src="<?php echo assetsurl() . "templates/s-$part.js"; ?>"></script>
		<?php } ?>
	</body>
</html>