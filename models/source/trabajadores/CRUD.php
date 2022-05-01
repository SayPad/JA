<?php

  class trabajadoresCRUD extends Model{

    public $error;
 
    function __construct() {
      parent::__construct();
    }

   
    public  function insert ($data) {
      try{
        $contador = 0;
        $query = $this->db->connect()->prepare('SELECT * FROM trabajadores WHERE cedula = :cedula AND status = 1');
        $query->execute(['cedula'=>$data['cedula']]);
        while($row = $query->fetch()){
          $contador = $contador + 1;
        }
        if ($contador == 0) {

        $query = $this->db->connect()->query('SELECT * FROM trabajadores');
        $query = $this->db->connect()->prepare('INSERT INTO trabajadores (fecha_ingreso,id_cargo, nombre, apellido, cedula, correo, status) VALUES(:fecha_ingreso,:id_cargo, :nombre, :apellido, :cedula, :correo, :status)');
        $query->execute([
          'fecha_ingreso'=>$data['fecha'], 
          'id_cargo'=>$data['cargo'], 
          'nombre'=>$data['nombre'],  
          'apellido'=>$data['apellido'], 
          'cedula'=>$data['cedula'], 
          'correo'=>$data['correo'], 
          'status'=>'1']);
         echo 1;
        return true;
        }else{
          echo 0;
        }
        
      } catch(PDOException $e){
        echo 2;  
    }
  }
     
     public function existe($dato){
        $contador = 0;
        $query = $this->db->connect()->prepare('SELECT * FROM trabajadores WHERE cedula = :cedula AND status = 1');
        $query->execute(['cedula'=>$dato]);
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

          $query = $this->db->connect()->prepare('SELECT * FROM trabajadores INNER JOIN cargo ON trabajadores.id_cargo = cargo.id_cargo WHERE cedula = :id AND trabajadores.status = 1');
          $query->execute(['id'=>$id]);

            while($row = $query->fetch()){
            $item = new TrabajadoresClass(); 
            $item->setNombre($row['nombre']);
            $item->setApellido($row['apellido']);
            $item->setFecha_ingreso($row['fecha_ingreso']);
            $item->setCedula($row['cedula']);
            $item->setCargo($row['id_cargo']);
            $item->setStatus($row['status']);
            $item->setCorreo($row['correo']);
            array_push($items, $item);
          }


        } else {

          $query = $this->db->connect()->query('SELECT * FROM trabajadores INNER JOIN cargo ON trabajadores.id_cargo = cargo.id_cargo WHERE trabajadores.status = 1');

       
        while($row = $query->fetch()){
          $item = new TrabajadoresClass();
          $item->setNombre($row['nombre']);
          $item->setApellido($row['apellido']);
          $item->setCedula($row['cedula']);
          $item->setCargo($row['nombre_cargo']);
          $item->setFecha_ingreso($row['fecha_ingreso']);
          $item->setSueldo_semanal($row['sueldo_semanal']);
          $item->setPrima_por_hogar($row['prima_por_hogar']);
          $item->setStatus($row['status']);
          $item->setCorreo($row['correo']);
          array_push($items, $item);
        }
         }
        return $items;
      } catch (PDOException $e) {
        return [];
      }
    }
    function getCargos ( $id = null) {
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
        $query = $this->db->connect()->prepare('UPDATE trabajadores SET status = 0 WHERE cedula = :id_trabajador');
        $query->execute(['id_trabajador'=>$id]);

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
        $query = $this->db->connect()->prepare('UPDATE trabajadores SET  id_cargo = :cargo, nombre = :nombre, apellido = :apellido, fecha_ingreso = :fecha_ingreso, correo = :correo WHERE cedula = :cedula AND status = 1');
        $query->execute([
          'cargo'=>$data['cargo'], 
          'nombre'=>$data['nombre'],  
          'apellido'=>$data['apellido'], 
          'cedula'=>$data['cedula'], 
          'fecha_ingreso'=>$data['fecha_ingreso'], 
          'correo'=>$data['correo']]);

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
