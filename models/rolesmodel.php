
<?php
 require 'libs/classes/roles.class.php';
 require 'source/roles/CRUD.php';
 

  class RolesModel extends Model {

    public $roles;

    function __construct() {
        parent::__construct();
        $this->roles = new rolesCRUD();

    }

  }

?>