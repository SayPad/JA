<?php

  class bitacoraCRUD extends Model{

    public $error;

    function __construct() {
      parent::__construct();
    }


    public function consultarBitacora(){

      $tabla ="SELECT * FROM bitacora";

      $respuestaArreglo ='';
      try{

        $datos = $this->conexion->prepare($tabla);
        $datos->execute();
        $datos->setFetchMode(PDO::FETCH_ASSOC);
        $respuestaArreglo = $datos->fetchAll(PDO::FETCH_ASSOC);
        return $respuestaArreglo;
      }catch(PDOException $e){
        $this->error = $e->getMessage();
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

    function get ( $id_bitacora = null) {
      $items = [];
      try {

        if ( isset($id) ) {

          $query = $this->db->connect()->prepare('SELECT * FROM bitacora WHERE id_bitacora = :id_bitacora AND status = 1');

          $query->execute(['id_bitacora'=>$id]);

        } else {

          $query = $this->db->connect()->query('SELECT * FROM bitacora WHERE status = 1');

        }

        while($row = $query->fetch()){
          $item = new BitacoraClass();
          $item->setIdBitacora($row['id_bitacora']);
          $item->setUsuario($row['usuario']);  
          $item->setFecha($row['fecha']);
          $item->setOperacion($row['operacion']);
          $item->setTabla($row['tabla']);
          $item->setStatus($row['status']);
          array_push($items, $item);
        }
        return $items;
      } catch (PDOException $e) {
        return [];
      }
    }

    function drop ($id_bitacora) {

      try {

        $query = $this->db->connect()->prepare('DELETE FROM bitacora WHERE id_bitacora = :id_bitacora');
        $query->execute(['id_bitacora'=>$id_bitacora]);

        if ( $query->rowCount() ) {
          return true;
        } else {
          return false;
        }

      } catch ( PDOException $e ) {
        return false;
      }

    }

    function registroSalida ($data) {
      try {
        $query = $this->db->connect()->prepare('UPDATE bitacora SET  hora = :hora WHERE id_bitacora = :id_bitacora');

             $query->execute(['estatus'=>$data['estatus'], 'usuario'=>$data['usuario'], 'operacion'=>$data['operacion'], 'host'=>$data['host'], 'fecha'=>$data['fecha'],'hora'=>$data['hora'], 'tabla'=>$data['tabla']]);
             
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
