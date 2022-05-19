<?php

require_once __DIR__ . '/../vendor/autoload.php';

$params = $_GET;
$rMin = $params['rMin'];
$rMax = $params['rMax'];
$map = new Maalls\LogisticMap($rMin, $rMax);
$filename = $map->generate();

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
$twig = new \Twig\Environment($loader, [
    'debug' => true
]);

$template = $twig->load('index.html.twig');

echo $template->render(['filename' => 'data/' . basename($filename), 'form' => $map]);