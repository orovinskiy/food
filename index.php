<?php
/*
 * Oleg Rovinskiy
 * 1/22/2020
 * it_328/food
 */

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("vendor/autoload.php");

$f3 = Base::instance();

$f3->route("GET /", function(){
    $view = new Template();
    echo $view->render("views/home.html");
});

//Breakfast route
$f3->route('GET /breakfast', function(){
    $view = new Template();
    $view->render('views/breakfast.html');
});

$f3->run();