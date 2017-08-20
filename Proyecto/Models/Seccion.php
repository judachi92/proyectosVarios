<?php namespace Models;

class Seccion
{
    private $seccion_codigo;
    private $seccion_nombre;
    private $seccion_fechacreacion;
    private $seccion_fechamodificacion;

    /**
     * Seccion constructor.
     */
    public function __construct()
    {
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
    public function getSeccionNombre()
    {
        return $this->seccion_nombre;
    }

    /**
     * @param mixed $seccion_nombre
     */
    public function setSeccionNombre($seccion_nombre)
    {
        $this->seccion_nombre = $seccion_nombre;
    }

    /**
     * @return mixed
     */
    public function getSeccionFechacreacion()
    {
        return $this->seccion_fechacreacion;
    }

    /**
     * @param mixed $seccion_fechacreacion
     */
    public function setSeccionFechacreacion($seccion_fechacreacion)
    {
        $this->seccion_fechacreacion = $seccion_fechacreacion;
    }

    /**
     * @return mixed
     */
    public function getSeccionFechamodificacion()
    {
        return $this->seccion_fechamodificacion;
    }

    /**
     * @param mixed $seccion_fechamodificacion
     */
    public function setSeccionFechamodificacion($seccion_fechamodificacion)
    {
        $this->seccion_fechamodificacion = $seccion_fechamodificacion;
    }

    public function toString(){
        $string = "{seccion_codigo:".$this->getSeccionCodigo().", seccion_nombre: '".$this->getSeccionNombre()."',
                    seccion_fechacreacion: '".$this->getSeccionFechacreacion()."', seccion_fechamodificacion: '".$this->getSeccionFechamodificacion()."'}";

        return $string;
    }
}

?>