<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <div class="modal-body">
        <div class="form-row justify-content-center">
            <h4 class="text-center">Datos de la inasistencia</h4>
        </div>
      <div id="alert" style="text-align: center;"><img style="width: 100px;" id="imagenModificar" src="<?php echo constant('URL')?>public/img/carga.gif"> <span id="mensajesModificar"></span></div>
        <form action="#" method="POST" enctype="multipart/form-data" id="formularioModificarPermiso">
          <div class="form__box">
          <div class="row form-group">
            <label for="idPermiso">id:</label>
          <input type="text" name="id" id="idPermiso" readonly>
          </div>
          <div class="row form-group">
            <label for="datosTrabajador">Trabajador:</label>
            <input type="text" name="trabajador" id="datosTrabajador" readonly>
          </div>

          <div class="row form-group">
            <label for="desdeModificar">Desde:</label>
            <input type="date" name="desde" id="desdeModificar">
          </div>
          <div class="row form-group">
            <label for="hastaModificar">Hasta:</label>
            <input type="date" name="hasta" id="hastaModificar">
          </div>

          <div class="row form-group">
           <label for="descripcionModificar">Descripcion:</label>
              <select class="select"  id="descripcionModificar" name="descripcion">
                <option value="0">Seleccione</option>
                <option value="Reposo">Reposo</option>
                <option value="Permiso">Permiso</option>
                <option value="Falta">Falta</option>
              </select>  
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