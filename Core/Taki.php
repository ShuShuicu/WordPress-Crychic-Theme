<?php 
if (!defined('ABSPATH')) exit;
$CoreFiles = [
    'Anon', 
    'Soyo',
    'Saki',
    'Rana',
    'Mutsumi',
    'Crychic',
    'Assets',
];
foreach ($CoreFiles as $file) {
    require_once $file . '.php';
}