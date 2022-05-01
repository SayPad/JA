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
            <label for="descripcion_trabajo">Descripcion general:</label>
            <textarea name="descripcion_trabajo" id="descripcion_trabajo" maxlength="210"></textarea>
          </div>
         <div>
          <label for="fecha_trabajo">Fecha del trabajo:</label>
          <input type="date"  name="fecha_trabajo" id="fecha_trabajo" value="0">
         </div>
          <div>
            <label for="tipo_pago">Metodo de pago:
            <br><br>
            <input type="radio" name="tipo_pago" id="tipo_pago1" value="EFECTIVO">Efectivo
             /
            <input type="radio" name="tipo_pago" id="tipo_pago2" value="TRANSFERENCIA">Transferencia
            </label>
        </div>
        <div>
            <label for="fecha_pago">Fecha de pago:</label>
            <input type="date" name="fecha_pago" id="fecha_pago">
        </div>
        <div>
            <label for="descripcion">Descripcion:</label>
            <input type="text" name="descripcion" id="descripcion"  maxlength="50">
        </div>
        <div>
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" data-patron="^[0-9]$" id="cantidad"  maxlength="20">
         </div>
         <div>
            <label for="pago">Pago por unidad($):</label>
            <input type="number" name="pago" data-patron="^[0-9]$" id="pago"  maxlength="20">
         </div>
         
          </div>
      <div class="modal-footer">
        <button type="submit" name="agregar"  value="agregar" id="submit">Agregar</button>
        <a class="btn btn-default" href="<?php echo constant('URL')?>trabajos_extras" >Volver</a>
      </div>
      </form> 
      </div>
    </div>
  </div>