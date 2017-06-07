<html>
<head>

    <!-- META TAGS -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta author="David Baqueiro">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>

    <!-- BOOTS LOCAL -->
    <link href="view/boot/bootstrap.min.css" rel="stylesheet">
    <script src="view/boot/jquery-3.1.1.slim.min.js"></script>
    <script src="view/boot/tether.min.js"></script>
    <script src="view/boot/bootstrap.min.js"></script>



    <!-- test -->
    <link rel="stylesheet" href="view/boot/docs.css">
    <link rel="stylesheet" href="view/boot/estilos.css">
</head>
<body>


<!-- NAVBAR -->
<nav class="navbar navbar-inverse bg-primary navbar-toggleable-md bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="?route=welcome/welcome">FRONTEND</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-md-0">
            <li class="nav-item">
                <a class="nav-link" href="<?=$GLOBALS['settings']['url']['host']?>/mvc2/admin?route=admin/admin">Admin<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=$GLOBALS['settings']['url']['host']?>/mvc2?route=products/products/category&category=AAA">Products AAA</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=$GLOBALS['settings']['url']['host']?>/mvc2?route=products/products/category&category=BBB">Products BBB</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=$GLOBALS['settings']['url']['host']?>/mvc2?route=products/products/category&category=CCC">Products CCC</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=$GLOBALS['settings']['url']['host']?>/mvc2?route=info/info/contact">Contact</a>
            </li>
        </ul>
    </div>
</nav>


<div class="row no-gutters">
    <!-- MAIN CONTENT -->
    <div class="col-md-11">
        <div class="main">


