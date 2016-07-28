<?php

require_once '../../vendor/autoload.php';

$app = new \Sainsbury\Application();

$output = new \Sainsbury\View\Output\Adapter\JSON();
$view = new \Sainsbury\View($output);

$app->setView($view);

echo $app->run();

