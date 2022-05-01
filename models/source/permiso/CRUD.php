<?php
  class permisoCRUD extends Model{

    public $error;
 
    function __construct() {
      parent::__construct();
    }

   
    public  function insert ($data) {
  
      try{

        $query = $this->db->connect()->query('SELECT * FROM permiso');
        $query = $this->db->connect()->prepare('INSERT INTO permiso (cedula_trabajador, desde, hasta, descripcion, status) VALUES(:cedula_trabajador, :desde, :hasta, :descripcion, :status)');
        $query->execute([
          'cedula_trabajador'=>$data['trabajador'], 
          'desde'=>$data['desde'], 
          'hasta'=>$data['hasta'],
          'descripcion'=>$data['descripcion'],
          'status'=>1]);
        echo 1;
        return true;
      } catch(PDOException $e){
        echo 0;
        return false;
      }
    }
  
     function getTrabajadores ( $id = null) {
      $items = [];
      try {

  
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
          array_push($items, $item);
        }
        
        return $items;
      } catch (PDOException $e) {
        return [];
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
 
function getCantidad ( $id = null, $descripcion, $desde, $hasta) {
  $periodo_desde=strtotime($desde);
  $periodo_hasta=strtotime($hasta);
  $contador = 0;
  $query = $this->db->connect()->prepare('SELECT * FROM permiso WHERE cedula_trabajador = :id AND status = 1');
  $query->execute(['id'=>$id]);
  while($row = $query->fetch()){
          $inico=strtotime($row['desde']);
          $fin=strtotime($row['hasta']);
        for($i=$periodo_desde; $i<=$periodo_hasta; $i+=86400){
            for($j=$inico; $j<=$fin; $j+=86400){
            if ($i == $j) {
               $contador = $contador + 1;
             }
            }

          }
    }
    return $contador;      
}


    function get ( $id = null) {
      $items = [];
      try {
        if ( isset($id) ) {
          $query = $this->db->connect()->prepare('SELECT * FROM permiso INNER JOIN trabajadores ON permiso.cedula_trabajador = trabajadores.cedula WHERE id_permiso = :id AND permiso.status = 1');
          $query->execute(['id'=>$id]);
        } else {
          $query = $this->db->connect()->query('SELECT * FROM permiso INNER JOIN trabajadores ON permiso.cedula_trabajador = trabajadores.cedula WHERE permiso.status = 1');
        }
        while($row = $query->fetch()){
          $item = new PermisoClass();
          $item->setId($row['id_permiso']);
          $item->setNombre($row['nombre']);
          $item->setApellido($row['apellido']);
          $item->setCedula($row['cedula']);  
          $item->setDesde($row['desde']);
          $item->setHasta($row['hasta']);
          $item->setDescripcion($row['descripcion']);
          array_push($items, $item);
        }
        
        return $items;
      } catch (PDOException $e) {
        return [];
      }
    }
    
    function drop ($id) {

     try {
        $query = $this->db->connect()->prepare('UPDATE permiso SET status = 0 WHERE id_permiso = :id_permiso');
        $query->execute(['id_permiso'=>$id]);
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
        $query = $this->db->connect()->prepare('UPDATE permiso INNER JOIN trabajadores ON permiso.cedula_trabajador = trabajadores.cedula SET  desde = :desde, hasta = :hasta, descripcion = :descripcion WHERE id_permiso = :id AND permiso.status = 1');
        $query->execute([
          'desde'=>$data['desde'],
          'hasta'=>$data['hasta'],
          'descripcion'=>$data['descripcion'], 
          'id'=>$data['id']]);
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
