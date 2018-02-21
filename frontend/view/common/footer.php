</div>
</div>
</div>


<?php

//Controller
if(isset($scripts)){
    foreach($scripts as $script){
        echo $script;
    }
}

//Load
foreach($GLOBALS['engine']['util']->$styles as $style){
    echo $style;
}
foreach($GLOBALS['engine']['util']->$scripts as $script){
    echo $script;
}
?>

</body>
</html>