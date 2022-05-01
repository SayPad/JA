<div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-body">
        <h4 class="modal-title" id="myModalLabel">Llene los datos</h4>
        <div id="alert" style="text-align: center;"><img style="width: 100px;" id="imagen" src="<?php echo constant('URL')?>public/img/carga.gif"> <span id="mensajes"></span></div>
        <form id="formulario" action="" method="POST" class="" onsubmit = "return validar();"> 
        <div class="form__box">
          <div>
            <label for="nombre_bono">Nombre del bono:</label>
            <input type="text" name="nombre_bono" id="nombre_bono" maxlength="50">
          </div>
            <div>
            <label for="cargo">Cargo:</label>
             <select class="select"  id="cargo" name="cargo">
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
            <label for="moneda">Moneda:</label>
             <select class="select"  id="moneda" name="moneda">
                  <option value="0">Seleccione</option>
                  <option value="1">Divisas</option>
                  <option value="2">Bolivares</option>
                  
              </select>       
          </div>
          <div>
            <label for="valor">Valor:</label>
            <input type="text" name="valor" id="valor" maxlength="20">
         </div>
         <div>
            <label for="dias">Dias:</label>
            <input type="number" name="dias" id="dias" maxlength="5">
         </div>
          </div>
        
      <div class="modal-footer">
        <button type="submit" name="agregar"  value="agregar" id="submit">Agregar</button>
        <a class="btn btn-default" href="<?php echo constant('URL')?>bonos/indexBonos" >Volver</a>
      </div>
      </form> 
      </div>
    </div>
  </div>