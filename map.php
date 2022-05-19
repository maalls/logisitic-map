<?php

require __DIR__ . '/vendor/autoload.php';



$map = new Maalls\LogisticMap();

$map->generate(3.545, 3.65, 0.001);
