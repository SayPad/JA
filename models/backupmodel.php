<?php
  require 'source/backup/CRUD.php';
  class backupModel extends Model {

    public $backup;

    function __construct() {
        parent::__construct();
        $this->backup = new backupCRUD();
    }

  }
?>