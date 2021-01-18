<?php


class Database
{
    private static $pdo;

    private static $instance = null;

    private function __construct()
    {
        try { //исключение
            $pdo = new PDO('mysql:host=localhost;dbname=pdo', 'root', 'root'); // объект подключения
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);



        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }

    }

    public static function getInstance()
    {
        if(is_null(self::$instance)){
            self::$instance = new self;
        }
        return self::$instance;
    }

    public static function select()
    {
        return self::$pdo->prepare("SELECT * FROM `books`");
    }

    private function __clone(){}
    private function __wakeup(){}
}