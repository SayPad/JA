<?php
  class Database {
      
      private $host;
      private $db;
      private $user;
      private $pass;
      private $charset;
    
      function __construct () {
        $this->host = constant('HOST');
        $this->db = constant('DBNAME');
        $this->user = constant('USER');
        $this->pass = constant('PASS');
        $this->charset = constant('CHARSET');
      }

      function connect () {
          try {

            $conexion = 'mysql:host='. $this->host .';dbname='. $this->db;
            $opciones = [
                PDO::ATTR_ERRMODE           => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES  => false,
            ];
            $pdo = new PDO($conexion, $this->user, $this->pass, $opciones);

            return $pdo;

          } catch (PDOException $e){
           print_r('Error de conexion: '. $e->getMessage()); 
          }
      }
  }


?>