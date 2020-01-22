<?php
/*
 * Oleg Rovinskiy
 * 1/22/2020
 * it_328/food
 */

//Start Session
session_start();

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
    echo $view->render('views/breakfast.html');
});

//Buffet route
$f3->route('GET /breakfast/buffet', function(){
    $view = new Template();
    echo $view->render('views/breakfast-buffet.html');
});

//Lunch route
$f3->route('GET /lunch', function(){
    $view = new Template();
    echo $view->render('views/lunch.html');
});

//Order route
$f3->route('GET /order', function(){
    $view = new Template();
    echo $view->render('views/order/form1.html');
});

//Order2 route
$f3->route('POST /order2', function(){
    $_SESSION['food'] = $_POST['food'];
    $view = new Template();
    echo $view->render('views/order/form2.html');
});

//Summary route
$f3->route('POST /order3', function(){
    $_SESSION['meal'] = $_POST['meal'];
    $view = new Template();
    echo $view->render('views/order/form3.html');
});

$f3->route('POST /summary', function(){
    $view = new Template();
    echo $view->render('views/order/results.html');
});

//random route
$f3->route('GET /@item', function($f3, $param){
    var_dump($param);
    $item = $param['item'];
    echo "<p>You ordered $item</p>";

    $foodsWeServe = array("tacos","pizza","lumpia");
    if( !in_array($item, $foodsWeServe)){
        echo "<p>Sorry... we don't serve that $item</p>";
    }

    switch($item){
        case 'tacos':
            echo "<p>We serve tacos on Tuesday</p>";
            break;
        case 'pizza':
            echo "<p>Pepperoni or veggie?</p>";
            break;
        case 'bagel':
            $f3->reroute("/breakfast");
            break;
        default:
            $f3->error(404);
    }
});

$f3->run();