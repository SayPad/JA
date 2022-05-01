<?php

  require 'libs/classes/usuarios.class.php';
  require 'libs/classes/trabajadores.class.php';

  class RestaurarModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function usuarioExiste ($nombre, $apellido, $cedula) {
 
      try {
        $query = $this->db->connect()->prepare('SELECT * FROM trabajadores WHERE nombre = :nombre AND apellido = :apellido AND cedula = :cedula AND status = 1');

         $query->execute(['nombre' => $nombre,'apellido' => $apellido,  'cedula' => $cedula]);

         if ( $query->rowCount() ) {
          return true;

         } else {
          return false;
         }

      } catch (PDOException $e) {
        return false;
      }
    }
    function cambiar($contrasena, $cuenta){
       try {
        $query = $this->db->connect()->prepare('UPDATE usuarios INNER JOIN trabajadores ON usuarios.id_trabajador = trabajadores.id_trabajador SET contrasena = md5(:contrasena) WHERE cedula = :cedula AND usuarios.status = 1');
         
        $query->execute(['contrasena' => $contrasena, 'cedula' => $cuenta]);

        return true;
      } catch (PDOException $e) {
        echo "Error en: ".$e;
        return false;
      }

    }
}

?> 