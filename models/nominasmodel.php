<?php
  require 'libs/classes/nomina.class.php';
  require 'libs/classes/trabajadores.class.php';
  require 'libs/classes/dolar.class.php';
  require 'libs/classes/deducciones.class.php';
  require 'source/nominas/CRUD.php';
  class NominasModel extends Model {

    public $nominas;

    function __construct() {
        parent::__construct();
        $this->nominas = new nominasCRUD();

    }

  }

?>