<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta author="David Baqueiro">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Light PHP</title>

	<!-- Variables -->
	<?php $cache = Config::Get("cache_version"); ?>
	<?php $host = Config::get("url_host"); ?>

	<!-- my resources -->
	<link href="<?=$host?>/site/view/www/build/<?=$cache?>/site/site.css" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

	<!--
    <link href="<?=$host?>/site/view/www/node_modules/materialize-css/dist/css/materialize.min.css" rel="stylesheet">
	<script src="<?=$host?>/site/view/www/node_modules/materialize-css/dist/js/materialize.min.js"></script> 
	-->
	
</head>
<body>

<?php
	//Custom CSS/JS
	foreach(Config::get("output_styles") as $style_file){
		echo $style_file;
	}
	foreach(Config::get("output_scripts") as $script_file){
		echo $script_file;
	}
?>

<nav>
    <div class="nav-wrapper red lighten-2">

		<a href="#" data-target="slide-out" class="sidenav-trigger">
			<i class="material-icons">menu</i>
		</a>
		
		<a href="/welcome" class="brand-logo">Your site</a>
		<ul id="nav-mobile" class="right hide-on-med-and-down">
			<li><a href="index.php?route=index/index/products">Ajax</a></li>
			<li><a href="index.php?route=index/index/contactForm">Contact</a></li>
			
			<?php if(Session::get("logged") && Session::get("customer_id")){ ?>
				<li><a href="index.php?route=account/customer/info">Account</a></li>
			<?php }else{ ?>
				<li><a href="index.php?route=account/customer/loginPage">Login</a></li>
			<?php } ?>
		</ul>
	</div>
</nav>

<ul id="slide-out" class="sidenav">
	<br><br>
    <li><a href="/welcome">Welcome</a></li>
    <li><div class="divider"></div></li>
	<li><a href="index.php?route=index/index/products">Ajax</a></li>
	<li><a href="index.php?route=index/index/contactForm">Contact</a></li>

	<?php if(Session::get("logged") && Session::get("customer_id")){ ?>
		<li><a href="index.php?route=account/customer/info">Account</a></li>
	<?php }else{ ?>
		<li><a href="index.php?route=account/customer/loginPage">Login</a></li>
	<?php } ?>
	
</ul>

<div class="container">
    <div id="main" class="main">