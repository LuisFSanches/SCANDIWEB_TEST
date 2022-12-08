<?php

namespace App\Core;

class Database {

    private static $conexao;

    public static function getConn(){
        if(!isset(self::$conexao)){
            self::$conexao = new \PDO('mysql: host='.$_ENV['HOST'].'; dbname='.$_ENV['DB_NAME'], $_ENV['USER'], $_ENV['PASSWORD']);
        }

        return self::$conexao;
    }

}