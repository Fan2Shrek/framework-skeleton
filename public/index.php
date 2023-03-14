<?php

require '../vendor/autoload.php';

use App\Kernel;
use App\Request\Request;

function dd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die();
}

$req = Request::getRequest();
$kernel = new Kernel();
$kernel->handle($req);
