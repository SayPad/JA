<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <div class="modal-body">
        <div class="form-row justify-content-center">
            <h4 class="text-center">Actualizar porcentajes de deducciones</h4>
        </div>
      <div id="alert" style="text-align: center;"><img style="width: 100px;" id="imagenModificar" src="<?php echo constant('URL')?>public/img/carga.gif"> <span id="mensajesModificar"></span></div>
        <form action="#" method="POST" enctype="multipart/form-data" id="formularioModificar">
          <div class="form__box">
          

          <div class="row form-group">
            <label for="IvssModificar">IVSS:</label>
            <input type="text" name="ivss" id="IvssModificar" maxlength="3">
          </div>

          <div class="row form-group">
            <label for="RpeModificar">RPE:</label>
            <input type="text" name="rpe" id="RpeModificar"  maxlength="3">
          </div>

          <div class="row form-group">
            <label for="FaovModificar">FAOV:</label>
            <input type="text" name="faov" id="FaovModificar" maxlength="3">
          </div>

          <div class="row form-group">
            <label for="IncesModificar">INCES:</label>
            <input type="text" name="inces" id="IncesModificar"  maxlength="3">
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