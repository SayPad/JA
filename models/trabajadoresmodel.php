<?php
  require 'libs/classes/cargo.class.php';
  require 'libs/classes/trabajadores.class.php';
  require 'source/trabajadores/CRUD.php';

  class trabajadoresModel extends Model {

    public $trabajadores;

    function __construct() {
        parent::__construct();
        $this->trabajadores = new trabajadoresCRUD();
    }

  }

?>