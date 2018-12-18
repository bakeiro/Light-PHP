<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta author="David Baqueiro">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Light PHP</title>

	<!-- Variables -->
	<?php $cache = Config::Get("cache_version"); ?>
	<?php $host = Url::$host; ?>

	<!-- my resources -->
	<link href="<?=$host?>/site/view/www/build/<?=$cache?>/site/site.css" rel="stylesheet">
	
	<!-- Materialize -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?=$host?>/site/view/www/node_modules/materialize-css/dist/css/materialize.min.css" rel="stylesheet">
	<script src="<?=$host?>/site/view/www/node_modules/materialize-css/dist/js/materialize.min.js"></script> 

</head>
<body>

<nav>
    <div class="nav-wrapper blue lighten-2">
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
<div class="container">
    <div id="main" class="main">