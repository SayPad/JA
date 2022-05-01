    <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-body">
        <div class="form-row justify-content-center">
        <h4 class="modal-title" id="myModalLabel">Llene los datos</h4>
      </div>
        <div id="alert" style="text-align: center;"><img style="width: 100px;" id="imagen" src="<?php echo constant('URL')?>public/img/carga.gif"> <span id="mensajes"></span></div>

        <form id="formulario" action="" method="POST" class="" onsubmit = "return validar();"> 

        <div class="form__box">
         <div class="">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" placeholder="Ingrese el nombre" maxlength="15">
         </div>
         <div class="">
                <label for="trabajador">Trabajadores</label>
                <select class="select"  id="trabajador" name="trabajador">
                  <option value="0">Seleccione</option>
                  <?php 
                    foreach($this->trabajadores as $row){
                      $trabajadores = new TrabajadoresClass();
                      $trabajadores = $row;
                 ?>
                <option value="<?php echo $trabajadores->getCedula()?>"><?php echo $trabajadores->getNombre() . ' ' . $trabajadores->getApellido(); ?></option>
                  <?php } ?>
                </select>
                <p></p>
            </div>

              <div class="">
                <label for="rol">Roles</label>
                <select class="select"  id="rol" name="rol">
                  <option value="0">Seleccione</option>
                  <?php 
                    foreach($this->roles as $row){
                      $roles = new RolesClass();
                      $roles = $row;
                 ?>
                <option value="<?php echo $roles->getId()?>"><?php echo $roles->getNombre_rol(); ?></option>
                  <?php } ?>
                </select>
                <p></p>
              </div>
         <div class="">
            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" id="contrasena" placeholder="Ingrese la contraseña" maxlength="32">
         </div>
         <div class="">
            <label for="contrasena2">Confirmar contraseña:</label>
            <input type="password" name="contrasena2" id="contrasena2" placeholder="repita la contraseña" maxlength="32">
         </div>
         
          </div>
        

      
      <div class="modal-footer">
        
        <button type="submit" name="agregar"  value="agregar" id="submit">Agregar</button>
        <a class="btn btn-default" href="<?php echo constant('URL')?>usuarios" >Volver</a>
      </div>
      </form> 
      </div>
    </div>
  </div>


