<?php
  class trabajos_extrasCRUD extends Model{

    public $error;

    function __construct() {
      parent::__construct();
    }

    public  function insert ($data) {
      try{
        $id;
        $query = $this->db->connect()->prepare('INSERT INTO trabajosextras (
          cedula_trabajador, 
          fecha_trabajo, 
          descripcion_trabajo, 
          tipo_pago, 
          fecha_pago, 
          descripcion,
          cantidad, 
          total_unidad, 
          total_pagar,
          status 

          ) 
        VALUES(
          :cedula_trabajador, 
          :fecha_trabajo, 
          :descripcion_trabajo, 
          :tipo_pago, 
          :fecha_pago, 
          :descripcion,
          :cantidad, 
          :total_unidad, 
          :total_pagar,
          :status)');

        $query->execute([
          'cedula_trabajador'=>$data['id_trabajador'],
          'fecha_trabajo'=>$data['fecha_trabajo'],  
          'descripcion_trabajo'=>$data['descripcion_trabajo'], 
          'tipo_pago'=>$data['tipo_pago'], 
          'fecha_pago'=>$data['fecha_pago'], 
          'descripcion'=>$data['descripcion'],  
          'cantidad'=>$data['cantidad'], 
          'total_unidad'=>$data['total_unidad'], 
          'total_pagar'=>$data['total_pagar'],
          'status' => 1 
          ]);
        echo 1;
        return true;
      } catch(PDOException $e){
        echo 2;
        return false;
      }
    }
function getGenerar ($id){
  try{
    $query = $this->db->connect()->prepare('SELECT * FROM trabajosextras INNER JOIN trabajadores ON trabajosextras.cedula_trabajador = trabajadores.cedula INNER JOIN cargo ON trabajadores.id_cargo = cargo.id_cargo WHERE id_trabajosExtras  = :id AND trabajosextras.status = 1');
    $query->execute(['id'=>$id]);
      while($row = $query->fetch()){
          $id = ($row['id_trabajosExtras']);
          $fecha_trabajo = ($row['fecha_trabajo']);
          $descripcion_trabajo = ($row['descripcion_trabajo']);
          $tipo_pago = ($row['tipo_pago']);
          $fecha_pago = ($row['fecha_pago']);
          $descripcion = ($row['descripcion']);
          $cantidad = ($row['cantidad']);
          $total_unidad = ($row['total_unidad']);
          $total_pagar = ($row['total_pagar']);
          $nombre = ($row['nombre']);
          $apellido = ($row['apellido']);
          $cedula = ($row['cedula']);
          $nombre_cargo = ($row['nombre_cargo']);

        }
        $datos = array(
          $id, 
          $fecha_trabajo, 
          $descripcion_trabajo, 
          $tipo_pago, 
          $fecha_pago, 
          $descripcion, 
          $cantidad, 
          $total_unidad, 
          $total_pagar, 
          $nombre, 
          $apellido, 
          $cedula, 
          $nombre_cargo);
        return $datos;
  }catch(PDOException $e){
    echo $e;
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

function get ( $id = null) {
      $items = [];
      try {

        if ( isset($id) ) {

          $query = $this->db->connect()->prepare('SELECT * FROM trabajosextras INNER JOIN trabajadores ON trabajosextras.cedula_trabajador = trabajadores.cedula INNER JOIN cargo ON trabajadores.id_cargo = cargo.id_cargo WHERE id_trabajosExtras  = :id AND trabajosextras.status = 1');

          $query->execute(['id'=>$id]);

        } else {

          $query = $this->db->connect()->query('SELECT * FROM trabajosextras INNER JOIN trabajadores ON trabajosextras.cedula_trabajador = trabajadores.cedula INNER JOIN cargo ON trabajadores.id_cargo = cargo.id_cargo WHERE trabajosextras.status = 1');

        }

        while($row = $query->fetch()){
          $item = new Trabajos_extrasClass();
          $item->setId($row['id_trabajosExtras']);
          $item->setFecha_trabajo($row['fecha_trabajo']);
          $item->setDescripcion_trabajo($row['descripcion_trabajo']);
          $item->setTipo_pago($row['tipo_pago']);
          $item->setFecha_pago($row['fecha_pago']);
          $item->setDescripcion($row['descripcion']);
          $item->setCantidad($row['cantidad']);
          $item->setTotal_unidad($row['total_unidad']);
          $item->setTotal_pagar($row['total_pagar']);
          $item->setNombre($row['nombre']);
          $item->setApellido($row['apellido']);
          $item->setCedula($row['cedula']);
          $item->setNombre_cargo($row['nombre_cargo']);
          array_push($items, $item);
        }
        return $items;
      } catch (PDOException $e) {
        return [];
      }
    }

    function getConsultar ($desde, $hasta) {
      $items = [];
      try {

          $query = $this->db->connect()->prepare('SELECT * FROM trabajosextras INNER JOIN trabajadores ON trabajosextras.cedula_trabajador = trabajadores.cedula INNER JOIN cargo ON trabajadores.id_cargo = cargo.id_cargo WHERE fecha_pago BETWEEN :desde AND :hasta');
          $query->execute(['desde'=>$desde, 'hasta'=>$hasta]);

        while($row = $query->fetch()){
          $item = new Trabajos_extrasClass();
          $item->setId($row['id_trabajosExtras']);
          $item->setFecha_trabajo($row['fecha_trabajo']);
          $item->setDescripcion_trabajo($row['descripcion_trabajo']);
          $item->setTipo_pago($row['tipo_pago']);
          $item->setFecha_pago($row['fecha_pago']);
          $item->setDescripcion($row['descripcion']);
          $item->setCantidad($row['cantidad']);
          $item->setTotal_unidad($row['total_unidad']);
          $item->setTotal_pagar($row['total_pagar']);
          $item->setNombre($row['nombre']);
          $item->setApellido($row['apellido']);
          $item->setCedula($row['cedula']);
          $item->setNombre_cargo($row['nombre_cargo']);
          array_push($items, $item);
        }
        return $items;
      } catch (PDOException $e) {
        return [];
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


    function getDolar () {

      try {
          $query = $this->db->connect()->prepare('SELECT * FROM dolar WHERE id_dolar = :id');
          $query->execute(['id'=>1]);
        while($row = $query->fetch()){
          $valor = ($row['valor_actual']);    
        }

        return $valor;
      } catch (PDOException $e) {
        return false;
      }
    }

     function getTrabajador ( $id = null) {
      $items = [];
      try {
          $query = $this->db->connect()->prepare('SELECT * FROM trabajadores INNER JOIN cargo ON trabajadores.id_cargo = cargo.id_cargo WHERE cedula = :id AND trabajadores.status = 1');
          $query->execute(['id'=>$id]);

        while($row = $query->fetch()){
          $nombre = ($row['nombre']);
          $apellido = ($row['apellido']);
          $cedula = ($row['cedula']);
          $cargo = ($row['nombre_cargo']);

          $datos = array($nombre, $apellido, $cedula, $cargo);
        }
        return $datos;
      } catch (PDOException $e) {
        return [];
      }
    }
 

    function drop ($id) {
       try {
        $query = $this->db->connect()->prepare('UPDATE trabajosextras SET status = 0 WHERE id_trabajosExtras = :id_trabajosExtras');
        $query->execute(['id_trabajosExtras'=>$id]);

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
