<?php

namespace App\Core;

class View {
    public $path;
    public $route;
    public $layout = 'default';

    public function __construct($route) {
        $this->route = $route;
        $this->path = $this->route['controller'] . '/' . $this->route['action'];
    }

    public function render($title, $vars = []) {
        ob_start();
        $path = 'App/Views/' . $this->path . '.php';
        if (file_exists($path)) {
            require $path;
        }
        
        $content = ob_get_clean();
        $path = 'App/Views/Layouts/' . $this->layout . '.php';

        if (file_exists($path)) {
            require $path;
        }
    }
    
    public function redirect($url) {
        header('location: ' . $url);
        exit;
    }

    public static function errorCode($code) {
        http_response_code($code);
        $path = "App/Views/errors/" . $code . '.php';
        if (file_exists($path)) {
            require $path;
        }
        exit;
    }
}

?>