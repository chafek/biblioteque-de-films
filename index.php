<?php

require('src/controllers/HomeController.php');
require('src/controllers/AddFilmsController.php');
require('src/controllers/ListFilmsController.php');
require('src/controllers/ShowFilmsController.php');

$page=filter_input(INPUT_GET,'page');

$router=[
    'add'=>AddFilm::class,
    'home'=>Home::class,
    'list'=>ListFilm::class,
    'show'=>ShowFilm::class
];

foreach($router as $routerValue=>$className){
   
    if($page===$routerValue){
        $controller=new $className;
        $controller->manage();
        break;
    }

}

if(!isset($controller)){
    $controller=new Home();
    $controller->manage();
}