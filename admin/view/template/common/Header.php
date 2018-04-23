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

	<!-- Custom resources -->
	<link href="<?=$host?>/admin/view/www/<?=$cache?>/admin/admin.css" rel="stylesheet">
	
	<!-- Materialize -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?=$host?>/site/view/www/node_modules/materialize-css/dist/css/materialize.min.css" rel="stylesheet">
	<script src="<?=$host?>/site/view/www/node_modules/jquery/dist/jquery.min.js"></script>
	<script src="<?=$host?>/site/view/www/node_modules/materialize-css/dist/js/materialize.min.js"></script> 

</head>
<body>

<div id="main">

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