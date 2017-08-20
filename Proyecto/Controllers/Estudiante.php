<?php namespace Controllers;

    use Models\Conexion;
    use Models\Estudiante as EstudianteVO;

    class Estudiante{

        private $con;
        private $estudiante;

        /**
         * Estudiantes constructor.
         * @param $estudiante
         */
        public function __construct($estudiante='')
        {
            $this->con = new Conexion();
            if(is_object($estudiante)){
                $this->estudiante = $estudiante;
            }else{
                $this->estudiante = null;
            }

        }

        /**
         * @return null
         */
        public function getEstudiante()
        {
            return $this->estudiante;
        }

        /**
         * @param \Models\Estudiante $estudiante
         */
        public function setEstudiante($estudiante)
        {
            $this->estudiante = $estudiante;
        }



        public function listarEstudiantes(){
            $sql = "SELECT es.* , se.seccion_nombre 
                     FROM tb_estudiante es 
                     JOIN tb_seccion se ON se.seccion_codigo = es.seccion_codigo 
                     ORDER BY estudiante_codigo ASC";
            $datos = $this->con->consultaRetorno($sql);
            return $datos;
        }

        public function AgregarEstudiante(){
            if(is_object($this->estudiante)) {
                $sql = "INSERT INTO tb_estudiante(
                    estudiante_codigo, estudiante_nombrecompleto, estudiante_documento, 
                    estudiante_edad, estudiante_fechanacimiento, estudiante_promedio, 
                    estudiante_imagenurl, seccion_codigo, estudiante_fechacreacion, 
                    estudiante_fechamodificacion)
                VALUES (DEFAULT , '" . strtoupper($this->estudiante->getEstudianteNombrecompleto()) . "', '" . $this->estudiante->getEstudianteDocumento() . "', 
                    " . $this->estudiante->getEstudianteEdad() . ", '" . $this->estudiante->getEstudianteFechanacimiento() . "', " . $this->estudiante->getEstudiantePromedio() . ", 
                    '" . $this->estudiante->getEstudianteImagenurl() . "', " . $this->estudiante->getSeccionCodigo() . ", current_date, 
                    current_date)";
                $this->con->consultaSimple($sql);

                return true;
            }else{
                return false;
            }
        }

        public function EliminarEstudiante(){
            if(is_object($this->estudiante)) {
                $sql = "DELETE FROM tb_estudiante WHERE estudiante_codigo= " . $this->estudiante->getEstudianteCodigo();
                $this->con->consultaSimple($sql);
                return true;
            }else{
                return false;
            }
        }


        public function EditarEstudiante(){
            if(is_object($this->estudiante)) {
                $sql = "UPDATE tb_estudiante
                SET estudiante_nombrecompleto='" . $this->estudiante->getEstudianteNombrecompleto() . "', estudiante_documento='" . $this->estudiante->getEstudianteDocumento() . "', 
                   estudiante_edad=" . $this->estudiante->getEstudianteEdad() . ", estudiante_fechanacimiento='" . $this->estudiante->getEstudianteFechanacimiento() . "', 
                   estudiante_promedio=" . $this->estudiante->getEstudiantePromedio() . ", estudiante_imagenurl='" . $this->estudiante->getEstudianteImagenurl() . "', 
                   seccion_codigo=" . $this->estudiante->getSeccionCodigo() . ", estudiante_fechamodificacion=current_date
                WHERE estudiante_codigo= " . $this->estudiante->getEstudianteCodigo();

                $this->con->consultaSimple($sql);
                return true;
            }else{
                return false;
            }
        }

        public function ConsultarEstudiante($estudiante_codigo='',$estudiante_documento=''){

            $where="";
            if(strlen(trim($estudiante_codigo)) > 0){
                $where .= " and estudiante_codigo=".$estudiante_codigo;
            }
            if(strlen(trim($estudiante_documento)) > 0){
                $where .= " and estudiante_documento = '".$estudiante_documento."'";
            }
            if(strlen(trim($where)) > 0){
                $sql = "SELECT estudiante_codigo, estudiante_nombrecompleto, estudiante_documento, 
                               estudiante_edad, estudiante_fechanacimiento, estudiante_promedio, estudiante_imagenurl, 
                               seccion_codigo, estudiante_fechacreacion, estudiante_fechamodificacion 
                        FROM tb_estudiante WHERE TRUE ".$where;
                $datos = $this->con->consultaRetorno($sql);
                while ($row = pg_fetch_array($datos)) {
                    $estudiante = new EstudianteVO();
                    $estudiante->setEstudianteCodigo($row["estudiante_codigo"]);
                    $estudiante->setEstudianteNombrecompleto($row["estudiante_nombrecompleto"]);
                    $estudiante->setEstudianteDocumento($row["estudiante_documento"]);
                    $estudiante->setEstudianteEdad($row["estudiante_edad"]);
                    $estudiante->setEstudianteFechanacimiento($row["estudiante_fechanacimiento"]);
                    $estudiante->setEstudiantePromedio($row["estudiante_promedio"]);
                    $estudiante->setEstudianteImagenurl($row["estudiante_imagenurl"]);
                    $estudiante->setSeccionCodigo($row["seccion_codigo"]);
                    $estudiante->setEstudianteFechacreacion($row["estudiante_fechacreacion"]);
                    $estudiante->setEstudianteFechamodificacion($row["estudiante_fechamodificacion"]);
                    return $estudiante;
                }
            }else{
                return "SE PARA LA CONSULTA SE REQUIERE DEL CODIGO O NOMBRE O DOCUMENTO DEL ESTUDIANTE";
            }

        }

        public function existeEstudiante($estudiante_documento){
            $sql = "SELECT count(*) as conteo 
                    FROM tb_estudiante WHERE estudiante_documento='".$estudiante_documento."'";

            $datos = $this->con->consultaRetorno($sql);
            $conteo=0;
            while ($row = pg_fetch_array($datos)) {
                $conteo = $row['conteo'];
            }

            if($conteo > 0){
                return true;
            }else{
                return false;
            }
        }


    }

?>