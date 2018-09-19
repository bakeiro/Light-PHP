<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta author="David Baqueiro">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Light PHP</title>

	<!-- Resources -->
	<?php $cache = Config::Get("cache_version"); ?>
	<?php $host = Url::$host; ?>

	<!-- Custom resources -->
	<link href="<?=$host?>/admin/view/www/<?=$cache?>/admin/admin.css" rel="stylesheet">
	
	<!-- Materialize 
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	-->
	<link href="http://frame.localhost/site/view/www/fonts/google_icons.css" rel="stylesheet">
    <link href="<?=$host?>/site/view/www/node_modules/materialize-css/dist/css/materialize.min.css" rel="stylesheet">
	<script src="<?=$host?>/site/view/www/node_modules/jquery/dist/jquery.min.js"></script>
	<script src="<?=$host?>/site/view/www/node_modules/materialize-css/dist/js/materialize.min.js"></script> 

</head>
<body>

<!-- Sidenav -->
<div class="sidenav">
	
	<ul id="slide-out" class="side-nav fixed">
		<li>
		<div class="user-view blue lighten-2">
			<a href="#!name"><span class="white-text name"><?=Session::get("admin_name")?></span></a>
			<a href="#!email"><span class="white-text email"><?=Session::get("admin_email")?></span></a>
		</li>
		<li><a href="index.php?route=dashboard/dashboard">Dashboard</a></li>
		<li><a href="index.php?route=database/database">Database</a></li>
		<li><a href="index.php?route=error_managent/error_managent">Error managent</a></li>
		<li><div class="divider"></div></li>
		<li><a class="waves-effect grey-text" href="index.php?route=footer/footer">Footer</a></li>
		<li><a class="grey-text" href="index.php?route=login/login/logout">Log out</a></li>
  	</ul>

  	<a href="#" data-activates="slide-out" class="button-collapse hide-on-large-only"><i class="material-icons">menu</i></a>
</div>
<script>
	$(".button-collapse").sideNav();
</script>

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