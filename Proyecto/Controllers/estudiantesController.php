<?php namespace Controllers;
use Models\Estudiante as EstudianteVO;
use Controllers\Estudiante as EstudianteCT;
use Controllers\Seccion as SeccionCT;
/**
 * Created by PhpStorm.
 * User: judachi
 * Date: 2/08/17
 * Time: 07:51 PM
 */

    class estudiantesController{

        private $estudianteVO;
        private $estudianteCT;
        private $seccionCT;

        public function __construct()
        {
            $this->estudianteVO = new EstudianteVO();
            $this->estudianteCT = new EstudianteCT();

            $this->seccionCT = new SeccionCT();
        }

        public function index()
        {
            $datos = $this->estudianteCT->listarEstudiantes();
            return $datos;
        }

        public function agregar()
        {
            $datos_secciones = $this->seccionCT->listarSecciones();
            $datos_respuesta = array();
            if(count($_POST) > 0){

                if(!($this->estudianteCT->existeEstudiante($_POST['estudiante_documento'])) ) {

                    $flag_image = false;
                    $this->estudianteVO->setEstudianteNombrecompleto($_POST['estudiante_nombrecompleto']);
                    $this->estudianteVO->setEstudianteDocumento($_POST['estudiante_documento']);
                    $this->estudianteVO->setEstudianteEdad($_POST['estudiante_edad']);
                    $this->estudianteVO->setEstudianteFechanacimiento($_POST['estudiante_fechanacimiento']);
                    $this->estudianteVO->setEstudiantePromedio($_POST['estudiante_promedio']);
                    $this->estudianteVO->setSeccionCodigo($_POST['seccion_codigo']);
                    
                    $permitidos = array("image/jpeg", "image/png", "image/gif", "image/jpg");
                    $limite = 1000;
                    if (in_array($_FILES['estudiante_imagen']['type'], $permitidos) && $_FILES['estudiante_imagen']['size'] <= ($limite * 1024)) {
                        $datos_imagen = explode(".", $_FILES['estudiante_imagen']['name']);
                        $nombre = $_POST['estudiante_documento'] . "." . $datos_imagen[1];
                        $ruta_imagen = "/var/www/html/CodigoFacilito/CursoPOO/Proyecto/Views/template/imagenes/estudiantes/" . $nombre;
                        $flag_image =true;

                        //continuar Grabando el Estudiante!!
                        $this->estudianteVO->setEstudianteImagenurl($nombre);

                    }

                    $this->estudianteCT->setEstudiante($this->estudianteVO);

                    if($this->estudianteCT->AgregarEstudiante()){
                        if($flag_image) {
                            move_uploaded_file($_FILES["estudiante_imagen"]["tmp_name"], $ruta_imagen);
                        }
                        $codigo_respuesta = 1;
                        $mensaje = "Se Grabo Correctamente El Estudiante ".$this->estudianteVO->getEstudianteNombrecompleto();
                    }else{
                        $codigo_respuesta = 2;
                        $mensaje = "No Grabo El Estudiante ". $this->estudianteVO->getEstudianteNombrecompleto();
                    }
                }else{
                    $codigo_respuesta = 3;
                    $mensaje = "Ya existe un estudiante registrado con el documento ". $_POST['estudiante_documento'];
                }

                $datos_respuesta = array("codigo_respuesta"=>$codigo_respuesta, "mensaje_respuesta"=>$mensaje);
            }

            $datos= array();
            $datos["datos_secciones"] = $datos_secciones;
            $datos["datos_respuesta"] = $datos_respuesta;

            return $datos;
        }

        public function editar($estudiante_codigo){
            $datos_secciones = $this->seccionCT->listarSecciones();
            $datos_respuesta = null;
            $this->estudianteVO = $this->estudianteCT->ConsultarEstudiante($estudiante_codigo);
            
            if(count($_POST) > 0){
                $this->estudianteVO->setEstudianteNombrecompleto($_POST['estudiante_nombrecompleto']);
                $this->estudianteVO->setEstudianteEdad($_POST['estudiante_edad']);
                $this->estudianteVO->setEstudianteFechanacimiento($_POST['estudiante_fechanacimiento']);
                $this->estudianteVO->setEstudiantePromedio($_POST['estudiante_promedio']);
                $this->estudianteVO->setSeccionCodigo($_POST['seccion_codigo']);

                $permitidos = array("image/jpeg", "image/png", "image/gif", "image/jpg");
                $limite = 1000;
                $flag_image=false;
                if (in_array($_FILES['estudiante_imagen']['type'], $permitidos) && $_FILES['estudiante_imagen']['size'] <= ($limite * 1024)) {
                    $datos_imagen = explode(".", $_FILES['estudiante_imagen']['name']);
                    $nombre = $this->estudianteVO->getEstudianteDocumento() . "." . $datos_imagen[1];
                    $ruta_imagen = "/var/www/html/CodigoFacilito/CursoPOO/Proyecto/Views/template/imagenes/estudiantes/" . $nombre;
                    $flag_image =true;

                    $this->estudianteVO->setEstudianteImagenurl($nombre);

                }

                $this->estudianteCT->setEstudiante($this->estudianteVO);
                if($this->estudianteCT->EditarEstudiante()){
                    if($flag_image) {
                        move_uploaded_file($_FILES["estudiante_imagen"]["tmp_name"], $ruta_imagen);
                    }
                    $codigo_respuesta = 1;
                    $mensaje = "Se Modifico Correctamente El Estudiante ".$this->estudianteVO->getEstudianteNombrecompleto();
                }else{
                    $codigo_respuesta = 2;
                    $mensaje = "No se pudo Modificar El Estudiante ". $this->estudianteVO->getEstudianteNombrecompleto();
                }
                $datos_respuesta = array("codigo_respuesta"=>$codigo_respuesta, "mensaje_respuesta"=>$mensaje);
            }
            
            $datos= array();
            $datos["datos_secciones"] = $datos_secciones;
            $datos["datos_respuesta"] = $datos_respuesta;
            $datos["datos_estudiante"] = $this->estudianteVO;

            return $datos;
        }


        public function eliminar($estudiante_codigo){
            $this->estudianteVO = $this->estudianteCT->ConsultarEstudiante($estudiante_codigo);
            $this->estudianteCT->setEstudiante($this->estudianteVO);
            $this->estudianteCT->EliminarEstudiante();
            header("Location: ".URL."estudiantes");
        }
    }
    

?>