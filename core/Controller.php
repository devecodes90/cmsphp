<?php

namespace Core;
use Core\{View, Config};

class Controller
{
   private $_controllerName, $_actionName;
   public $view, $request;

   public function __construct($controller, $action){
       $this->_controllerName = $controller;
       $this->_actionName = $action;
       $viewPath = strtolower($controller) . '/' . $action;
       $this->view = new View($viewPath);
       $this->view->setLayout(  Config::get('default_layout'));
   }
}