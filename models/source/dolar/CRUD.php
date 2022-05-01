<?php
  class dolarCRUD extends Model{

    public $error;

    function __construct() {
      parent::__construct();
    }


    function get ( $id = null) {
      $items = [];
      try {

        if ( isset($id) ) {

          $query = $this->db->connect()->prepare('SELECT * FROM trabajadores WHERE id_trabajador = :id');

          $query->execute(['id'=>$id]);

        } else {

          $query = $this->db->connect()->query('SELECT * FROM dolar');

        }

        while($row = $query->fetch()){
          $item = new DolarClass();

          $item->setPrecio_dolar($row['valor_actual']);
          $item->setFecha_actualizacion($row['fecha_actualizacion']);
         

          array_push($items, $item);
        }
        
        return $items;
      } catch (PDOException $e) {
        return [];
      }
    }
   


    function update ($data) {
      try {
        $query = $this->db->connect()->prepare('UPDATE dolar SET  
          valor_actual = :valor_actual, 
          fecha_actualizacion = :fecha_actualizacion 
          WHERE id_dolar = :id_dolar');

        $query->execute(['valor_actual'=>$data['valor_actual'], 'fecha_actualizacion'=>$data['fecha_actualizacion'], 'id_dolar'=>$data['id_dolar']]);

        if ( $query->rowCount() ) {
          return true;
        } else {
          return false;
        }
      } catch (PDOException $e) {
        echo "5";
        return false;
      }
    }


    public function getError () {
      return $this->error;
    }
  }

?>
