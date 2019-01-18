<?php

use App\Core\Router;

function debug($arg) {
    ?>
        <div style="background: white;"><pre>
            <?php
                echo var_dump($arg);
            ?>
        </pre></div>
    <?php
}

spl_autoload_register(function($class) {
    $class = str_replace('\\', '/', $class . '.php');
    if (file_exists($class)) {
        require $class;
    }
});

$router = new Router();
$router->run();

?>