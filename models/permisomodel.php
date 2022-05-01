<?php

  require 'libs/classes/permiso.class.php';
  require 'source/permiso/CRUD.php';
  require 'libs/classes/trabajadores.class.php';
  class permisoModel extends Model {

    public $permiso;

    function __construct() {
        parent::__construct();
        $this->permiso = new permisoCRUD();
    }

  }
?>