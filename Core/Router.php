<?php

class Router
{
    private $controller = 'Home';
    private $method = 'index';

    private function splitURL()
    {
        $URL = $_GET['url'] ?? 'home';
        $URL = explode("/", trim($URL, "/"));

        return $URL;
    }

    public function loadRouter()
    {
        $URL = $this->splitURL();
        $fileName = "App/Controllers/".ucfirst($URL[0]).".php";

        if (file_exists($fileName)) {
            require $fileName;
            $this->controller = ucfirst($URL[0]);
        // unset($URL[0]);
        } else {
            $fileName = "App/Controllers/_404.php";
            require $fileName;
            $this->controller = "_404";
        }
        $controller = new $this->controller();
        call_user_func_array([$controller, $this->method], []);
    }
};
