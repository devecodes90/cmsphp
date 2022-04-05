<?php

namespace Core;
#use App\Controllers\BlogController;

class Router
{
    public static function route($url){
        $urlParts = explode('/', $url);

        // set controller path
        $controller = !empty($urlParts[0]) ? $urlParts[0] : Config::get('default_controller');
        $controllerName = $controller;
        $controller = '\App\Controllers\\' . ucwords($controller) . 'Controller';

        // set action path
        array_shift($urlParts);
        $action = !empty($urlParts[0]) ? $urlParts[0] : 'index';
        $actionName = $action;
        $action .= "Action";
        array_shift($urlParts);

        if(!class_exists($controller)){ 
            throw new \Exception("The controller \"{$controller}\" does not exist");
            
         }
        $controllerClass = new $controller($controllerName, $actionName);
        

        if(!method_exists($controllerClass, $action)){
            throw new \Exception("The method \"{$action}\" does not exist on the class \"{$controller}\" controller.");
        }

        call_user_func_array([$controllerClass, $action], $urlParts);
       
    }
}