<?php

namespace App\Core;

use App\Core\View;

abstract class Controller {
    public $view;
    public $route;

    public function __construct($route) {
        $this->route = $route;
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);

    }

    public function loadModel($name) {
        $path = 'App\Models\\' . ucfirst($name);
        if (class_exists($path)) {
            return new $path;
        }
    }
}

?>