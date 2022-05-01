<?php
 require 'libs/classes/nomina.class.php';
 require 'libs/classes/recibosBonos.class.php';
 require 'libs/classes/trabajos_extras.class.php';
 require 'libs/classes/permiso.class.php';
 require 'libs/classes/trabajadores.class.php';
 
 /*require 'libs/classes/permios.class.php';
 require 'libs/classes/reposos.class.php';
 require 'libs/classes/faltas.class.php';*/
  //CRUDS
  require 'source/reportes/CRUD.php';
  require 'source/nominas/CRUD.php';
  require 'source/bonos/CRUD.php';
  require 'source/trabajos_extras/CRUD.php';
  require 'source/permiso/CRUD.php';
  require 'source/trabajadores/CRUD.php';
  /*require 'source/permisos/CRUD.php';
  require 'source/reposos/CRUD.php';
  require 'source/faltas/CRUD.php';*/

  class ReportesModel extends Model {
    
    public $nominas;
    public $bonos;
    public $trabajos_extras;
    public $permiso;
    public $trabajadores;
    /*public $permisos;
    public $reposos;
    public $faltas;*/



    function __construct() {
        parent::__construct();

        $this->reportes = new reportesCRUD();
        $this->trabajadores = new trabajadoresCRUD();
        $this->permiso = new permisoCRUD();
        $this->nominas = new nominasCRUD();
        $this->trabajos_extras = new trabajos_extrasCRUD();
        $this->bonos = new bonosCRUD();

    }
  }
?>