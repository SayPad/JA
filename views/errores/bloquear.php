<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="<?php echo constant('URL')?>public/img/icono.png" rel="shortcut icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>J&A | Errores</title>
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/main.css">
</head>
<body>
  <!-- Uso esta clase por el fondo rojo -->
  <?php require 'views/header.php'; ?> <!-- MENU -->
  <?php require 'views/menu.php'; ?>
  <div class="container">
    <main>
        <div class="margen-top"> </div>
        <div class="text-header">
            <h2> Esta pagina está bloqueada <a class="mensaje-button" href="<?php echo constant('URL')?>" class="boton">Volver</a></h2>
            
        </div>
        <img src="<?php echo constant('URL')?>public/img/bloquear.png">
    </main>
  </div>
  <script src="<?php echo constant('URL')?>public/js/jquery-3.2.1.js"></script>
<script src="<?php echo constant('URL')?>public/js/main.js"></script>
</body>
</html>