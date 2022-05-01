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
          <label for="periodo_desde">Periodo (Desde):</label>
          <input type="date"  name="periodo_desde" id="periodo_desde">
         </div>
          <div>
          <label for="periodo_hasta">Periodo (Hasta):</label>
          <input type="date" name="periodo_hasta" id="periodo_hasta">
           </div>
             <div>
            <label for="horas_extras">Horas extras:</label>
            <input type="number" name="horas_extras" id="horas_extras" data-patron="^[0-9]$" placeholder="Colocar 0 si no hubo horas extras"  maxlength="2"> 
         </div>
         <div>
            <label for="pago">Metodo de pago:
            <br><br>
            <input type="radio" name="pago" id="pago1" value="EFECTIVO">Efectivo
             /
            <input type="radio" name="pago" id="pago2" value="TRANSFERENCIA">Transferencia
            </label>
         </div>
          <div>
            <label for="fecha_pago">Fecha de pago:</label>
            <input type="date" name="fecha_pago" id="fecha_pago">

         </div>
          </div>   
      <div class="modal-footer">
        <button type="submit" name="agregar"  value="agregar" id="submit">Agregar</button>
        <a class="btn btn-default" href="<?php echo constant('URL')?>nominas" >Volver</a>
      </div>
      </form> 
      </div>
    </div>
  </div>