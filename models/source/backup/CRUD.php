<?php
  class backupCRUD extends Model{

    public $error;
 
    function __construct() {
      parent::__construct();
    }

  
     function getTrabajadores ( $id = null) {
      $items = [];
      try {

  
          $query = $this->db->connect()->query('SELECT * FROM trabajadores INNER JOIN cargo ON trabajadores.id_cargo = cargo.id_cargo WHERE trabajadores.status = 1');

        while($row = $query->fetch()){
          $item = new TrabajadoresClass();

          $item->setId($row['id_trabajador']);
          $item->setNombre($row['nombre']);
          $item->setApellido($row['apellido']);
          $item->setCedula($row['cedula']);
          $item->setCargo($row['nombre_cargo']);
          $item->setFecha_ingreso($row['fecha_ingreso']);
          $item->setSueldo_semanal($row['sueldo_semanal']);
          $item->setBono_compensacion($row['bono_compensacion']);
          $item->setBono_cestaticket($row['bono_cestaticket']);
          $item->setPrima_por_hogar($row['prima_por_hogar']);
          $item->setStatus($row['status']);
          array_push($items, $item);
        }
        
        return $items;
      } catch (PDOException $e) {
        return [];
      }
    }
    
    }
    
?>
