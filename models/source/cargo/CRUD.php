<?php

  class cargoCRUD extends Model{

    public $error;
 
    function __construct() {
      parent::__construct();
    }

   
    public  function insert ($data) {

      try{
        $contador = 0;
        $query = $this->db->connect()->prepare('SELECT * FROM cargo WHERE nombre_cargo = :nombre AND status = 1');
        $query->execute(['nombre'=>$data['nombre']]);
        while($row = $query->fetch()){
          $contador = $contador + 1;
        }
        if ($contador == 0) {
          $query = $this->db->connect()->query('SELECT * FROM cargo');

        $query = $this->db->connect()->prepare('INSERT INTO cargo (nombre_cargo, sueldo_semanal, prima_por_hogar, status) VALUES(:nombre_cargo, :sueldo_semanal, :prima_por_hogar, :status)');

        $query->execute([
          'nombre_cargo'=>$data['nombre'], 
          'sueldo_semanal'=>$data['sueldo'],  
          'prima_por_hogar'=>$data['prima'], 
          'status'=>'1']);
        echo 1;
        return true;
         } else{
          echo 0;
        }
        
        return true;
      } catch(PDOException $e){
        echo 2;
        return false;
      }
    }

    public function existe($nombre){
        $contador = 0;
        $query = $this->db->connect()->prepare('SELECT * FROM cargo WHERE nombre_cargo = :nombre AND status = 1');
        $query->execute(['nombre'=>$nombre]);
        while($row = $query->fetch()){
          $contador = $contador + 1;
        }
        if ($contador == 0) {
          echo 1;
        }
        else{
          echo 0;
        }
        return true;
      
      
    }

      function verificar($modulo, $operacion, $usuario){
    $permiso = ''; 
      try {
      $query = $this->db->connect()->prepare('SELECT * FROM usuarios INNER JOIN roles ON usuarios.id_rol = roles.id_rol INNER JOIN rol_operacion ON roles.id_rol = rol_operacion.id_rol INNER JOIN operaciones ON rol_operacion.id_operacion = operaciones.id_operacion INNER JOIN modulos ON operaciones.id_modulo = modulos.id_modulo WHERE usuario = :usuario AND nombre_operacion = :operacion AND nombre_modulo = :modulo');
      $query->execute(['usuario'=>$usuario,'operacion'=>$operacion, 'modulo'=>$modulo]);

       while($row = $query->fetch()){
          $permiso = "si";
        }
        if ($permiso == "si") {
          return true;
        }
      } catch (Exception $e) {
        return false;
      }
      
    }
 

    function get ( $id = null) {
      $items = [];
      try {

        if ( isset($id) ) {

          $query = $this->db->connect()->prepare('SELECT * FROM cargo WHERE id_cargo = :id AND status = 1');

          $query->execute(['id'=>$id]);

        } else {

          $query = $this->db->connect()->query('SELECT * FROM cargo WHERE status = 1');

        }
        while($row = $query->fetch()){
          $item = new CargoClass();

          $item->setId($row['id_cargo']);
          $item->setNombre_cargo($row['nombre_cargo']);
          $item->setSueldo($row['sueldo_semanal']);
          $item->setPrima($row['prima_por_hogar']);
          $item->setStatus($row['status']);
          array_push($items, $item);
        }
        
        return $items;
      } catch (PDOException $e) {
        return [];
      }
    }
    
    function drop ($id) {

       try {
        $query = $this->db->connect()->prepare('UPDATE cargo SET status = 0 WHERE id_cargo = :id_cargo');
        $query->execute(['id_cargo'=>$id]);
        
        if ( $query->rowCount() ) {
          return true;
        } else {
          return false;
        }
      } catch (PDOException $e) {
        return false;
      }

    }
      
    function update ($data) {
      try {
        $query = $this->db->connect()->prepare('UPDATE cargo SET  sueldo_semanal = :sueldo_semanal, prima_por_hogar = :prima_por_hogar WHERE nombre_cargo = :nombre_cargo AND status = 1');
        
        $query->execute(['nombre_cargo'=>$data['nombre_cargo'], 'sueldo_semanal'=>$data['sueldo'],'prima_por_hogar'=>$data['prima']]);
       
        if ( $query->rowCount() ) {
          return true;
        } else {
          return false;
        }

      } catch (PDOException $e) {
        return false;
      }
    }

    public function getError () {
      return $this->error;
    }
  }

?>
