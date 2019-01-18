<?php

namespace App\Core;

use App\Core\Db;

abstract class Model {
    public $db;
    
    public function __construct() {
        $this->db = Db::getInstance();
    }

}

?>