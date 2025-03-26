<?php

abstract class Model{
    private static $pdo;

    private static function setBDD(){
        self::$pdo = new PDO(
            "mysql:host=localhost;dbname=Projet;charset=utf8",
            "root",
            "root"
        );
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDo::ERRMODE_WARNING);
    }

    // La fonction qui appel la fonction intermédiaire pour établir une connexion à la BD
    protected function getBdd()
    {
        if (self::$pdo === null) {
            self::setBdd();
        }
        return self::$pdo; //instance de connection pdo
    }

}