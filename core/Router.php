<?php

namespace core;
use App\Controllers\BlogController;

class Router
{
    public static function route($url){
       $controller = new BlogController('Blog', 'indexAction');
    }
}