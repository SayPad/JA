<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <div class="modal-body">
        <div class="form-row justify-content-center">
            <h4 class="text-center">Datos del Trabajador</h4>
        </div>
      <div id="alert" style="text-align: center;"><img style="width: 100px;" id="imagenModificar" src="<?php echo constant('URL')?>public/img/carga.gif"> <span id="mensajesModificar"></span></div>
        <form action="#" method="POST" enctype="multipart/form-data" id="formularioModificarTrabajadores">
          <div class="form__box">
          
          <div class="row form-group">
            <label for="modificar_cedula">Cedula:</label>
            <input type="text" name="cedula" id="modificar_cedula" readonly>
          </div>
          <div class="row form-group">
            <label for="modificar_nombre">Nombre:</label>
            <input type="text" name="nombre" id="modificar_nombre"  maxlength="30">
          </div>
          <div class="row form-group">
            <label for="modificar_apellido">Apellido:</label>
            <input type="text" name="apellido" id="modificar_apellido" maxlength="30">
          </div>
          <div>
                <label for="cargo_modificar">Cargo</label>
                <select class="select"  id="cargo_modificar" name="cargo">
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
          <div class="row form-group">
            <label for="modificar_correo">Correo:</label>
            <input type="text" name="correo" id="modificar_correo"  maxlength="50">
          </div>
          <div class="row form-group">
            <label for="modficiar_fecha_ingreso">Fecha de ingreso:</label>
            <input type="date" name="fecha_ingreso" id="modficiar_fecha_ingreso" >
          </div>
          
        </form>
      </div>
      </div>
      <div class="modal-footer">
      <button type="submit" name="modificar"  value="modificar" id="submitModificar">Modificar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>