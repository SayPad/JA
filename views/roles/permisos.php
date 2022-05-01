<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
 <link href="<?php echo constant('URL')?>public/img/icono.png" rel="shortcut icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>J&A | Roles</title>
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <!-- Uso esta clase por el fondo rojo -->
  <?php require 'views/header.php'; ?> <!-- MENU -->
  <?php require 'views/menu.php'; ?>
  <div class="container">

    <main>
   

      <div class="modal-container">
        <?php include 'views/errores/mensaje.php'?>
        
      </div>
        
<form action="<?php echo constant('URL')?>roles/operaciones" method="POST" class="form">
<div class="contenido">
  <div class="izquierda">
    <div class="titulo">Actualizar permisos del rol: <?php echo $this->roles->getNombre_rol();?></div>
    <label for="nombre_rol">Id del rol:</label>
    <input type="text" name="id_rol" id="id_rol" readonly  value="<?php echo $this->roles->getId();?>">
  </div>
  <div class="derecha">
      <div class="titulo">Permisos</div>
      <table class="tabla3">
            <tr>
              <th>Modulos</th>
              <th>Agregar</th>
              <th>Editar</th>
              <th>Eliminar</th>
              <th>Ver</th>
            </tr>
            <tr>
            <td>Usuarios</td>
              <td><input type="checkbox" name ="check_list[]" value="1"></td>
              <td><input type="checkbox" name ="check_list[]" value="2"></td>
              <td><input type="checkbox" name ="check_list[]" value="3"></td>
              <td><input type="checkbox" name ="check_list[]" value="4"></td>
            </tr>
            <td>Trabajadores</td>
              <td><input type="checkbox" name ="check_list[]" value="5"></td>
              <td><input type="checkbox" name ="check_list[]" value="6"></td>
              <td><input type="checkbox" name ="check_list[]" value="7"></td>
              <td><input type="checkbox" name ="check_list[]" value="8"></td>
            </tr>
            <td>Cargo</td>
              <td><input type="checkbox" name ="check_list[]" value="9"></td>
              <td><input type="checkbox" name ="check_list[]" value="10"></td>
              <td><input type="checkbox" name ="check_list[]" value="11"></td>
              <td><input type="checkbox" name ="check_list[]" value="12"></td>
            </tr>
            <td>Inasistencias</td>
              <td><input type="checkbox" name ="check_list[]" value="13"></td>
              <td><input type="checkbox" name ="check_list[]" value="14"></td>
              <td><input type="checkbox" name ="check_list[]" value="15"></td>
              <td><input type="checkbox" name ="check_list[]" value="16"></td>
            </tr>
            <td>Nominas</td>
              <td><input type="checkbox" name ="check_list[]" value="17"></td>
              <td><input type="checkbox" disabled></td>
              <td><input type="checkbox" name ="check_list[]" value="18"></td>
              <td><input type="checkbox" name ="check_list[]" value="19"></td>
            </tr>
            <td>Trabajos extras</td>
              <td><input type="checkbox" name ="check_list[]" value="20"></td>
              <td><input type="checkbox" disabled></td>
              <td><input type="checkbox" name ="check_list[]" value="21"></td>
              <td><input type="checkbox" name ="check_list[]" value="22"></td>
            </tr>
            <td>Bonos</td>
              <td><input type="checkbox" name ="check_list[]" value="23"></td>
              <td><input type="checkbox" disabled></td>
              <td><input type="checkbox" name ="check_list[]" value="24"></td>
              <td><input type="checkbox" name ="check_list[]" value="25" ></td>
            </tr>
            <td>Seguridad</td>
              <td><input type="checkbox" name ="check_list[]" value="26"></td>
              <td><input type="checkbox" name ="check_list[]" value="27"></td>
              <td><input type="checkbox" name ="check_list[]" value="28"></td>
              <td><input type="checkbox" name ="check_list[]" value="29"></td>
            </tr>
            <td>Reportes</td>
              <td><input type="checkbox" disabled ></td>
              <td><input type="checkbox" disabled ></td>
              <td><input type="checkbox" disabled ></td>
              <td><input type="checkbox" name ="check_list[]" value="30"></td>
            </tr>
            </table>
      
  </div>
</div>
<br>
<div class="bottom">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ayuda">Ayuda</button>
          <button type="submit" id="submit" name="actualizar" value="actualizar" onclick= "validarFormulario()">Actualizar</button>
          <a href="<?php echo constant('URL')?>roles/">Cancelar</a>
        </div>
</form>
             <!-- Modal -->
<div class="modal fade" id="ayuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      </div>
      <div class="modal-body">
        <h4 class="modal-title" id="myModalLabel">Ayuda de usuario</h4>
        Seleccione la accion que tendrá este rol en cada uno de los modulos. Si un modulo no tiene ningun chek entonces quedará restringido ese modulo para ese rol.
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
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>