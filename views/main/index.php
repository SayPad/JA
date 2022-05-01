<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href="<?php echo constant('URL')?>public/img/icono.png" rel="shortcut icon" type="image/x-icon" />
  <title>J&A | Inicio</title>

  <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/main.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<?php require 'views/header.php'; ?>
<?php require 'views/menu.php'; ?>
<main>
      <div class="margen-top"> </div>
        <div class="text-header">
            <h2>Bienvenido al sistema</h2> 
        </div>
<div class="contenido">
  <div class="izquierda">
    <div id="al" class="titulo"></div>
    <div class="tabla1" id="form">
      
      <div id="texto"></div>
    </div>
  </div>
  <div class="derecha">
      <div class="titulo">Registro de sistema</div>
        <table class="tabla2">
          <tr>
            <td><img src="<?php echo constant('URL')?>public/img/usuario.png"></td>
            <td><img src="<?php echo constant('URL')?>public/img/rol.png"></td>
            <td><img src="<?php echo constant('URL')?>public/img/trabajador.png"></td>
            <td><img src="<?php echo constant('URL')?>public/img/cargo.png"></td>
            <td><img src="<?php echo constant('URL')?>public/img/nomina.png"></td>
            <td><img src="<?php echo constant('URL')?>public/img/reposo.png"></td>
            <td><img src="<?php echo constant('URL')?>public/img/permiso.png"></td>
          </tr>
          <tr>
            <td>Usuarios: <?php echo $this->cantUsuario;?></td>
            <td>Roles: <?php echo $this->cantRoles;?></td>
            <td>Trabajadores: <?php echo $this->cantTrabajadores;?></td>
            <td>Cargos: <?php echo $this->cantCargo;?></td>
            <td>Nominas: <?php echo $this->cantNomina;?></td>
            <td>Reposos: <?php echo $this->cantReposo;?></td>
            <td>Permisos: <?php echo $this->cantPermiso;?></td>
          </tr>
        </table>
  </div>
</div>
<div class="contenido">
  <div class="izquierda">
    <div class="titulo">Actualizar valor</div>
    <div class="tabla" id="form">
      <table>
        <tr>
          <th>Precio del dolar:</th>
          <th>Ultima actualizacion:</th>
           <tbody >
              <?php
                foreach($this->dolar as $row){
                  $dolar = new DolarClass();
                  $dolar = $row;
              ?>
              </tr >
              <tr>
                <td><?php 
                 $format_dolar = $dolar->getPrecio_dolar();
                 echo $format_dolar = number_format($format_dolar, 2, ",", ".");
                ?></td>
                <td><?php echo $dolar->getFecha_actualizacion(); ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </tr>
        </table>
        
      <form action="<?php echo constant('URL')?>main/actualizarDolar" method="POST" class="form" onsubmit = "return validar();"> 
        <div class="form__box">
          <div><input type="text" name="actualizar" id="actualizar" placeholder="Formato XXXXXXX.'deciamles'"></div>
      
        <div class="bottom">
          <button type="submit" id="submit" name="actualizar_dolar" value="actualizar_dolar">Actualizar dolar</button>
        </div>
      </div>
      </form>
      </div>
    </div>
    <div class="derecha">
      <div class="titulo">Alertas del sistema</div>
        <div class="alerta-content">

              <?php
              if (sizeof($this->mensajeAlerta)) {

                foreach ($this->mensajeAlerta as $mensaje) {
                 ?>
                  <div class="alerta-mensaje">
                    <p class="titulo">Atencion!</p>
                    <p class="mensaje"><?php echo $mensaje;?></p>
                  </div>
                  <?php
                }
              } else {
                ?>
                <div class="alerta-mensaje">
                    <p class="titulo-bueno">Que bien!</p>
                    <p class="mensaje">No tienes alertas en el sistema.</p>
                  </div>
                <?php
              }
              ?>
            </div>
      </div>
  </div>
</main>
<script src="<?php echo constant('URL')?>public/js/main/main.js"></script>
<script src="<?php echo constant('URL')?>public/js/jquery-3.2.1.js"></script>
<script src="<?php echo constant('URL')?>public/js/main.js"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script  src="<?php echo constant('URL')?>public/js/script.js"></script>
</body>
</html>