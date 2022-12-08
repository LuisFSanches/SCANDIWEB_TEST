<?php

namespace App\Core;

class Database {

    private static $conexao;

    public static function getConn(){
        var_dump($_ENV['HOST']);
        var_dump($_ENV['DB_NAME']);
        var_dump($_ENV['DB_USER']);
        if(!isset(self::$conexao)){
            self::$conexao = new \PDO('mysql:host='.$_ENV['HOST'].'; dbname='.$_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['PASSWORD']);
        }

        return self::$conexao;
    }

}