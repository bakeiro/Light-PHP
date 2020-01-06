<!DOCTYPE html>
<html>
<head>

    <?php
        use Library\Config;
        use Library\Output;
    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta author="David Baqueiro">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Light PHP</title>

    <!-- Variables -->
    <?php $cache = Config::get("cache_version"); ?>
    <?php $host = Config::get("url_host"); ?>

    <!-- my resources -->
    <link href="src/view/www/dist/src.css?v=<?=$cache?>" rel="stylesheet">
    <script src="src/view/www/dist/jquery.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</head>
<body>

<?php
// Custom CSS/JS
foreach(Output::$output_styles as $style_file) {
    echo $style_file;
}
foreach(Output::$output_scripts as $script_file) {
    echo $script_file;
}
?>

<nav>
    <div class="nav-wrapper red lighten-2">

        <a href="#" data-target="slide-out" class="sidenav-trigger">
            <i class="material-icons">menu</i>
        </a>

        <a href="/welcome" class="brand-logo">Logo</a>
        <span style="position: absolute; left: 99px; top: 15px;">Modify me: src/view/template/common/Header.php</span>

        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="index.php?route=index/index/sample">Sample</a></li>
            <li><a href="index.php?route=index/index/test">Not found page</a></li>
        </ul>
    </div>
</nav>

<ul id="slide-out" class="sidenav">
    <br><br>
    <li><a href="/welcome">Welcome</a></li>
    <li><div class="divider"></div></li>
    <li><a href="index.php?route=index/index/sample">Sample</a></li>
    <li><a href="index.php?route=index/index/test">Not found page</a></li>

</ul>

<div class="container">
    <div id="main" class="main">
