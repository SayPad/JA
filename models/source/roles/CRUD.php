<?php

  class rolesCRUD extends Model{

    public $error;

    function __construct() {
      parent::__construct();
    }

     public  function insert ($nombre_rol) {
      try{
        $contador = 0;
        $query = $this->db->connect()->prepare('SELECT * FROM roles WHERE nombre_rol = :nombre_rol AND status = 1');
        $query->execute(['nombre_rol'=>$nombre_rol]);
        while($row = $query->fetch()){
          $contador = $contador + 1;
        }
        if ($contador == 0) {
        $query = $this->db->connect()->query('SELECT * FROM roles');
        $query = $this->db->connect()->prepare('INSERT INTO roles (nombre_rol, status) VALUES(:nombre_rol, :status)');
        $query->execute(['nombre_rol'=>$nombre_rol, 'status'=>'1']);
        echo 1;
        return true;
        }
        else{
          echo 0;
        }
        
      } catch(PDOException $e){
        echo 2;
        return false;
      }
    }

     public function existe($nombre_rol){
        $contador = 0;
        $query = $this->db->connect()->prepare('SELECT * FROM roles WHERE nombre_rol = :nombre_rol AND status = 1');
        $query->execute(['nombre_rol'=>$nombre_rol]);
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

    public  function insertPermisos ($nombre_rol, $operacion) {
    $id = 0;
      try{
        $query = $this->db->connect()->prepare('SELECT * FROM roles WHERE nombre_rol = :nombre_rol');
        $query->execute(['nombre_rol'=>$nombre_rol]);
        while($row = $query->fetch()){
          $id = ($row['id_rol']);
        }
        $query = $this->db->connect()->query('SELECT * FROM rol_operacion');
        $query = $this->db->connect()->prepare('INSERT INTO rol_operacion (id_rol,id_operacion, status) VALUES(:id_rol,:id_operacion, :status)');
        $query->execute(['id_rol'=>$id,'id_operacion'=>$operacion, 'status'=>'1']);
        return true;
      } catch(PDOException $e){
        echo $e;
        $this->error = "¡Error! No se logró registrar";
        return false;
      }
    }

     public  function updateOperaciones ($id_rol, $selected) {
      try{
        $query = $this->db->connect()->query('SELECT * FROM rol_operacion');
        $query = $this->db->connect()->prepare('INSERT INTO rol_operacion (id_rol,id_operacion, status) VALUES(:id_rol,:id_operacion, :status)');
        $query->execute(['id_rol'=>$id_rol,'id_operacion'=>$selected, 'status'=>'1']);

        return true;
      } catch(PDOException $e){
        echo $e;
        $this->error = "¡Error! No se actualizar registrar";
        return false;
      }
    }
    function restaurarOperaciones ($id_rol) {
      try {
        $query = $this->db->connect()->prepare('DELETE FROM rol_operacion WHERE id_rol = :id_rol');
        $query->execute(['id_rol'=>$id_rol]);
        if ( $query->rowCount() ) {
          return true;
        } else {
          return false;
        }
      } catch ( PDOException $e ) {
        return false;
      }

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
    
    function get ( $id_rol = null) {
      $items = [];
      try {
        if ( isset($id_rol) ) {
          $query = $this->db->connect()->prepare('SELECT * FROM roles WHERE id_rol = :id_rol AND status = 1');
          $query->execute(['id_rol'=>$id_rol]);
        } else {
          $query = $this->db->connect()->query('SELECT * FROM roles WHERE status = 1');
        }

        while($row = $query->fetch()){
          $item = new RolesClass();
          $item->setId($row['id_rol']);
          $item->setNombre_rol($row['nombre_rol']);
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
        $query = $this->db->connect()->prepare('UPDATE roles SET status = 0 WHERE id_rol = :id_rol');
        $query->execute(['id_rol'=>$id]);

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
        if ($this->existe($data['nombre_rol'])) {
        $query = $this->db->connect()->prepare('UPDATE roles SET nombre_rol = :nombre_rol  WHERE id_rol = :id_rol AND status = 1');

        $query->execute (['id_rol'=>$data['id_rol'],  'nombre_rol'=>$data['nombre_rol']]);


        if ( $query->rowCount() ) {
          return true;
        } else {
          return false;
        }
        }else{
          $this->error = "¡Error! El rol ya existe";
          return false;
         }

      } catch (PDOException $e) {
        echo $e;
        return false;
      }
    }
}
?>
