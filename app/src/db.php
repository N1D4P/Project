<?php

class Db{
    protected static $pdo;

    public static function getPdo(){
        if(self::$pdo===null){
            try{
                self::$pdo = new PDO("mysql:host=localhost;dbname=matthieu","root","");
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e){
                echo "Erreur de connexion : " . $e->getMessage();
            }
        }
        return self::$pdo;
    }

    protected static function disconnect(){
        self::$pdo=null;
    }
}

?>