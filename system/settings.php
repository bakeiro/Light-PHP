<?php

$settings = array();

//Site
$settings['site']['name']         = "Backend";
$settings['site']['description']  = "Backend";
$settings['site']['creator']      = "David Baqueiro Santerbás";


//Folders
$settings['ftp']['path']               = "/httpdocs";
$settings['ftp']['path_upload']        = "/httpdocs/site/upload";
$settings['ftp']['path_download']      = "/httpdocs/site/downloads";
$settings['ftp']['path_files']         = "/httpdocs/site/util";
$settings['ftp']['main_route']         = "C:/xampp/htdocs/";

$settings['tax_value'] = 0.19;
$settings['tax_value1'] = 1.19;

$settings['cache']['version'] = '0.2';

$settings['stadistics']['info'] = '<button type="button" class="btn btn-secondary info-popover" data-toggle="tooltip" data-placement="top" title="Regard all orders considerer as paid, if are not deleted not entwurft, excluding Amazon, ebay, angebot, gutschrift and lieferschein for this store and including the day of today in all results">
<span class="oi oi-info"></span>
</button>';