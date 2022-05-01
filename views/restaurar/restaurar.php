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
        } ?>
        <form class="restaurar__form" method="POST" name="formulario" action="<?php echo constant('URL')?>restaurar/actualizar" onsubmit = "return validar();">
        <h1>Ingrese la nueva contraseña para este usuario</h1>
        <br>
        <br>
        C.I de usuario
          <input class="text" type="text" name="cuenta" value="<?php echo $_SESSION['restaurarUsuario'];?>" id="cuenta" disabled/>
          <br>
        Ingrese la nueva contraseña
          <input class="text" type="password" name="contrasena1" placeholder="Nueva contraseña" id="contrasena1"/>
          <br>
        Repita la contraseña
          <input class="text" type="password" name="contrasena2" placeholder="Confirme la contraseña" id="contrasena2"/>
          <br>

          <br>
          <input type="submit" name="btn" id="btn"  class="signin" value="Actualizar" >
          <hr class="linea">
              <a class="link" href="<?php echo constant('URL')?>login">Volver</a>  
        </form>

</div> 
<script src="<?php echo constant('URL')?>public/js/restaurar/index.js"></script>
</body>
</html>
