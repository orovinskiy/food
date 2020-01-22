<?php
//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require("vendor/autoload.php");

$f3 = Base::instance();

$f3->route("Get /", function(){
    $view = new Template();
    echo $view->render("views/");
});

$f3->run();