<?php 
class Router {
    public $routes = [];

    public function add($route, $params) 
    {
       return $this->routes[$route] = $params;
    }

    public function getRoutes() 
    {
        return $this->routes;
    }

};

?>