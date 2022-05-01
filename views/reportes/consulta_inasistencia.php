<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="<?php echo constant('URL')?>public/img/icono.png" rel="shortcut icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>J&A | Reportes</title>
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/main.css">
</head>
<body>
  <!-- Uso esta clase por el fondo rojo -->
  <?php require 'views/header.php'; ?> <!-- MENU -->
  <?php require 'views/menu.php'; ?>
  <div class="container">
    <main>
    <form action="<?php echo constant('URL')?>reportes/consultar" method="POST" id="consultar_inasistencias">
        <table class="tabla">
         <tr>
           <td><input type='date' placeholder='Fecha Inicio' name="desde" id="consultaDesde"></td>
           <td><input type='date' placeholder='Fecha fin' name="hasta" id="consultaHasta"></td>
           <td>
           <label for="consultar_descripcion">Descripcion:</label>
              <select class="select"  id="consultar_descripcion" name="descripcion">
                <option value="0">Seleccione</option>
                <option value="Reposo">Reposo</option>
                <option value="Permiso">Permiso</option>
                <option value="Falta">Falta</option>
            </select>
            </td>
           <td><input type="submit" name="buscar" value="Enviar" class="button"></td>
           <td> <div class="bottom"><a href="<?php echo constant('URL')?>reportes">Volver</a></div> </td>
         </tr>
        </table>
      </form>


    </main>
  </div>
   <script src="<?php echo constant('URL')?>public/js/jquery-3.2.1.js"></script>
  <script src="<?php echo constant('URL')?>public/js/main.js"></script>
  <script src="<?php echo constant('URL')?>public/js/AJAX/reportes.js"></script>

</body>
</html>
