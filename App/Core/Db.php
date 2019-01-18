<?php

namespace App\Core;

use PDO;
use PDO\Exceptions;

class Db {
    private static $instance;

    private static $HOST = '127.0.0.1';
    private static $NAME = 'test_site';
    private static $USER = 'root';
    private static $PASS = '';
    private static $CHAR = 'utf8';

    private function __construct () {
        $dsn = "mysql" . 
            ":host=" . self::$HOST .
            ";dbname=" . self::$NAME .
            ";charset=" . self::$CHAR;
            
        $opt  = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => TRUE,
        );
        
        $this->instance = new PDO( $dsn,self::$USER, self::$PASS, $opt );
    }

    private function __clone() {}
    private function __wakeup() {}
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function query($sql, $params=[]) {
        $stmt = $this->instance->prepare($sql);
        
        if ( !empty($params) ) {
            foreach ($params as $key => $val) {
                $stmt->bindValue(':'.$key,$val);
            }
        }

        $stmt->execute();
        
        return $stmt;
    }

    public function row($sql, $params=[]) {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql, $params=[]) {
        $result = $this->query($sql, $params);
        return $result->fetchCOlumn();
    }

};

?>