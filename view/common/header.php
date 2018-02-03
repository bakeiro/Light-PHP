<!DOCTYPE html>
<html>
<head>

    <!-- META TAGS -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta author="David Baqueiro">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Light PHP</title>

    <?php
        $cache_version = $GLOBALS['settings']['cache']['version'];
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
<nav class="navbar navbar-inverse bg-primary fixed-top navbar-toggleable-md bg-faded">
    <a class="navbar-brand" href="?route=order/managent"><?=$GLOBALS['settings']['header']['name']?>  Frontend</a>
</nav>


<div class="row no-gutters">
    
    <!-- MAIN CONTENT -->
    <div class="col-md-11 offset-md-1">

        <div id="main" class="main">

            <?php
            foreach($_SESSION['output'] as $message){
                echo '<div class="alert alert-dismissible alert-warning output"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$message.'</div>';
            }
            unset($_SESSION['output']);
            ?>