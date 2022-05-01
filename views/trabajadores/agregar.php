    <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-body">
        <h4 class="modal-title" id="myModalLabel">Llene los datos</h4>
        <div id="alert" style="text-align: center;"><img style="width: 100px;" id="imagen" src="<?php echo constant('URL')?>public/img/carga.gif"> <span id="mensajes"></span></div>
        <form id="formulario" action="" method="POST" class="" onsubmit = "return validar();"> 
        <div class="form__box">
          <div>
            <label for="cedula">Cedula:</label>
            <input type="number"  name="cedula" id="cedula" placeholder="Ingrese la cedula de indentidad">
         </div>
          <div>
                <label for="cargo">Cargo</label>
                <select class="select"  id="cargo" name="cargo">
                  <option value="">Seleccione</option>
                  <?php 
                    foreach($this->cargos as $row){
                      $cargos = new CargoClass();
                      $cargos = $row;
                 ?>
                <option value="<?php echo $cargos->getId()?>"><?php echo $cargos->getNombre_cargo(); ?></option>
                  <?php } ?>
                </select>         
        </div>
          <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre" maxlength="30">

         </div>
         <div>
            <label for="apellido">Apellido:</label>
            <input type="text"  name="apellido" id="apellido" placeholder="Ingrese el apellido" maxlength="30">
         </div>
     
          <div>
            <label for="correo">Correo:</label>
            <input type="text" name="correo" id="correo" placeholder="Ingrese el correo" maxlength="50">
         </div>
          <div>
            <label for="fecha">Fecha de ingreso</label>
            <input type="date" name="fecha" id="fecha">
          </div>
         
         
          </div>
        
      <div class="modal-footer">
        
        <button type="submit" name="agregar"  value="agregar" id="submit">Agregar</button>
        <a class="btn btn-default" href="<?php echo constant('URL')?>trabajadores" >Volver</a>
      </div>
      </form> 
      </div>
    </div>
  </div>