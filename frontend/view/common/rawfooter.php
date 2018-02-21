<?php

//TODO:Make this inside the database
if(isset($scripts) && count($scripts) > 0){
    foreach($scripts as $script){
        echo $script;
    }
}
?>
</body>
</html>