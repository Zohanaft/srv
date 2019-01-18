<?php

namespace App\Core;

class Router {
    protected $routes = [];
    protected $params = [];

    public function __construct() {
        $arr = require 'app/config/routes.php';
        foreach ( $arr as $rout => $params ) {
            $this->add( '/' . $rout, $params );
        }
    }

    public function add( $route, $params ) {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    public function match() {
        $url = $_SERVER['REQUEST_URI'];
        foreach ( $this->routes as $route => $params ) {
            if ( preg_match( $route, $url, $matches ) ) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run() {
        if ($this->match())
        {
            
            $patch = 'app\controllers\\' . ucfirst($this->params['controller']) . 'Controller';

            if (class_exists($patch)) {

                $action = $this->params['action'] . 'Action';

                if (method_exists($patch, $action)) {
                    $controller = new $patch($this->params);
                    $controller->$action();
                    //debug($controller);
                }
                else {
                    View::errorCode(404);
                }
            }
            else {
                View::errorCode(404);
            }
        }
        else {
            View::errorCode(404);
        }
    }
}
?>