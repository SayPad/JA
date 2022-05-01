<?php
require 'libs/classes/roles.class.php';



require 'libs/classes/usuarios.class.php';
require 'source/usuarios/CRUD.php';


require 'libs/classes/nomina.class.php';
require 'libs/classes/trabajadores.class.php';
require 'source/nominas/CRUD.php';
require 'source/trabajadores/CRUD.php';
  class UsuariosModel extends Model {
    public $usuarios;

    public $nominas;
    public $trabajadores;
    
    function __construct() {
        parent::__construct();
        $this->usuarios = new usuariosCRUD();

        $this->nominas = new nominasCRUD();
        $this->trabajadores = new trabajadoresCRUD();
    }

  }

?>