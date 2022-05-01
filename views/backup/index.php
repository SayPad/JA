<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link href="<?php echo constant('URL')?>public/img/icono.png" rel="shortcut icon" type="image/x-icon" />
	<title>J&A | Respaldo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/main.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php require 'views/header.php'; ?> 
<?php require 'views/menu.php'; ?>
  <div class="container">
	<main> 
		<div class="text-header">
            <h2> <?php echo $this->mensaje ?> </h2> 
     </div>
	<form action="<?php echo constant('URL')?>backup/restore" method="POST" class="form">
		<div class="bottom">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ayuda">Ayuda</button>
		<a href="<?php echo constant('URL')?>backup/respaldo">Realizar copia de seguridad</a>
		</div>
		<div class="form_box">		
		
		<label> <h4>Selecciona un punto de restauración</h4></label>
		<select name="restorePoint">
			<option value="" disabled="" selected="">Selecciona un punto de restauración</option>
			<?php
				include_once './models/Connet.php';
				$ruta=BACKUP_PATH;
				if(is_dir($ruta)){
				    if($aux=opendir($ruta)){
				        while(($archivo = readdir($aux)) !== false){
				            if($archivo!="."&&$archivo!=".."){
				                $nombrearchivo=str_replace(".sql", "", $archivo);
				                $nombrearchivo=str_replace("-", ":", $nombrearchivo);
				                $ruta_completa=$ruta.$archivo;
				                if(is_dir($ruta_completa)){
				                }else{
				                    echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
				                }
				            }
				        } 
				        closedir($aux);
				    }
				}else{
				    echo $ruta." No es ruta válida";
				}
			?>
		</select>
		</div>
		<div class="bottom">
		<button type="submit" >Restaurar</button>
		</div>
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
        Llene los siguientes campos para registrar a un usuario, si se intenta ingresar un nombre de usuario ya existente en la base de datos, el sistema no dejará registrarlo.
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
