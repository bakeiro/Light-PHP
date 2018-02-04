<!DOCTYPE html>
<html>
<head>

    <!-- META TAGS -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta author="David Baqueiro">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Light PHP</title>

    <?php
        $cache_version = $GLOBALS['app_data']['settings']->get("cache_version");
    ?>

    <!--CSS -->
    <link href="view/boot/<?=$cache_version?>/node_modules/materialize-css/dist/css/materialize.min.css" rel="stylesheet">

	<!-- JS -->
	<script src="view/boot/<?=$cache_version?>/node_modules/materialize-css/dist/css/materialize.min.js"></script> 
	<script src="view/boot/<?=$cache_version?>/node_modules/jquery/dist/jquery.min.js"></script> 

    <!-- Custom styles -->
    <?php
    if(isset(Load::$styles) && count(Load::$styles) > 0)
        foreach(Load::$styles as $style){
            echo $style;
        }
    ?>
</head>
<body>

<!-- NAVBAR -->
<nav>
    <div class="nav-wrapper">
		<a href="#" class="brand-logo">Frontend</a>
		<ul id="nav-mobile" class="right hide-on-med-and-down">
			<li><a href="#">Products</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
		</ul>
	</div>
</nav>

<div class="row no-gutters">
    
    <!-- MAIN CONTENT -->
    <div class="col-md-11 offset-md-1">

        <div id="main" class="main">

            <?php
			if(count($GLOBALS['app_data']['error']->warnings) > 0){
				echo '<div class="card horizontal red lighten-4">';
				echo '<div class="card-stacked">';
				echo '<div class="card-content">';
				foreach($GLOBALS['app_data']['error']->warnings as $message){	
					echo '<p class="center-align">'.$message.'</p>';
				}
				echo '</div>';
				echo '</div>';
				echo '</div>';
			}
            ?>