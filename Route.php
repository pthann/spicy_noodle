<?php
class Route {
    private $routes = [];

    public function addRoute($url, $controllerMethod) {
        $this->routes[$url] = $controllerMethod;
    }

    public function routeRequest($url) { // /admin 
        if (array_key_exists($url, $this->routes)) {
            list($controller, $method) = explode('@', $this->routes[$url]); // $controller = AdminController, $method = getView 

            $controllerInstance = new $controller(); // $controllerInstance = new AdminController(); 
            $controllerInstance->$method();    // $controllerInstance ->getView();   
        }else{
            include("views/404.php");
        }
    }
} 
?>