<?php
  require 'libs/classes/trabajos_extras.class.php';
  require 'libs/classes/trabajadores.class.php';
  require 'libs/classes/dolar.class.php';
  require 'source/trabajos_extras/CRUD.php';
  class Trabajos_extrasModel extends Model {

    public $trabajos_extras;

    function __construct() {
        parent::__construct();
        $this->trabajos_extras = new trabajos_extrasCRUD();

    }

  }

?>