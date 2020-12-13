<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta author="David Baqueiro">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Light PHP</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="/www/dist/src.css?v=<?= $this->cache_version; ?>" rel="stylesheet">

</head>
<body>

<?php
// Custom CSS/JS
foreach ($this->output_styles as $style_file) {
    echo $style_file;
}
foreach ($this->output_scripts as $script_file) {
    echo $script_file;
}
?>

<nav class="white black-text" style="height: 85px;">
    <div class="nav-wrapper container">

        <a href="#" data-target="slide-out" class="sidenav-trigger">
            <i class="material-icons teal-text">menu</i>
        </a>

        <a href="/welcome" class="brand-logo teal-text">Logo</a>
        <span style="position: absolute;top: 35px;">Header: src/view/template/common/Header.php</span>

        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a class="black-text" href="index.php?route=product/product/samplePage">Sample</a></li>
            <li><a class="black-text" href="index.php?route=product/product/sample">Not found page</a></li>
        </ul>
    </div>
</nav>

<ul id="slide-out" class="sidenav">
    <br><br>
    <li><a href="/welcome">Welcome</a></li>
    <li><div class="divider"></div></li>
    <li><a href="index.php?route=product/product/samplePage">Sample</a></li>
    <li><a href="index.php?route=product/product/otherMethod">Not found page</a></li>
</ul>

<div class="container">
    <div id="main" class="main">
