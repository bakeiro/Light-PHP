<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta author="David Baqueiro">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin panel</title>

	<!-- Resources -->
	<?php $cache = Config::get("cache_version"); ?>
	<?php $host = Config::get("url_host"); ?>

	<!-- Custom resources -->
	<link href="<?=$host?>/admin/view/www/build/admin/admin.css?v=<?=$cache?>" rel="stylesheet">
	
	<!-- Materialize + jquery -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script src="<?=$host?>/admin/view/www/build/jquery.min.js"></script>
	
</head>
<body>

<!-- Sidenav -->

<ul id="slide-out" class="sidenav sidenav-fixed white">
	<li>
		<div class="user-view blue lighten-2">
			<a href="#!name"><span class="white-text name"><?=Session::get("admin_name")?></span></a>
			<a href="#!email"><span class="white-text email"><?=Session::get("admin_email")?></span></a>
		</div>
	</li>
	<li><a href="index.php?route=info/info/dashboard">Dashboard</a></li>
	<li><a href="index.php?route=info/info/database">Database</a></li>
	<li><a href="index.php?route=info/info/error_managent">Error managent</a></li>
	<li><div class="divider"></div></li>
	<li><a class="red-text" href="index.php?route=login/login/logout">Log out</a></li>
</ul>

<nav class="top-nav white">
	<a href="#" data-target="slide-out" class="sidenav-trigger black-text">
		<i class="material-icons">menu</i>
	</a>
</nav>



<!-- Main content -->
<main class="container" id="main">

<?php
	foreach(Errors::$exceptions as $exception){			
		if($exception["type"] === "error"){
			echo "<p><i class='material-icons red-text'>error</i>".$exception["text"]."</p>";
		}
		if($exception["type"] === "warning"){
			echo "<p><i class='material-icons red-text'>error</i>".$exception["text"]."</p>";
		}
	}
?>