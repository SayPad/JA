<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link href="<?php echo constant('URL')?>public/img/icono.png" rel="shortcut icon" type="image/x-icon" />
  <title>J&A | Permisos</title>
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <!-- Uso esta clase por el fondo rojo -->
  <?php require 'views/header.php'; ?> <!-- MENU -->
  <?php require 'views/menu.php'; ?>
  <div class="container">

    <main>
         <div class="text-header">
            <h2>Actualizar permiso de <?php echo $this->permiso->getNombre() . ' ' . $this->permiso->getApellido();?></h2> 
        </div>

      <div class="modal-container">
        <?php include 'views/errores/mensaje.php'?>
        
      </div>
        <form action="<?php echo constant('URL')?>permiso/modificarPermiso" method="POST" class="form" onsubmit = "return validar();">
        <div class="form__box ">
          <div>
            <label for="id">Id del permiso:</label>
            <input type="text" name="id" id="id" value="<?php echo $this->permiso->getId();?>" readonly>
         </div>
         <div>
            <label for="desde">Desde:</label>
            <input type="date"  name="desde" id="desde" value="<?php echo $this->permiso->getDesde();?>">
         </div>
         <div>
            <label for="hasta">Hasta:</label>
            <input type="date"  name="hasta" id="hasta" value="<?php echo $this->permiso->getHasta();?>">
         </div>
         <div>
            <label for="descripcion">Descripcion:</label>
              <select class="select"  id="descripcion" name="descripcion">
                <option value="0">Seleccione</option>
                <option value="Reposo">Reposo</option>
                <option value="Permiso">Permiso</option>
                <option value="Falta">Falta</option>
              </select>      
          </div>
       
        </div>
        
        <div class="bottom">
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ayuda">Ayuda</button>
          <button type="submit" id="submit" name="modificarPermiso" value="modificarPermiso">Modificar permiso</button>
          <a href="<?php echo constant('URL')?>permiso" >Volver</a>
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
        Llene los siguientes campos para modificar este permiso.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
    </main>
  </div>
   <script src="<?php echo constant('URL')?>public/js/permiso/actualizar.js"></script>

  <script src="<?php echo constant('URL')?>public/js/jquery-3.2.1.js"></script>
  <script src="<?php echo constant('URL')?>public/js/main.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>