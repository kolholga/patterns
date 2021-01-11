<?php

class Singleton
{
    public $data;
    /**
     * $instance - свойство, предназначенное для хранения данного класса
     * @var null
     */
    private static $instance = null;

    /**
     * конструктор private, чтобы его нельзя было вызвать извне
     * Singleton constructor.
     */
    private function __construct()
    {
        $this->data = rand(1000, 9999);
    }

    /**
     * метод создает экземпляр (объект) класса и сохраняет его в $instance
     * @return Singleton|null
     */
    public static function getInstance()
    {
        if(is_null(self::$instance)){
            self::$instance = new self;
        }
        return self::$instance;
    }

    private function __clone(){}
    private function __wakeup(){}

}