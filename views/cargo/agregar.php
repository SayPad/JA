<div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-body">
        <h4 class="modal-title" id="myModalLabel">Llene los datos</h4>
        <div id="alert" style="text-align: center;"><img style="width: 100px;" id="imagen" src="<?php echo constant('URL')?>public/img/carga.gif"> <span id="mensajes"></span></div>
        <form id="formulario" action="" method="POST" class="" onsubmit = "return validar();"> 
        <div class="form__box">
         
          <div>
            <label for="nombre">Nombre del cargo:</label>
            <input type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre del cargo"  maxlength="30">
         </div>
         <div>
            <label for="sueldo">Sueldo semanal:</label>
            <input type="text" name="sueldo" id="sueldo" placeholder="ingrese el sueldo"  maxlength="20">
         </div>
         <div>
            <label for="prima">Prima por hogar:</label>
            <input type="text" name="prima" id="prima" placeholder="Ingrese la cantidad"  maxlength="20">
         </div>
         
          </div>
        <div class="modal-footer">
        <button type="submit" name="agregar"  value="agregar" id="submit">Agregar</button>
        <a class="btn btn-default" href="<?php echo constant('URL')?>cargo" >Volver</a>
      </div>
      </form> 
      </div>
    </div>
  </div>