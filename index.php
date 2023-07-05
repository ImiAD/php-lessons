<?php
declare(strict_types=1);

use App\form\Routing\Route;

error_reporting(-1);
session_start();

require_once __DIR__ . '/vendor/autoload.php';

function dd($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

function dump($data)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}

//echo (new Route())->run($_SERVER['REQUEST_URI']);

require __DIR__ . '/src/DZ/ProblemBook/lesson-1.php';
