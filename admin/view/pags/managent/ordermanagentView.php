<?php



/* Success message */
if (isset($_GET['or']) && $_GET['or'] == true) {
    echo '<br><div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>SUCCESS! </strong>Changes of the <b style="font-size:15px;">order:' . $_GET['or'] . '</b> sucesfull saved!</a></div>';
}

/* Email problem */
if (isset($_GET['er']) && $_GET['er'] == true) {
    echo '<br><div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>EMAIL PROBLEM! </strong>The <b style="font-size:15px;">order:' . $_GET['er'] . '</b> The email couldnt be sended!</a></div>';
}

/* Ftp info */
if (isset($_GET['up']) && $_GET['up'] == true) {
    $msg = '';
    if ($_GET['up'] == -1) {
        $msg = "File wasn´t found but one was created";
    }
    if ($_GET['up'] == -2) {
        $msg = "Couldn delete the pdf file!";
    }
    echo '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>FTP FOLDER:  </strong>' . $msg . '</a></div>';
}

/* Old view */
foreach($orders as $order){ ?>
    <div class="bd-callout bd-callout-warning">
        <h4 id="conveying-meaning-to-assistive-technologies"><?=$order['order_id']?></h4>
        <p><?=$order['store_name']?></p>
    </div>
<?php } ?>