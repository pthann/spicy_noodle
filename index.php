<?php
    require_once("controllers/Controller.php");
    require_once("controllers/HomeController.php");
    require_once("controllers/DetailController.php");
    require_once("controllers/LoginController.php");


    require_once("Route.php");
    
    

    $router = new Route();
    $router -> addRoute("/home","HomeController@getHome");
    $router -> addRoute("/product","DetailController@getDetail");
    $router -> addRoute("/login","LoginController@getView");

    

    $requestedUrl = $_SERVER['REQUEST_URI'];
    $router->routeRequest($requestedUrl);
    

?>