<?php
  class mainCRUD extends Model{

    public $error;

    function __construct() {
      parent::__construct();
    }

    function get ( $id = null) {
      $items = [];
      try {
        if ( isset($id) ) {
          $query = $this->db->connect()->prepare('SELECT * FROM trabajadores WHERE id_trabajador = :id');
          $query->execute(['id'=>$id]);
        } else {
          $query = $this->db->connect()->query('SELECT * FROM dolar');

        }

        while($row = $query->fetch()){
          $item = new DolarClass();

          $item->setPrecio_dolar($row['valor_actual']);
          $item->setFecha_actualizacion($row['fecha_actualizacion']);
         

          array_push($items, $item);
        }
        
        return $items;
      } catch (PDOException $e) {
        return [];
      }
    }
   

    function update ($data) {
      try {
        $query = $this->db->connect()->prepare('UPDATE dolar SET  
          valor_actual = :valor_actual, 
          fecha_actualizacion = :fecha_actualizacion 
          WHERE id_dolar = :id_dolar');

        $query->execute(['valor_actual'=>$data['valor_actual'], 'fecha_actualizacion'=>$data['fecha_actualizacion'], 'id_dolar'=>$data['id_dolar']]);

        if ( $query->rowCount() ) {
          return true;
        } else {
          return false;
        }
      } catch (PDOException $e) {
        echo "5";
        return false;
      }
    }

    function cantUsuario () {
      $cant = 0;
      try {
          $query = $this->db->connect()->query('SELECT * FROM usuarios WHERE status = 1');
        while($row = $query->fetch()){
          $cant = $cant + 1;
        }
        return $cant;
      }  
       catch (PDOException $e) {
        return false;
      }
    }
    function cantRoles () {
      $cant = 0;
      try {
          $query = $this->db->connect()->query('SELECT * FROM roles WHERE status = 1 OR status = 3');
        while($row = $query->fetch()){
          $cant = $cant + 1;
        }
        return $cant;
      }  
       catch (PDOException $e) {
        return false;
      }
    }
    function cantTrabajadores () {
      $cant = 0;
      try {
          $query = $this->db->connect()->query('SELECT * FROM trabajadores WHERE status = 1');
        while($row = $query->fetch()){
          $cant = $cant + 1;
        }
        return $cant;
      }  
       catch (PDOException $e) {
        return false;
      }
    }
    function cantCargo () {
      $cant = 0;
      try {
          $query = $this->db->connect()->query('SELECT * FROM cargo WHERE status = 1');
        while($row = $query->fetch()){
          $cant = $cant + 1;
        }
        return $cant;
      }  
       catch (PDOException $e) {
        return false;
      }
    }
    function cantNomina () {
      $cant = 0;
      try {
          $query = $this->db->connect()->query('SELECT * FROM nomina WHERE status = 1');
        while($row = $query->fetch()){
          $cant = $cant + 1;
        }
        return $cant;
      }  
       catch (PDOException $e) {
        return false;
      }
    }
    function cantReposo () {
      $fecha_actual = date("Y-m-d");
      $cant = 0;
      try {
          $query = $this->db->connect()->query('SELECT * FROM permiso WHERE status = 1 AND descripcion = "Reposo"');
        while($row = $query->fetch()){
          $desde=($row['desde']);
          $hasta=($row['hasta']);
          if($fecha_actual < $hasta)
          {
            if ($fecha_actual > $desde) {
              $cant = $cant + 1;
            }
          }
          
        }
        return $cant;
      }  
       catch (PDOException $e) {
        return false;
      }
    }
    function cantPermiso () {
      $fecha_actual = date("Y-m-d");
      $cant = 0;
      try {
          $query = $this->db->connect()->query('SELECT * FROM permiso WHERE status = 1 AND descripcion = "Permiso"');
        while($row = $query->fetch()){
          $desde=($row['desde']);
          $hasta=($row['hasta']);
          if($fecha_actual < $hasta)
          {
            if ($fecha_actual > $desde) {
              $cant = $cant + 1;
            }
          }
          
        }
        return $cant;
      }  
       catch (PDOException $e) {
        return false;
      }
    }


    public function getError () {
      return $this->error;
    }
  }

?>
