<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="<?php echo constant('URL')?>public/img/icono.png" rel="shortcut icon" type="image/x-icon" />
  <title>J&A | Bitacora</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/main.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
  <!-- Uso esta clase por el fondo rojo -->
  <?php require 'views/header.php'; ?> 
  <?php require 'views/menu.php'; ?>
  <div class="container">

    <main>
        <div class="margen-top"> </div>
        <div class="text-header">
            <h2>Gestion de bitacora</h2> 
        </div>

    <div class="tabla" id="form">
      <div>
          <table id="datatableid">
            <div class="bottom">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ayuda">Ayuda</button>
              <a href="<?php echo constant('URL')?>">Volver</a>
            </div>
            <thead>
            <tr>
              <th>Usuario</th>
              <th>Operacion</th>
              <th>Tabla</th>
              <th>Fecha</th>               

            </tr>
            </thead>
     
            <tbody id="tbody-bitacora">
              <?php
                foreach($this->bitacora as $row){
                  $bitacora = new BitacoraClass();
                  $bitacora = $row;
              ?>
               
              <tr id="fila-<?php echo $bitacora->getIdBitacora(); ?>">
                <td><?php echo $bitacora->getUsuario(); ?></td>
                <td><?php echo $bitacora->getOperacion(); ?></td>
                <td><?php echo $bitacora->getTabla(); ?></td>
                <td><?php echo $bitacora->getFecha(); ?></td>
                
                </tr>
              <?php } ?>
            </tbody>
          </table>
      </div>
      </div>        
      </div>
            <!-- Modal -->
<div class="modal fade" id="ayuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      </div>
      <div class="modal-body">
        <h4 class="modal-title" id="myModalLabel">Ayuda de usuario</h4>
        Se muestra una lista del historial de acciones que han habido en el sistema, indicando el usuario que hizo la accion, la hora y fecha en la que se hizo, ademas de indicar que tabla de la base de datos fue la que recibi?? la acci??n.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
    </main>
  </div>
  
  <script src="<?php echo constant('URL')?>public/js/jquery-3.2.1.js"></script>
  <script src="<?php echo constant('URL')?>public/js/main.js"></script>
   <script src="<?php echo constant('URL')?>public/js/AJAX/eliminar.js"></script>
   <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
   $(document).ready(function() {
      $('#datatableid').DataTable({
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
      });
    });
   </script>
</body>
</html>
