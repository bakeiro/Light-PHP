<head>

    <!-- META TAGS -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>


    <!-- Bootstrap -->
    <link href="view/boot/0.1/node_modules/bootstrap1/css/bootstrap.min.css" rel="stylesheet">
    <script src="view/boot/0.1/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="view/boot/0.1/node_modules/jquery-ui/jquery-ui.min.js"></script>
    <!-- End Bootstrap -->

    <?php

   if(isset($styles) && count($styles) > 0){
        foreach($styles as $style){
            echo $style;
        }
    }
    ?>
</head>

<?php
if(isset($styles) && count($styles) > 0){
    foreach($styles as $style){
        echo $style;
    }
}
?>