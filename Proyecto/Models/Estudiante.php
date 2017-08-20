<?php namespace Models;

    class Estudiante
    {
        private $estudiante_codigo;
        private $estudiante_nombrecompleto;
        private $estudiante_documento;
        private $estudiante_edad;
        private $estudiante_fechanacimiento;
        private $estudiante_promedio;
        private $estudiante_imagenurl;
        private $seccion_codigo;
        private $estudiante_fechacreacion;
        private $estudiante_fechamodificacion;

        /**
         * Estudiante constructor.
         */
        public function __construct()
        {
        }
        
        


        /**
         * @return mixed
         */
        public function getEstudianteCodigo()
        {
            return $this->estudiante_codigo;
        }

        /**
         * @param mixed $estudiante_codigo
         */
        public function setEstudianteCodigo($estudiante_codigo)
        {
            $this->estudiante_codigo = $estudiante_codigo;
        }

        /**
         * @return mixed
         */
        public function getEstudianteNombrecompleto()
        {
            return $this->estudiante_nombrecompleto;
        }

        /**
         * @param mixed $estudiante_nombrecompleto
         */
        public function setEstudianteNombrecompleto($estudiante_nombrecompleto)
        {
            $this->estudiante_nombrecompleto = $estudiante_nombrecompleto;
        }

        /**
         * @return mixed
         */
        public function getEstudianteDocumento()
        {
            return $this->estudiante_documento;
        }

        /**
         * @param mixed $estudiante_documento
         */
        public function setEstudianteDocumento($estudiante_documento)
        {
            $this->estudiante_documento = $estudiante_documento;
        }

        /**
         * @return mixed
         */
        public function getEstudianteEdad()
        {
            return $this->estudiante_edad;
        }

        /**
         * @param mixed $estudiante_edad
         */
        public function setEstudianteEdad($estudiante_edad)
        {
            $this->estudiante_edad = $estudiante_edad;
        }

        /**
         * @return mixed
         */
        public function getEstudianteFechanacimiento()
        {
            return $this->estudiante_fechanacimiento;
        }

        /**
         * @param mixed $estudiante_fechanacimiento
         */
        public function setEstudianteFechanacimiento($estudiante_fechanacimiento)
        {
            $this->estudiante_fechanacimiento = $estudiante_fechanacimiento;
        }

        /**
         * @return mixed
         */
        public function getEstudiantePromedio()
        {
            return $this->estudiante_promedio;
        }

        /**
         * @param mixed $estudiante_promedio
         */
        public function setEstudiantePromedio($estudiante_promedio)
        {
            $this->estudiante_promedio = $estudiante_promedio;
        }

        /**
         * @return mixed
         */
        public function getEstudianteImagenurl()
        {
            return $this->estudiante_imagenurl;
        }

        /**
         * @param mixed $estudiante_imagenurl
         */
        public function setEstudianteImagenurl($estudiante_imagenurl)
        {
            $this->estudiante_imagenurl = $estudiante_imagenurl;
        }

        /**
         * @return mixed
         */
        public function getSeccionCodigo()
        {
            return $this->seccion_codigo;
        }

        /**
         * @param mixed $seccion_codigo
         */
        public function setSeccionCodigo($seccion_codigo)
        {
            $this->seccion_codigo = $seccion_codigo;
        }

        /**
         * @return mixed
         */
        public function getEstudianteFechacreacion()
        {
            return $this->estudiante_fechacreacion;
        }

        /**
         * @param mixed $estudiante_fechacreacion
         */
        public function setEstudianteFechacreacion($estudiante_fechacreacion)
        {
            $this->estudiante_fechacreacion = $estudiante_fechacreacion;
        }

        /**
         * @return mixed
         */
        public function getEstudianteFechamodificacion()
        {
            return $this->estudiante_fechamodificacion;
        }

        /**
         * @param mixed $estudiante_fechamodificacion
         */
        public function setEstudianteFechamodificacion($estudiante_fechamodificacion)
        {
            $this->estudiante_fechamodificacion = $estudiante_fechamodificacion;
        }
        
        

    }

?>