<?php

namespace App;

class Conexao{
    static $conexao;
    public static function criaConexao(){
    
        $dsn = 'mysql:host=localhost;port=3306;dbname=app-msg-nvoip';
        $user = 'root';
        $pass = '123456';
        try {
            self::$conexao = new \PDO($dsn,$user,$pass);
        } catch (\PDOException $exception) {
            die('Ocorreu ume rro: '.$exception->getMessage());
        }
        
    }

    public static function getConexao(): \PDO{
        if(!self::$conexao){
            self::criaConexao();
        }
        return self::$conexao;
    }

}