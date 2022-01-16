<?php
    class BD{
         private static $instance = null;
         
         public static function createInstance(){

            if(!isset(self::$instance)){
                $optionsPDO[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

                self::$instance = new PDO('mysql:host=localhost;dbname=prueba_tecnica_dev','root','',$optionsPDO);
                self::$instance->exec("set names utf8");
                // echo "conexión correcta...";
            }

            return self::$instance;
         }
    }
?>