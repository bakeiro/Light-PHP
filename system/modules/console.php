<?php


require(BACK_SYSTEM.'modules/dBug.php');
Load::load_js('console/console');

if($GLOBALS['settings']['url']['type'] === 'route'){
    echo '<div id="console" style="overflow:auto;    display:none; position: fixed; bottom: 0;   width: 100%;    left: 0;   background-color: lightgray;    z-index: 100; height:200px;">';
    echo '<div id="console_title" style="; position: fixed;  width: 100%;background-color:limegreen;height: 20px;" class="title"><span style="color:white">Console</span></div>';
    echo '<div style="padding: 30px 10px;">';
            
            foreach($_SESSION['errors'] as $error){
                new dBug($error,'error'); // Here error and then dbug
            }
            
    echo '</div>';
    echo '</div>';
}