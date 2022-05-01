<?php
  require 'libs/classes/cargo.class.php';
  require 'source/cargo/CRUD.php';

  class cargoModel extends Model {

    public $cargo;

    function __construct() {
        parent::__construct();
        $this->cargo = new cargoCRUD();
    }

  }

?>