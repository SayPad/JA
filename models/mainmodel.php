<?php
  require 'libs/classes/dolar.class.php';
  require 'libs/classes/nomina.class.php';
  require 'libs/classes/bonos.class.php';
  require 'libs/classes/trabajadores.class.php';
  require 'source/dolar/CRUD.php';
  require 'source/nominas/CRUD.php';
  require 'source/main/CRUD.php';
  require 'source/bonos/CRUD.php';
  require 'source/trabajadores/CRUD.php';
  class MainModel extends Model {
    public $dolar;
    public $main;
    public $nominas;
    public $trabajadores;
    public $bonos;

    function __construct() {
        parent::__construct();
        $this->dolar = new dolarCRUD();
        $this->main = new mainCRUD();
        $this->nominas = new nominasCRUD();
        $this->bonos = new bonosCRUD();
        $this->trabajadores = new trabajadoresCRUD();

    }

  }

?>