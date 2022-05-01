<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$campana = "campana.png";
  require_once 'libs/database.php';
  require_once 'libs/model.php';
  require_once 'libs/controller.php';
  require_once 'libs/view.php';

  require_once 'config/config.php';

  require_once 'libs/app.php';
  
  session_start();

  $app = new App();
?>