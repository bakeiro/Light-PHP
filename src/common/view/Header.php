<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta author="David Baqueiro">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Light PHP</title>

    <?php $host = $this->config->get("url_host"); ?>

    <link href="/www/dist/src.css?v=<?= $this->config->get("cache_version") ?>" rel="stylesheet">
    <script src="/www/dist/jquery.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</head>
<body>

<?php
// Custom CSS/JS
foreach($this->output->output_styles as $style_file) {
    echo $style_file;
}
foreach($this->output->output_scripts as $script_file) {
    echo $script_file;
}
?>

<nav>
    <div class="nav-wrapper blue darken-1">

        <a href="#" data-target="slide-out" class="sidenav-trigger">
            <i class="material-icons">menu</i>
        </a>

        <a href="/welcome" class="brand-logo">Logo</a>
        <span style="position: absolute; left: 99px; top: 15px;">Header: src/view/template/common/Header.php</span>

        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="index.php?route=index/index/samplePage">Sample</a></li>
            <li><a href="index.php?route=index/index/test">Not found page</a></li>
        </ul>
    </div>
</nav>

<ul id="slide-out" class="sidenav">
    <br><br>
    <li><a href="/welcome">Welcome</a></li>
    <li><div class="divider"></div></li>
    <li><a href="index.php?route=index/index/samplePage">Sample</a></li>
    <li><a href="index.php?route=index/index/test">Not found page</a></li>
</ul>

<div class="container">
    <div id="main" class="main">