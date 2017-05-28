<html>

<head>
</head>

<body>


<?php
    foreach($orders as $order){

        echo '<div class="bd-callout bd-callout-warning">';
        echo '<h4 id="conveying-meaning-to-assistive-technologies">Order id :'.$order['order_id'].'</h4>';
        echo '<p>'.$order['firstname'].' '.$order['lastname'].'</p>';
        echo '</div>';
    }
?>

</body>

</html>