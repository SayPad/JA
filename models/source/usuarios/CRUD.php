<?php

  class usuariosCRUD extends Model{

    public $error;
 
    function __construct() {
      parent::__construct();
    }

   
    public  function insert ($data) {
      try{
        $contador = 0;
        $query = $this->db->connect()->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND status = 1');
        $query->execute(['usuario'=>$data['usuario']]);
        while($row = $query->fetch()){
          $contador = $contador + 1;
        }
        if ($contador == 0) {
          $query = $this->db->connect()->query('SELECT * FROM usuarios');
          $query = $this->db->connect()->prepare('INSERT INTO usuarios (usuario, contrasena, id_rol, cedula_trabajador, status) VALUES(:usuario, md5(:contrasena), :id_rol, :cedula_trabajador, :status)');
          $query->execute(['usuario'=>$data['usuario'], 'contrasena'=>$data['contrasena'], 'id_rol'=>$data['id_rol'],'cedula_trabajador'=>$data['id_trabajador'], 'status'=>'1']);
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
      public function existe($usuario){
        $contador = 0;
        $query = $this->db->connect()->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND status = 1');
        $query->execute(['usuario'=>$usuario]);
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

          $query = $this->db->connect()->prepare('SELECT * FROM usuarios INNER JOIN roles ON usuarios.id_rol = roles.id_rol INNER JOIN trabajadores ON usuarios.cedula_trabajador = trabajadores.cedula WHERE usuario = :id AND usuarios.status = 1');

          $query->execute(['id'=>$id]);

        } else {

          $query = $this->db->connect()->query('SELECT * FROM usuarios INNER JOIN roles ON usuarios.id_rol = roles.id_rol INNER JOIN trabajadores ON usuarios.cedula_trabajador = trabajadores.cedula WHERE usuarios.status = 1');

        }
        while($row = $query->fetch()){
          $item = new UsuariosClass();
          $item->setUsuario($row['usuario']);
          $item->setNombre($row['nombre']);
          $item->setApellido($row['apellido']);
          $item->setCedula($row['cedula']);
          $item->setContrasena($row['contrasena']);
          $item->setRol($row['nombre_rol']);
          $item->setCorreo($row['correo']);
          array_push($items, $item);
        }
        
        return $items;
      } catch (PDOException $e) {
        return [];
      }
    }

    function getRoles ( $id_rol = null) {
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
    function getTrabajadores ( $id_trabajador = null) {
      $items = [];
      try {

        if ( isset($id_trabajador) ) {

          $query = $this->db->connect()->prepare('SELECT * FROM trabajadores WHERE id_trabajador = :id_trabajador AND status = 1');

          $query->execute(['id_trabajador'=>$id_trabajador]);

        } else {

          $query = $this->db->connect()->query('SELECT * FROM trabajadores WHERE status = 1');
        }
        while($row = $query->fetch()){
          $item = new TrabajadoresClass();
          $item->setNombre($row['nombre']);
          $item->setApellido($row['apellido']);
          $item->setCedula($row['cedula']);

          array_push($items, $item);
        }
        return $items;
      } catch (PDOException $e) {
        return [];
      }
    }
    

    function drop ($id) {
      try {
        $query = $this->db->connect()->prepare('UPDATE usuarios SET status = 0 WHERE usuario = :usuario');
        $query->execute(['usuario'=>$id]);

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
        $query = $this->db->connect()->prepare('UPDATE usuarios SET contrasena = md5(:contrasena), id_rol = :id_rol, cedula_trabajador = :cedula_trabajador WHERE usuario = :usuario AND status = 1');
        $query->execute(['usuario'=>$data['usuario'], 'contrasena'=>$data['contrasena'], 'id_rol'=>$data['id_rol'], 'cedula_trabajador'=>$data['id_trabajador']]);

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