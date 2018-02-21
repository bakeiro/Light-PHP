<html>
<head>

    <!-- META TAGS -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta author="David Baqueiro">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>

    <!-- BOOTS
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    -->

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
<nav class="navbar navbar-inverse bg-primary fixed-top navbar-toggleable-md bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="?route=welcome/welcome">BACKEND</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-md-0">
            <li class="nav-item">
                <a class="nav-link" href="?route=admin/admin">Admin<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?route=products/products">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?route=info/info/contact">Contact</a>
            </li>
        </ul>
    </div>
</nav>


<div class="row no-gutters">
    <!-- SIDENAV -->
    <div class="col-md-1 sidenav">
        <ul class="sidenav">
            <li><a href="?route=order/managent" >Order Managent</a></li>
            <li><a href="?route=google/settings" >Google settings</a></li>
            <li><a href="?route=customer/url" >Customer url info</a></li>
            <li><a href="?route=order/order/create" >Create order</a></li>
            <li><a href="?route=order/order/pending" >Pending orders</a></li>
        </ul>
    </div>
    <!-- MAIN CONTENT -->
    <div class="col-md-11">
        <div class="main">
        <!-- TODO: breadcrumbs here?? -->


