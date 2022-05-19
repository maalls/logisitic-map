<?php

require __DIR__ . '/vendor/autoload.php';

$params = $_GET;
list($rStart, $rEnd) = explode(",", $params['r']);
$step = $params['step'];
$map = new Maalls\LogisticMap();

$filename = $map->generate($rStart, $rEnd, $step);


