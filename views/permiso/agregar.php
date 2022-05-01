<div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-body">
        <h4 class="modal-title" id="myModalLabel">Llene los datos</h4>
        <div id="alert" style="text-align: center;"><img style="width: 100px;" id="imagen" src="<?php echo constant('URL')?>public/img/carga.gif"> <span id="mensajes"></span></div>
        <form id="formulario" action="" method="POST" class="" onsubmit = "return validar();"> 
        <div class="form__box">
          <div>
            <label for="trabajador">Trabajador:</label>
              <select class="select"  id="trabajador" name="trabajador">
                <option value="0">Seleccione</option>
                  <?php 
                    foreach($this->trabajadores as $row){
                      $trabajador = new TrabajadoresClass();
                      $trabajador = $row;
                  ?>
                <option value="<?php echo $trabajador->getCedula()?>">
                <?php echo $trabajador->getNombre().' '.$trabajador->getApellido(); ?></option>
                <?php } ?>
              </select>      
          </div>
          <div>
            <label for="descripcion">Descripcion:</label>
              <select class="select"  id="descripcion" name="descripcion">
                <option value="0">Seleccione</option>
                <option value="Reposo">Reposo</option>
                <option value="Permiso">Permiso</option>
                <option value="Falta">Falta</option>
              </select>      
          </div> 
         <div>
            <label for="desde">Desde:</label>
            <input type="date" name="desde" id="desde">
         </div>
         <div>
            <label for="hasta">Hasta: </label>
            <input type="date" name="hasta" id="hasta">
         </div>
        </div>
      <div class="modal-footer">
        
        <button type="submit" name="agregar"  value="agregar" id="submit">Agregar</button>
        <a class="btn btn-default" href="<?php echo constant('URL')?>permiso" >Volver</a>
      </div>
      </form> 
      </div>
    </div>
  </div>