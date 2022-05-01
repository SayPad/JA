<?php 
class DolarClass  {
      private $precio_dolar;
      private $fecha_actualizacion;


      public function getPrecio_dolar() {

        return $this->precio_dolar;
      }
      public function getFecha_actualizacion() {
        return $this->fecha_actualizacion;
      }


      //SETTERS
     
      public function setPrecio_dolar($precio_dolar) {
        $this->precio_dolar = $precio_dolar;
      }
      public function setFecha_actualizacion($fecha_actualizacion) {
        $this->fecha_actualizacion = $fecha_actualizacion;
      }

  }

?>