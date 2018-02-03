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
foreach(Load::$styles as $style){
    echo $style;
}
foreach(Load::$scripts as $script){
    echo $script;
}
?>

</body>
</html>