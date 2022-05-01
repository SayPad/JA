<?php
  require 'libs/classes/bonos.class.php';
  require 'libs/classes/recibosBonos.class.php';
  require 'libs/classes/trabajadores.class.php';
  require 'libs/classes/cargo.class.php';
  require 'libs/classes/dolar.class.php';
  require 'source/bonos/CRUD.php';
  class BonosModel extends Model {

    public $bonos;

    function __construct() {
        parent::__construct();
        $this->bonos = new bonosCRUD();

    }

  }

?>