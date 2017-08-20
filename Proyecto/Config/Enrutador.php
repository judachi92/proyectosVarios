<?php namespace Config;

    class Enrutador{

        public static function run(Request $request){
            $controlador = $request->getControlador()."Controller";
            $ruta = ROOT."Controllers".DS.$controlador.".php";
            $metodo = $request->getMetodo();
            $argumento = $request->getArgumento();

            if(is_readable($ruta)){
                require_once $ruta;
                $lib = "Controllers\\".$controlador;
                $controlador = new $lib;

                if(!isset($argumento)){
                    $datos = call_user_func(array($controlador,$metodo));
                }else{
                    $datos =call_user_func_array(array($controlador,$metodo),$argumento);
                }
            }

            //Cargar Vista
            $view = ROOT . "Views". DS . $request->getControlador().DS.$request->getMetodo().".php";
            if(is_readable($view)){
                require_once $view;
            }else{
                echo "<h1>NO SE ENCONTRO LA RUTA</h1>";
            }
        }

    }

?>