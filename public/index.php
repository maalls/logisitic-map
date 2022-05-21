<?php

require_once __DIR__ . '/../vendor/autoload.php';
use Maalls\Http\Request;

$request = new Request();

$params = $_GET;
$rMin = $request->get('rMin', 2);
$rMax = $request->get('rMax', 4);
$xMin = $request->get('yMin');
$xMax = $request->get('yMax');
$map = new Maalls\LogisticMap($rMin, $rMax, $xMin, $xMax);
$filename = $map->generate();

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
$twig = new \Twig\Environment($loader, [
    'debug' => true
]);

$template = $twig->load('index.html.twig');

echo $template->render(['filename' => 'data/' . basename($filename), 'form' => $map]);