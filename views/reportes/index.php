<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="<?php echo constant('URL')?>public/img/icono.png" rel="shortcut icon" type="image/x-icon" />
  <title>J&A | Reportes</title>

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
            <h2>Gestion de reportes</h2> 
        </div>

        <div class="tabla" id="form" >
      <div>
          <table id="datatableid">
            
            <thead>
              <tr> 
                <th>Reporte</th>
                <th>Formato PDF</th>
                <th>Formato estadistico</th>
              </tr >
            </thead>
     
            <tbody id="tbody-trabajador">
                
              <tr id="fila-">
                <td>Nominas</td>
                <td><div class="bottom"><a href="<?php echo constant('URL')?>reportes/nomina2"  target="_blank">Generar reporte</a></div></td>
                <td></td>
              </tr>

              <tr id="fila-">
                <td>Bonos</td>
                <td><div class="bottom"><a href="<?php echo constant('URL')?>reportes/bonos"  target="_blank">Generar reporte</a></div></td>      
                <td></td>          
              </tr>

              <tr id="fila-">
                <td>Trabajos Extras</td>
                <td><div class="bottom"><a href="<?php echo constant('URL')?>reportes/trabajosExtras"  target="_blank">Generar reporte</a></div></td> 
                <td></td>              
              </tr>

              <tr id="fila-">
                <td>Inasistecias</td>
                <td><div class="bottom"><a href="<?php echo constant('URL')?>reportes/inasistencias"  target="_blank">Generar reporte</a></div></td>
                <td><div class="bottom"><a href="<?php echo constant('URL')?>reportes/consulta_inasistencia" >Generar reporte estadistico</a></div></td>
              </tr>
                       
              <div class="bottom">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ayuda">Ayuda</button>
              <a href="<?php echo constant('URL')?>">Volver</a> 
            </div>              

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
        Se muestra una lista de los reportes que se pueden generar en pdf. Ademas de poder generar un reporte estadistico del modulo de inasistencias.
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
