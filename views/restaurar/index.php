<!DOCTYPE html>
<html>
<head>
    <link href="<?php echo constant('URL')?>public/img/icono.png" rel="shortcut icon" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/login.css">
  <title>J&A | Recuperar contraseña</title>
</head>
 
<body>
<header>

    <div class="wrapper">
      <div><img class="img-logo" src="<?php echo constant('URL')?>public/img/logo.png"></div>
      <div class="logo" id="fuente">Chirinos Instalaciones C.A</div>
      <hr class="linea-logo">
      <div class="detalles" id="fuente">Montajes electricos, mecanicos y civiles</div>
      <div class="rif" id="fuente">Rif J-407400282</div>
      

      <nav>
        <a href="Manual.pdf" target="blank" title="Manual del sistema">Manual</a>
        <a href="<?php echo constant('URL')?>login">Login</a>
      </nav>
    </div>
  </header>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

<div class="login">
         <?php
        if (isset($this->mensaje) ) {
          ?>
          <h2 id="mensaje"> <?php echo $this->mensaje; ?> </h2>
          <?php
        }else{
          ?><h2 id="mensaje">Ingrese los siguientes datos para efectuar el cambio de contraseña</h2><?php
        } ?>
        <form class="restaurar__form" method="POST" name="formulario" onsubmit = "return validar();">
          <br>
          Nombre
          <input
            class="text"
            type="text"
            name="nombre"
            placeholder="Nombre"
            id="nombre"
          />
          <br> 
          Apellido
          <input
            class="text"
            type="text"
            name="apellido"
            placeholder="Apellido"
            id="apellido"
          />
          <br>
          Cedula
          <input
            class="text"
            type="text"
            name="cedula"
            placeholder="Cedula"
            id="cedula"
          />
          <br> 
          <button type="submit" name="ingresar" class="signin" value="ingresar">Restaurar contraseña</button>
          <br> 
          <hr class="linea">
              <a class="link" href="<?php echo constant('URL')?>login">Volver</a>  
        </form>

</div> 
<script src="<?php echo constant('URL')?>public/js/restaurar/actualizar.js"></script>
</body>
</html>






