<!DOCTYPE html> <html> <head> <link href="<?php echo constant
('URL')?>public/img/icono.png" rel="shortcut icon" type="image/x-icon" />
<link rel="stylesheet" href="<?php echo constant
('URL')?>public/css/login.css"> <title>J&A | Inicio de sesion</title> </head>
<body> <header> <div class="wrapper"> <div><img class="img-logo" src="<?php
echo constant('URL')?>public/img/logo.png"></div> <div class="logo"
id="fuente">Chirinos Instalaciones C.A</div> <hr class="linea-logo"> <div
class="detalles" id="fuente">Montajes electricos, mecanicos y civiles</div>
<div class="rif" id="fuente">Rif J-407400282</div> <nav> <a href="Manual.pdf"
target="blank" title="Manual del sistema">Manual</a> </nav> </div> </header>
<link href='https://fonts.googleapis.com/css?family=Montserrat'
rel='stylesheet' type='text/css'>

<div class="login">
  <h2 class="active"> J&ACHIRINOS INSTALACIONES C.A </h2>
 
  <span class="direccion">Domicilio fiscal: Cr. 2 con Av. Rotaría y calle 3 casa nro 63-73 sector Brisas del Obelisco Barquisimeto - Lara zona postal 3001</span>

  <form action="<?php echo constant('URL')?>login" method="POST">
     
        <?php
        if (isset($this->mensaje) ) {
          ?>
          <h3 id="mensaje"> <?php echo $this->mensaje; ?></h3>
          <?php
        }else{
          ?><h3 id="mensaje">Ingrese los siguientes datos</h3><?php
        } ?>
    <input type="text" class="text" name="usuario">
     <span>Usuario</span>

    <br>
    
    <input type="password" class="text" name="contrasena">
    <span>Contraseña</span>
    <br>


    
    <button type="submit" name="ingresar" value="ingresar" class="signin">
      Iniciar Sesion
    </button>


    <hr class="linea">

    <a class="link" href="<?php echo constant('URL')?>restaurar">Recuperar contraseña</a>
  </form>

</div>
</body>
</html>