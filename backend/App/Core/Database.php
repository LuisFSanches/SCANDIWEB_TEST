<?php

namespace App\Core;

class Database {

    private static $connection;

    public static function getConn(){
        if(!isset(self::$connection)){
            self::$connection = new \PDO('mysql:host='.$_ENV['HOST'].'; dbname='.$_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['PASSWORD']);
        }

        return self::$connection;
    }

}