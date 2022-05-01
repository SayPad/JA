<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <div class="modal-body">
        <div class="form-row justify-content-center">
            <h4 class="text-center">Datos del cargo</h4>
        </div>
      <div id="alert" style="text-align: center;"><img style="width: 100px;" id="imagenModificar" src="<?php echo constant('URL')?>public/img/carga.gif"> <span id="mensajesModificar"></span></div>
        <form action="#" method="POST" enctype="multipart/form-data" id="formularioActualizarCargo">
          <div class="form__box">
          

          <div class="row form-group">
            <label for="cargo">Nombre de cargo:</label>
            <input type="text" name="cargo" id="cargo" placeholder="Ingrese el nombre" readonly>
          </div>
          <div class="row form-group">
            <label for="sueldo_semanal">Sueldo semanal:</label>
            <input type="text" name="sueldo_semanal" id="sueldo_semanal" maxlength="20">
          </div>
          <div class="row form-group">
            <label for="prima_hogar">Prima por hogar:</label>
            <input type="text" name="prima_hogar" id="prima_hogar" maxlength="20">
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