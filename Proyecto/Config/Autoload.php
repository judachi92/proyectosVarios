<?php namespace Config;

    class Autoload
    {
        /*public static function run()
        {
            spl_autoload_register(function($class){
                $ruta = str_replace("\\","/",$class).".php";
                if(is_callable($ruta)){
                    include_once $ruta;
                }
            });
        }*/

        public static function run()
        {
            spl_autoload_register(function($clase){
                $ruta = str_replace("\\","/",$clase).".php";
                if(is_readable($ruta)){
                    include_once $ruta;
                }else{
                    echo "El archivo ".$ruta." No Existe!";
                }
            });
        }
    }

?>