<?php

class Controller
{
    public function view($name, $data = [])
    {

        if(!empty($data))
        extract($data);
        
        $fileName = "App/Views/".$name.".view.php";

        if (file_exists($fileName)) {
            require $fileName;
        } else {
            $fileName = "App/Views/404.view.php";
            require $fileName;
        }
    }
}