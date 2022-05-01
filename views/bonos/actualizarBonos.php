<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <div class="modal-body">
        <div class="form-row justify-content-center">
            <h4 class="text-center">Datos del Bono</h4>
        </div>
      <div id="alert" style="text-align: center;"><img style="width: 100px;" id="imagenModificar" src="<?php echo constant('URL')?>public/img/carga.gif"> <span id="mensajesModificar"></span></div>
        <form action="#" method="POST" enctype="multipart/form-data" id="formularioModificarBonos">
          <div class="form__box">
          

          <div class="row form-group">
            <label for="nombre_bonoModificar">Nombre del bono:</label>
            <input type="text" name="nombre_bono" id="nombre_bonoModificar" readonly>
          </div>
          <div>
            <label for="cargoModificar">Cargo:</label>
             <select class="select"  id="cargoModificar" name="cargo">
                  <option value="0">Seleccione</option>
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
            <label for="monedaModificar">Moneda:</label>
             <select class="select"  id="monedaModificar" name="moneda">
                  <option value="0">Seleccione</option>
                  <option value="1">Divisas</option>
                  <option value="2">Bolivares</option>
                  
              </select>       
          </div>
          <div class="row form-group">
            <label for="valorModificar">Valor:</label>
            <input type="text" name="valor" id="valorModificar" maxlength="20">
          </div>
          <div class="row form-group">
            <label for="diasModificar">Dias:</label>
            <input type="number" name="dias" id="diasModificar" maxlength="20">
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