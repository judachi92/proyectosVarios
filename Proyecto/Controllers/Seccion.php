<?php namespace Controllers;
    
    use Models\Conexion;
    use Models\Seccion as SeccionVO;

    class Seccion{

        private $con;
        private $seccion;

        /**
         * Estudiantes constructor.
         * @param $seccion
         */
        public function __construct($seccion='')
        {
            $this->con = new Conexion();
            if(is_object($seccion)){
                $this->seccion = $seccion;
            }else{
                $this->seccion = null;
            }

        }

        /**
         * @return null
         */
        public function getSeccion()
        {
            return $this->seccion;
        }

        /**
         * @param null $seccion
         */
        public function setSeccion($seccion)
        {
            $this->seccion = $seccion;
        }
        
        
        
        public function listarSecciones()
        {
            $sql = "SELECT * from tb_seccion ORDER BY seccion_codigo ASC";
            $datos = $this->con->consultaRetorno($sql);
            $arr = array();
            while ($row = pg_fetch_array($datos)) {
                $seccion = new SeccionVO();
                $seccion->setSeccionCodigo($row['seccion_codigo']);
                $seccion->setSeccionNombre($row['seccion_nombre']);
                $seccion->setSeccionFechacreacion($row['seccion_fechacreacion']);
                $seccion->setSeccionFechamodificacion($row['seccion_fechamodificacion']);
                $arr[] = $seccion;
            }
            return $arr;
        }

        public function AgregarSeccion()
        {
            if(is_object($this->seccion)) {
                $sql = "INSERT INTO tb_seccion(
                                seccion_codigo, seccion_nombre, seccion_fechacreacion, seccion_fechamodificacion)
                        VALUES (DEFAULT ,'".strtoupper($this->seccion->getSeccionNombre())."' , CURRENT_DATE , CURRENT_DATE )";
                $this->con->consultaSimple($sql);
                return true;
            }else{
                return false;
            }
        }

        public function EliminarSeccion()
        {
            if(is_object($this->seccion)) {
                $sql = "DELETE FROM tb_seccion WHERE seccion_codigo=".$this->seccion->getSeccionCodigo();
                $this->con->consultaSimple($sql);
                return true;
            }else{
                return false;
            }
        }


        public function EditarSeccion()
        {
            if(is_object($this->seccion)) {
                $sql = "UPDATE tb_seccion
                       SET seccion_nombre='".$this->seccion->getSeccionNombre()."' , 
                            seccion_fechamodificacion=CURRENT_DATE 
                     WHERE seccion_codigo = ".$this->seccion->getSeccionCodigo();
                $this->con->consultaSimple($sql);
                return true;
            }else{
                return false;
            }
        }

        public function ConsultarSeccion($seccion_codigo)
        {
            $where = " and seccion_codigo=".$seccion_codigo;

            $sql = "SELECT seccion_codigo, seccion_nombre, seccion_fechacreacion, seccion_fechamodificacion
                    FROM tb_seccion WHERE TRUE ".$where;
            $datos = $this->con->consultaRetorno($sql);
            while ($row = pg_fetch_array($datos)) {
                $this->seccion = new SeccionVO();
                $this->seccion->setSeccionCodigo($row['seccion_codigo']);
                $this->seccion->setSeccionNombre($row['seccion_nombre']);
                $this->seccion->setSeccionFechacreacion($row['seccion_fechacreacion']);
                $this->seccion->setSeccionFechamodificacion($row['seccion_fechamodificacion']);

            }

            return $this->seccion;

        }

        public function existeSeccion($seccion_nombre){
            $sql = "SELECT count(*) as conteo 
                    FROM tb_seccion WHERE seccion_nombre='".strtoupper($seccion_nombre)."'";

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