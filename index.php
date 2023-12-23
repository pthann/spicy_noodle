<?php
    require_once("controllers/Controller.php");
    require_once("controllers/HomeController.php");
    require_once("controllers/DetailController.php");
    require_once("controllers/LoginController.php");
    require_once("controllers/AdminController.php");
  
    
    require_once("Route.php");
    
    
    $router = new Route();
    $router -> addRoute("/home","HomeController@getHome");
    $router -> addRoute("/product","DetailController@getDetail");
    $router -> addRoute("/login","LoginController@getView");
    $router -> addRoute("/admin","AdminController@getView");
    $router -> addRoute("/admin/category","AdminController@getCategoryView");
    $router -> addRoute("/admin/tag","AdminController@getTagView");

    $router -> addRoute("/admin/logout","AdminController@logout");


    $requestedUrl = $_SERVER['REQUEST_URI'];
    $router->routeRequest($requestedUrl);

    ?>