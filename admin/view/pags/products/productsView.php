<?php

foreach($products as $product){ ?>

    <div class="bd-callout bd-callout-warning">
        <h4 id="conveying-meaning-to-assistive-technologies"><?=$product['name']?></h4>
        <p><?=$product['detail_name']?></p>
    </div>
<?php } ?>