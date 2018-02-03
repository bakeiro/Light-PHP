<!DOCTYPE html>
<html>
<head>

    <!-- META TAGS -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta author="David Baqueiro">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Backend</title>

    <?php
        $cache_version = $GLOBALS['settings']['cache']['version'];
    ?>

    <!-- JS/CSS -->
    <!-- JQUERY UI --><link href="view/boot/<?=$cache_version?>/node_modules/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="view/boot/<?=$cache_version?>/node_modules/bootstrap1/css/bootstrap.min.css" rel="stylesheet">
    <script src="view/boot/<?=$cache_version?>/node_modules/jquery/dist/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="view/boot/<?=$cache_version?>/node_modules/bootstrap1/js/bootstrap.min.js"></script>
    
    <!--JQuerty UI --><script src="view/boot/<?=$cache_version?>/node_modules/jquery-ui/jquery-ui.min.js"></script>

    <!-- Extra -->
    <link rel="stylesheet" href="view/boot/<?=$cache_version?>/custom/docs.css">
    <link rel="stylesheet" href="view/boot/<?=$cache_version?>/custom/estilos.css">
    <script src="view/boot/<?=$cache_version?>/custom/scripts.js"></script>
    <link href="view/boot/<?=$cache_version?>/fonts/open-iconic-bootstrap.min.css" rel="stylesheet">

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
    <a class="navbar-brand" href="?route=order/managent"><?=$GLOBALS['settings']['header']['name']?>  BACKEND</a>
    <button class="navbar-toggler navbar-toggler-left" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

        <ul class="navbar-nav mr-auto mt-2 mt-md-0">

            <!-- Unavaliable prods -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Messages <span class="badge badge-default"><?=$GLOBALS['settings']['header']['out_of_stock'] ?></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="prods">
                    <h6 class="dropdown-header"><a href="index.php?route=info/info/stock_prods" > out of stock </a><span class="badge badge-default"><?=$GLOBALS['settings']['header']['out_of_stock'] ?></span></h6>
                    <li> </li>
                </div>
            </li>

            <!--
           <li class="nav-item">
               <a class="nav-link" href="?route=admin/admin">Admin<span class="sr-only">(current)</span></a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="?route=products/products">Products</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="?route=info/info/contact">Contact</a>
           </li>
           -->
       </ul>


    </div>
</nav>


<div class="row no-gutters">
    <!-- SIDENAV -->
    <div class="col-md-1 hidden-sm-down sidenav fixed-top">
        <ul class="sidenav">
            <a href="?route=login/login/welcome" ><li>Admin</li></a>
            <hr>
            <a href="?route=order/managent" ><li>Order Managent</li></a>
            <a href="?route=order/pending" ><li>Pending orders</li></a>
            <a href="?route=stadistics/stadistics" ><li>Stadistics</li></a>
            <a href="?route=customer/url" ><li>Customer info</li></a>
            <hr>
            <a href="?route=login/login/logout&logout_msg=2" ><li>Log out</li></a>
            <br><br><br><br>
        </ul>
    </div>
    <!-- MAIN CONTENT -->
    <div class="col-md-11 offset-md-1">

        <div id="main" class="main">

            <?php
            foreach($_SESSION['output'] as $message){
                echo '<div class="alert alert-dismissible alert-warning output"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$message.'</div>';
            }
            unset($_SESSION['output']);
            ?>