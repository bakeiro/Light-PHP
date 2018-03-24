<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta author="David Baqueiro">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Light PHP</title>

	<!-- Resources -->
	<?php $cache = Settings::Get("cache_version"); ?>
	<?php $host = Url::$host; ?>

	<!-- my resources -->
	<link href="<?=$host?>/site/view/www/<?=$cache?>/site/site.css" rel="stylesheet">
	
	<!-- Materialize -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?=$host?>/site/view/www/node_modules/materialize-css/dist/css/materialize.min.css" rel="stylesheet">
	<script src="<?=$host?>/site/view/www/node_modules/jquery/dist/jquery.min.js"></script>
	<script src="<?=$host?>/site/view/www/node_modules/materialize-css/dist/js/materialize.min.js"></script> 

</head>
<body>

<nav>
    <div class="nav-wrapper">
		<a href="index.php?route=index/index" class="brand-logo">site</a>
		<ul id="nav-mobile" class="right hide-on-med-and-down">
			<li><a href="index.php?route=product/product">Login</a></li>
			<li><a href="index.php?route=product/product">Products</a></li>
			<li><a href="index.php?route=index/index/about">About</a></li>
			<li><a href="index.php?route=contact/contact">Contact</a></li>
		</ul>
	</div>
</nav>

<div class="container">
    <div id="main" class="main">