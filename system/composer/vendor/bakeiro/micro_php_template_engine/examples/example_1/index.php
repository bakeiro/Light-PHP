<?php

require('../microTemplate.php');
$template_engine = new template();

$data = array();
$data['value'] = 'Welcome to my page';

$output = $template_engine->load('Brackets.tpl', $data);
echo $output;