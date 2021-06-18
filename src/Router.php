<?php

namespace App;

class Router
{
    public function run()
    {
        $type = $_GET["type"] ?? "Main";
        $action = "action" . ($_GET["action"] ?? "index");


        $controllerName = "App\\Controller\\$type";
        if (class_exists($controllerName)) {
            $controller = new $controllerName();
            if (method_exists($controller, $action)) {

                $controller->{$action}();

            } else {
//                echo "Method NOT Found";
                header("HTTP/1.1 403 Forbidden");
                include __DIR__ . "/../templates/erros/403.php";

            }

        } else {
//                echo "Class not found";
            include __DIR__ . "/../templates/erros/404.php";
//            header("HTTP/1.1 404 Not Found");
        }
    }

}