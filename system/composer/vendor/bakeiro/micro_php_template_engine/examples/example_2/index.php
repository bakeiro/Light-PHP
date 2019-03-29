<?php

require('../microTemplate.php');
$template_engine = new template();

$data = array();
$data['number'] = 10;

$output = $template_engine->load('If.tpl', $data);
echo $output;