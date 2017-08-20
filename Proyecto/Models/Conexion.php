<?php namespace Models;

    class Conexion
    {
        private $datos = array(
            "host"=>"localhost",
            "user"=>"postgres",
            "pass"=>"admin123",
            "db" => "bd_proyecto_poo"
        );
        private $con;

        public function __construct()
        {
            $string_conn = "host=".$this->datos['host']." port=5432 dbname=".$this->datos['db']." user=".$this->datos['user']." password=".$this->datos['pass']."";
            $this->con  = pg_connect($string_conn);
        }

        public function consultaSimple($sql)
        {
            pg_query($this->con,$sql);
        }
        public function consultaRetorno($sql)
        {
            $rs = pg_query($this->con,$sql);
            return $rs;
        }
    }

?>