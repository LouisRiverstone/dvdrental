<?php
class DB{

    private static $instance;

    public static function getInstance(){

        if (!isset (self::$instance)){

            try{
                self::$instance = new PDO('sqlite:dvdrental.db');
                self::$instance->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            }

            catch (PDOException $erro){
                echo $erro->getMessage();
            }

        }

        return self::$instance;

    }

    public static function prepare($sql){
        return self::getInstance()->prepare($sql);
    }

}
