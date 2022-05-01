<?php
  class bonosCRUD extends Model{
    public $error;
    function __construct() {
      parent::__construct();
    } 

 public  function insert ($data) {
      try{
        $id;
        $query = $this->db->connect()->prepare('INSERT INTO recibos_bonos (
          id_bono, 
          cedula_trabajador, 
          periodo_desde, 
          periodo_hasta, 
          fecha_pago, 
          tipo_pago,
          total_pagar, 
          inasistencias,
          valor_actual,
          status 

          ) 
        VALUES(
          :id_bono, 
          :cedula_trabajador, 
          :periodo_desde, 
          :periodo_hasta, 
          :fecha_pago, 
          :tipo_pago,
          :total_pagar, 
          :inasistencias,
          :valor_actual, 
          :status)');

        $query->execute([
          'id_bono'=>$data['bono'],
          'cedula_trabajador'=>$data['trabajador'],  
          'periodo_desde'=>$data['periodo_desde'], 
          'periodo_hasta'=>$data['periodo_hasta'], 
          'fecha_pago'=>$data['fecha_pago'], 
          'tipo_pago'=>$data['tipo_pago'],  
          'total_pagar'=>$data['total_pagar'], 
          'inasistencias'=>$data['inasistencias'],
          'valor_actual'=>$data['dolar'],
          'status' => 1 
          ]);
       
        echo 1;
        return true;
      } catch(PDOException $e){
        echo $e;
        return false;
      }
    }
    public  function insertBonos ($data) {
      try{
        $id;
        $query = $this->db->connect()->prepare('INSERT INTO bonos (
          nombre_bono, 
          nombre_cargo, 
          moneda, 
          valor, 
          dias,
          status 
          ) 
        VALUES(
          :nombre_bono, 
          :nombre_cargo, 
          :moneda, 
          :valor, 
          :dias,
          :status)');

        $query->execute([
          'nombre_bono'=>$data['nombre_bono'],
          'nombre_cargo'=>$data['cargo'], 
          'moneda'=>$data['moneda'], 
          'valor'=>$data['valor'], 
          'dias'=>$data['dias'],  
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
    $query = $this->db->connect()->prepare('SELECT * FROM recibos_bonos INNER JOIN bonos ON bonos.id_bono = recibos_bonos.id_bono INNER JOIN cargo ON cargo.id_cargo = bonos.nombre_cargo INNER JOIN trabajadores ON trabajadores.cedula = recibos_bonos.cedula_trabajador WHERE id_recibo_bono = :id AND bonos.status = 1');
    $query->execute(['id'=>$id]);
      while($row = $query->fetch()){
          $id = ($row['id_recibo_bono']);
          $nombre = ($row['nombre']);
          $apellido = ($row['apellido']);
          $cedula = ($row['cedula']);
          $cargo = ($row['nombre_cargo']);
          $periodo_desde = ($row['periodo_desde']);
          $periodo_hasta = ($row['periodo_hasta']);
          $fecha_pago = ($row['fecha_pago']);
          $tipo_pago = ($row['tipo_pago']);
          $inasistencias = ($row['inasistencias']);
          $total_pagar = ($row['total_pagar']);
          $dolar = ($row['valor_actual']);
          $nombre_bono = ($row['nombre_bono']);
          $valor = ($row['valor']);
          $dias = ($row['dias']);
          $moneda = ($row['moneda']);
        }
        $datos = array(
          $id, 
          $nombre, 
          $apellido, 
          $cedula, 
          $cargo, 
          $periodo_desde, 
          $periodo_hasta, 
          $fecha_pago, 
          $tipo_pago,
          $inasistencias,  
          $total_pagar,
          $dolar,
          $valor,
          $nombre_bono,
          $dias,
          $moneda);
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

function getBonos ( $id = null) {
      $items = [];
      try {

        if ( isset($id) ) {

          $query = $this->db->connect()->prepare('SELECT * FROM bonos INNER JOIN cargo ON cargo.id_cargo = bonos.nombre_cargo WHERE id_bono = :id AND bonos.status = 1');

          $query->execute(['id'=>$id]);

        } else {
          $query = $this->db->connect()->query('SELECT * FROM bonos INNER JOIN cargo ON cargo.id_cargo = bonos.nombre_cargo WHERE bonos.status = 1');
        }
        while($row = $query->fetch()){
          $item = new BonosClass();
          $item->setId($row['id_bono']);
          $item->setNombre_bono($row['nombre_bono']);
          $item->setValor($row['valor']);
          $item->setDias($row['dias']);
          $item->setNombre_cargo($row['nombre_cargo']);
          $item->setMoneda($row['moneda']);
          $item->setStatus($row['status']);
          array_push($items, $item);
        }
        return $items;
      } catch (PDOException $e) {
        return [];
      }
  }
  function getValor ($bono) {
      try {

        if ( isset($bono) ) {

          $query = $this->db->connect()->prepare('SELECT * FROM bonos INNER JOIN cargo ON cargo.id_cargo = bonos.nombre_cargo WHERE id_bono = :id AND bonos.status = 1');

          $query->execute(['id'=>$bono]);

        } else {
          $query = $this->db->connect()->query('SELECT * FROM bonos INNER JOIN cargo ON cargo.id_cargo = bonos.nombre_cargo WHERE bonos.status = 1');
        }
        while($row = $query->fetch()){
          $valor = $row['valor'];
          $moneda = $row['moneda'];
          $dias = $row['dias'];
          $datos = array($valor, $moneda, $dias);
        }
        return $datos;
      } catch (PDOException $e) {
        return false;
      }
  }

  function get ( $id = null) {
      $items = [];
      try {

        if ( isset($id) ) {

          $query = $this->db->connect()->prepare('SELECT * FROM recibos_bonos INNER JOIN bonos ON bonos.id_bono = recibos_bonos.id_bono INNER JOIN cargo ON cargo.id_cargo = bonos.nombre_cargo INNER JOIN trabajadores ON trabajadores.cedula = recibos_bonos.cedula_trabajador WHERE id_recibo_bono = :id AND bonos.status = 1');

          $query->execute(['id'=>$id]);

        } else {
          $query = $this->db->connect()->query('SELECT * FROM recibos_bonos INNER JOIN bonos ON bonos.id_bono = recibos_bonos.id_bono INNER JOIN cargo ON cargo.id_cargo = bonos.nombre_cargo INNER JOIN trabajadores ON trabajadores.cedula = recibos_bonos.cedula_trabajador WHERE recibos_bonos.status = 1');
        }
        while($row = $query->fetch()){
          $item = new ReciboBonosClass();

          $item->setId($row['id_recibo_bono']);
          $item->setPeriodo_desde($row['periodo_desde']);
          $item->setPeriodo_hasta($row['periodo_hasta']);
          $item->setFecha_pago($row['fecha_pago']);
          $item->setTipo_pago($row['tipo_pago']);
          $item->setTotal_pagar($row['total_pagar']);
          $item->setInasistencias($row['inasistencias']);

          $item->setNombre_bono($row['nombre_bono']);
          $item->setValor($row['valor']);
          $item->setDias($row['dias']);
          $item->setMoneda($row['moneda']);

          $item->setNombre($row['nombre']);
          $item->setApellido($row['apellido']);
          $item->setCedula($row['cedula']);
          $item->setNombre_cargo($row['nombre_cargo']);

          $item->setStatus($row['status']);
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

          $query = $this->db->connect()->prepare('SELECT * FROM recibos_bonos INNER JOIN bonos ON bonos.id_bono = recibos_bonos.id_bono INNER JOIN cargo ON cargo.id_cargo = bonos.nombre_cargo INNER JOIN trabajadores ON trabajadores.cedula = recibos_bonos.cedula_trabajador WHERE periodo_hasta BETWEEN :desde AND :hasta');
          $query->execute(['desde'=>$desde, 'hasta'=>$hasta]);

        while($row = $query->fetch()){
          $item = new ReciboBonosClass();

          $item->setId($row['id_recibo_bono']);
          $item->setPeriodo_desde($row['periodo_desde']);
          $item->setPeriodo_hasta($row['periodo_hasta']);
          $item->setFecha_pago($row['fecha_pago']);
          $item->setTipo_pago($row['tipo_pago']);
          $item->setTotal_pagar($row['total_pagar']);
          $item->setInasistencias($row['inasistencias']);

          $item->setNombre_bono($row['nombre_bono']);
          $item->setValor($row['valor']);
          $item->setDias($row['dias']);
          $item->setMoneda($row['moneda']);

          $item->setNombre($row['nombre']);
          $item->setApellido($row['apellido']);
          $item->setCedula($row['cedula']);
          $item->setNombre_cargo($row['nombre_cargo']);

          $item->setStatus($row['status']);
          array_push($items, $item);
        }
        return $items;
      } catch (PDOException $e) {
        return [];
      }
    }
     function getAlerta ( $cedula ) {
      $items = [];
      $fecha = date("Y-m-d");
      try {
          $query = $this->db->connect()->prepare('SELECT * FROM cestaticket INNER JOIN trabajadores ON cestaticket.id_trabajador = trabajadores.id_trabajador INNER JOIN cargo ON trabajadores.id_cargo = cargo.id_cargo WHERE cedula = :cedula AND cestaticket.status = 1 ORDER BY periodo_hasta ASC');
          $query->execute(['cedula'=>$cedula]);


        while($row = $query->fetch()){
          $fecha = $row['periodo_hasta'];

          
        }
        return $fecha;

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
          $query = $this->db->connect()->prepare('SELECT * FROM trabajadores INNER JOIN cargo ON trabajadores.id_cargo = cargo.id_cargo WHERE id_trabajador = :id AND trabajadores.status = 1');
          $query->execute(['id'=>$id]);

        while($row = $query->fetch()){
          $nombre = ($row['nombre']);
          $apellido = ($row['apellido']);
          $cedula = ($row['cedula']);
          $nombre_cargo = ($row['nombre_cargo']);
          $datos = array($id, $nombre, $apellido, $cedula, $nombre_cargo);
        }
        return $datos;
      } catch (PDOException $e) {
        return [];
      }
    }
    function getFaltas ($id, $periodo_desde, $periodo_hasta) {
      $desde=strtotime($periodo_desde);
      $hasta=strtotime($periodo_hasta);
      $contador = 0;
      try {
          $query = $this->db->connect()->prepare('SELECT * FROM permiso WHERE cedula_trabajador = :id AND descripcion = "Falta" AND status = 1');
          $query->execute(['id'=>$id]);

        while($row = $query->fetch()){
          $inico=strtotime($row['desde']);
          $fin=strtotime($row['hasta']);
        for($i=$desde; $i<=$hasta; $i+=86400){
            for($j=$inico; $j<=$fin; $j+=86400){
            if ($i == $j) {
               $contador = $contador + 1;
             }
            }

          }
        }
        return $contador;
      } catch (PDOException $e) {
        echo $e;
      }
    }


    function drop ($id) {

     try {
        $query = $this->db->connect()->prepare('UPDATE bonos SET status = 0 WHERE id_bono = :id_bono');
        $query->execute(['id_bono'=>$id]);
        
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
        $query = $this->db->connect()->prepare('UPDATE bonos SET  moneda = :moneda, valor = :valor , dias = :dias, nombre_cargo = :nombre_cargo WHERE nombre_bono = :nombre_bono AND status = 1');
        
        $query->execute([
          'nombre_bono'=>$data['nombre_bono'],
          'nombre_cargo'=>$data['nombre_cargo'], 
          'moneda'=>$data['moneda'],
          'valor'=>$data['valor'],
          'dias'=>$data['dias']
        ]);
       
        if ( $query->rowCount() ) {
          return true;
        } else {
          return false;
        }

      } catch (PDOException $e) {
        echo $e;
        return false;
      }
    }
    public function getError () {
      return $this->error;
    }
  }

?>