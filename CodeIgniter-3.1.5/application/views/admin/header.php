<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title><?php echo $title; ?></title>

		<!--Remy Sharp Shim --> 
		<!--[if lte IE 9]> 
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js" >
		</script> 
		<![endif]-->
		<link href="<?php echo base_url(); ?>public/css/reset.css" type="text/css" rel="stylesheet">    
		<link href="<?php echo base_url(); ?>public/css/styles.css" type="text/css" rel="stylesheet">    
		<meta name="viewport" content="width=device-width, initial-scale=1.0" > 
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>public/images/favicon.ico">
		<!-- font --> 
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		
	</head>
	<body>
		<header>
			<div id="head">
				<img src="<?php echo base_url(); ?>public/images/logo.png" alt="logo">
			</div>

			<ul>
				<a href="<?php echo base_url(); ?>dashboard">
					<li>
						Home
					</li>
				</a>
				<a href="<?php echo base_url(); ?>tags">
					<li>
						Tags
					</li>
				</a>
				<a href="<?php echo base_url(); ?>cats">
					<li>
						Categories
					</li>
				</a>
				<a href="<?php echo base_url(); ?>authors">
					<li>
						Authors
					</li>
				</a>
				<a href="<?php echo base_url(); ?>logout">
					<li>
						Logout
					</li>
				</a>
			</ul>
		
	</header>
<!--++++++++++ START MOBILE NAVIGATION ++++++++-->		
		<button class="nav-button">Toggle Navigation</button>
		<div class="mobile-logo"> 
			<a href="index.html" title="Home">
			<img src="<?php echo base_url(); ?>public/images/logo-small.png" alt="small logo">
			</a>
		</div>
		
		<ul class="primary-nav">
			<li><a href="index.html">Home</a></li>
			<li><a href="about.html">About Us</a>
			</li>
			<li><a href="portfolio.html">Portfolio</a></li>
			<li><a href="contact.html">Contact</a></li>
		</ul>
		<script>
		$(document).ready(function(){
			$(".nav-button").click(function () {
			$(".nav-button,.primary-nav").toggleClass("open");
			});
		});
		</script>
<!--++++++++++ END MOBILE NAVIGATION ++++++++-->
		<div id="wrapper">
<!--++++++++++ END Header ++++++++-->