<?php
  class nominasCRUD extends Model{
    public $error;
    function __construct() {
      parent::__construct();
    }

    public  function insert ($data) {
      try{
        $id;
        $query = $this->db->connect()->prepare('INSERT INTO nomina (
          cedula_trabajador, 
          periodo_desde, 
          periodo_hasta, 
          fecha_pago, 
          tipo_pago,
          horas_extras, 
          ivss, 
          rpe, 
          faov, 
          inces,
          total_pagar_nomina, 
          inasistencias,
          status 

          ) 
        VALUES(
          :cedula_trabajador, 
          :periodo_desde, 
          :periodo_hasta, 
          :fecha_pago, 
          :tipo_pago,
          :horas_extras, 
          :ivss, 
          :rpe, 
          :faov, 
          :inces,
          :total_pagar_nomina, 
          :inasistencias,
          :status)');

        $query->execute([
          'cedula_trabajador'=>$data['id_trabajador'],
          'periodo_desde'=>$data['periodo_desde'], 
          'periodo_hasta'=>$data['periodo_hasta'], 
          'fecha_pago'=>$data['fecha_pago'], 
          'tipo_pago'=>$data['tipo_pago'],  
          'horas_extras'=>$data['horas_extras'], 
          'ivss'=>$data['ivss'], 
          'rpe'=>$data['rpe'], 
          'faov'=>$data['faov'],
          'inces'=>$data['inces'],
          'total_pagar_nomina'=>$data['total_pagar_nomina'],  
          'inasistencias'=>$data['inasistencias'],
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
    $query = $this->db->connect()->prepare('SELECT * FROM nomina INNER JOIN trabajadores ON nomina.cedula_trabajador = trabajadores.cedula INNER JOIN cargo ON trabajadores.id_cargo = cargo.id_cargo WHERE id_nomina = :id AND nomina.status = 1');
    $query->execute(['id'=>$id]);
      while($row = $query->fetch()){
          $id = ($row['id_nomina']);
          $nombre = ($row['nombre']);
          $apellido = ($row['apellido']);
          $cedula = ($row['cedula']);
          $cargo = ($row['nombre_cargo']);
          $periodo_desde = ($row['periodo_desde']);
          $periodo_hasta = ($row['periodo_hasta']);
          $fecha_pago = ($row['fecha_pago']);
          $tipo_pago = ($row['tipo_pago']);
          $horas_extras = ($row['horas_extras']);
          $ivss = ($row['ivss']);
          $rpe = ($row['rpe']);
          $faov = ($row['faov']);
          $inces = ($row['inces']);
          $total_pagar_nomina = ($row['total_pagar_nomina']);
          $faltas = ($row['inasistencias']);
          $sueldo_semanal = ($row['sueldo_semanal']);
          $prima = ($row['prima_por_hogar']);
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
          $horas_extras, 
          $ivss, 
          $rpe, 
          $faov, 
          $inces, 
          $total_pagar_nomina, 
          $faltas, 
          $sueldo_semanal, 
          $prima);
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
function getConsultar ($desde, $hasta) {
      $items = [];
      try {

          $query = $this->db->connect()->prepare('SELECT * FROM nomina INNER JOIN trabajadores ON nomina.cedula_trabajador = trabajadores.cedula INNER JOIN cargo ON trabajadores.id_cargo = cargo.id_cargo WHERE periodo_hasta BETWEEN :desde AND :hasta');
          $query->execute(['desde'=>$desde, 'hasta'=>$hasta]);

        while($row = $query->fetch()){
          $item = new NominasClass();
          $item->setId($row['id_nomina']);
          $item->setNombre($row['nombre']);
          $item->setApellido($row['apellido']);
          $item->setCedula($row['cedula']);
          $item->setCargo($row['nombre_cargo']);
          $item->setPeriodo_desde($row['periodo_desde']);
          $item->setPeriodo_hasta($row['periodo_hasta']);
          $item->setFecha_pago($row['fecha_pago']);
          $item->setTipo_pago($row['tipo_pago']);
          $item->setHoras_extras($row['horas_extras']);
          $item->setIvss($row['ivss']);
          $item->setRpe($row['rpe']);
          $item->setFaov($row['faov']);
          $item->setInces($row['inces']);
          $item->setTotal_nomina($row['total_pagar_nomina']);
          $item->setInasistencias($row['inasistencias']);
          $item->setSueldo_semanal($row['sueldo_semanal']);
          $item->setPrima($row['prima_por_hogar']);
          array_push($items, $item);
        }
        return $items;
      } catch (PDOException $e) {
        return [];
      }
    }
function get ( $id = null) {
      $items = [];
      try {

        if ( isset($id) ) {

          $query = $this->db->connect()->prepare('SELECT * FROM nomina INNER JOIN trabajadores ON nomina.cedula_trabajador = trabajadores.cedula INNER JOIN cargo ON trabajadores.id_cargo = cargo.id_cargo WHERE id_nomina = :id AND nomina.status = 1');

          $query->execute(['id'=>$id]);

        } else {

          $query = $this->db->connect()->query('SELECT * FROM nomina INNER JOIN trabajadores ON nomina.cedula_trabajador = trabajadores.cedula INNER JOIN cargo ON trabajadores.id_cargo = cargo.id_cargo WHERE nomina.status = 1');

        }

        while($row = $query->fetch()){
          $item = new NominasClass();
          $item->setId($row['id_nomina']);
          $item->setNombre($row['nombre']);
          $item->setApellido($row['apellido']);
          $item->setCedula($row['cedula']);
          $item->setCargo($row['nombre_cargo']);
          $item->setPeriodo_desde($row['periodo_desde']);
          $item->setPeriodo_hasta($row['periodo_hasta']);
          $item->setFecha_pago($row['fecha_pago']);
          $item->setTipo_pago($row['tipo_pago']);
          $item->setHoras_extras($row['horas_extras']);
          $item->setIvss($row['ivss']);
          $item->setRpe($row['rpe']);
          $item->setFaov($row['faov']);
          $item->setInces($row['inces']);
          $item->setTotal_nomina($row['total_pagar_nomina']);
          $item->setInasistencias($row['inasistencias']);
          $item->setSueldo_semanal($row['sueldo_semanal']);
          $item->setPrima($row['prima_por_hogar']);
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
          $query = $this->db->connect()->prepare('SELECT * FROM nomina INNER JOIN trabajadores ON nomina.cedula_trabajador = trabajadores.cedula INNER JOIN cargo ON trabajadores.id_cargo = cargo.id_cargo WHERE cedula = :cedula AND nomina.status = 1 ORDER BY periodo_hasta ASC');
          $query->execute(['cedula'=>$cedula]);


        while($row = $query->fetch()){
          $fecha = $row['periodo_hasta'];
          $item = new NominasClass();
          $item->setId($row['id_nomina']);
          $item->setNombre($row['nombre']);
          $item->setApellido($row['apellido']);
          $item->setPeriodo_hasta($row['periodo_hasta']);
          array_push($items, $item);
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
          $query = $this->db->connect()->prepare('SELECT * FROM trabajadores INNER JOIN cargo ON trabajadores.id_cargo = cargo.id_cargo WHERE cedula = :id AND trabajadores.status = 1');
          $query->execute(['id'=>$id]);

        while($row = $query->fetch()){

          $nombre = ($row['nombre']);
          $apellido = ($row['apellido']);
          $cedula = ($row['cedula']);
          $cargo = ($row['nombre_cargo']);
          $sueldo = ($row['sueldo_semanal']);
          $prima = ($row['prima_por_hogar']);

          $datos = array($nombre, $apellido, $cedula, $cargo, $sueldo, $prima);
        }
        return $datos;
      } catch (PDOException $e) {
        return [];
      }
    }
    function getDeducciones ( $id_deducciones = null) {
      $items = [];
      try {
          $query = $this->db->connect()->prepare('SELECT * FROM deducciones WHERE id_deducciones = :id_deducciones');
          $query->execute(['id_deducciones'=>$id_deducciones]);

        while($row = $query->fetch()){

          $ivss = ($row['ivss']);
          $rpe = ($row['rpe']);
          $faov = ($row['faov']);
          $inces = ($row['inces']);

          $datos = array($ivss, $rpe, $faov, $inces);
        }
        return $datos;
      } catch (PDOException $e) {
        return [];
      }
    }
    function getDeduccion ( $id_deducciones = null) {
      $items = [];
      try {
          $query = $this->db->connect()->prepare('SELECT * FROM deducciones WHERE id_deducciones = :id_deducciones');
          $query->execute(['id_deducciones'=>$id_deducciones]);

        while($row = $query->fetch()){
          $item = new DeduccionesClass();
          $item->setId($row['id_deducciones']);
          $item->setIvss($row['ivss']);
          $item->setRpe($row['rpe']);
          $item->setFaov($row['faov']);
          $item->setInces($row['inces']);
          array_push($items, $item);
        }
        
        return $items;
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
        $query = $this->db->connect()->prepare('UPDATE nomina SET status = 0 WHERE id_nomina = :id_nomina');
        $query->execute(['id_nomina'=>$id]);

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
        $query = $this->db->connect()->prepare('UPDATE deducciones SET ivss = :ivss, rpe = :rpe, faov = :faov , inces = :inces WHERE id_deducciones = :id');
        $query->execute(['id'=>$data['id'], 'ivss'=>$data['ivss'], 'rpe'=>$data['rpe'], 'faov'=>$data['faov'], 'inces'=>$data['inces']]);

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