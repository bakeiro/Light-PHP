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
foreach($GLOBALS['App']['load']->$styles as $style){
    echo $style;
}
foreach($GLOBALS['App']['load']->$scripts as $script){
    echo $script;
}
?>

</body>
</html>