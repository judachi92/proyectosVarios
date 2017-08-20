<?php namespace Controllers;
use Controllers\Seccion as SeccionCT;
use Models\Seccion as SeccionVO;
/**
 * Created by PhpStorm.
 * User: judachi
 * Date: 2/08/17
 * Time: 07:51 PM
 */

    class seccionesController{

        private $seccionVO;
        private $seccionCT;

        public function __construct()
        {
            $this->seccionVO = new SeccionVO();
            $this->seccionCT = new SeccionCT();
        }

        public function index()
        {
            $datos = $this->seccionCT->listarSecciones();
            return $datos;
        }

        public function agregar(){
            $datos = Array();
            $mensaje="";

            if(count($_POST) > 0){

                if(!$this->seccionCT->existeSeccion($_POST['session_nombre'])){
                    $this->seccionVO->setSeccionNombre($_POST['session_nombre']);
                    $this->seccionCT->setSeccion($this->seccionVO);

                    $grabo = $this->seccionCT->AgregarSeccion();
                    if ($grabo){
                        $codigo_respuesta = 1;
                        $mensaje = "Se Grabo Correctamente La session ". $_POST['session_nombre'];
                    }else{
                        $codigo_respuesta = 2;
                        $mensaje = "No Grabo La session ". $_POST['session_nombre'];
                    }
                }else{
                    $codigo_respuesta = 3;
                    $mensaje = "La session ". $_POST['session_nombre'] . " Ya existe en el sistema";
                }

                $datos = array("codigo_respuesta"=>$codigo_respuesta,
                    "mensaje_respuesta"=>$mensaje);

            }else{

            }


            return $datos;
        }


        public function editar($seccion_codigo){
            $this->seccionVO = $this->seccionCT->ConsultarSeccion($seccion_codigo);
            $datos_respuesta = null;

            if(count($_POST) > 0){

                $this->seccionVO->setSeccionNombre($_POST['seccion_nombre']);
                $this->seccionCT->setSeccion($this->seccionVO);
                if($this->seccionCT->EditarSeccion()){
                    $codigo_respuesta = 1;
                    $mensaje = "Se Modifico Correctamente La Seccion ".$this->seccionVO->getSeccionNombre();
                }else{
                    $codigo_respuesta = 2;
                    $mensaje = "No se pudo Modificar La Seccion ". $this->seccionVO->getSeccionNombre();
                }
                $datos_respuesta = array("codigo_respuesta"=>$codigo_respuesta, "mensaje_respuesta"=>$mensaje);

            }

            $datos= array();
            $datos["datos_seccion"] = $this->seccionVO;
            $datos["datos_respuesta"] = $datos_respuesta;

            return $datos;
        }

        public function eliminar($seccion_codigo){
            $this->seccionVO = $this->seccionCT->ConsultarSeccion($seccion_codigo);
            $this->seccionCT->setSeccion($this->seccionVO);
            if($this->seccionCT->EliminarSeccion()){
                header("Location: ".URL."secciones");
            }else{
                echo "<script>alert('La Seccion ".$this->seccionVO->getSeccionNombre()." no se Puede Eliminar porque existen Estudiantes asociados!');</script>";
            }
        }
    }
?>