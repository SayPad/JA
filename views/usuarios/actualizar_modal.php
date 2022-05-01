<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <div class="modal-body">
        <div class="form-row justify-content-center">
            <h4 class="text-center">Datos Personales</h4>
        </div>
      <div id="alert" style="text-align: center;"><img style="width: 100px;" id="imagenModificar" src="<?php echo constant('URL')?>public/img/carga.gif"> <span id="mensajesModificar"></span></div>
        <form action="#" method="POST" enctype="multipart/form-data" id="formularioModificarUsuario">
          <div class="form__box">
          

          <div class="row form-group">
            <label for="usuarioModificar">Usuario:</label>
            <input type="text" name="usuario" id="usuarioModificar" placeholder="Ingrese el nombre" readonly>
          </div>

          <div class="row form-group">
            <label for="trabajadorModificar">Trabajadores</label>
            <select class="select"  id="trabajadorModificar" name="trabajador">
              <option value="0">Seleccione</option>
              
              <?php foreach ($this->trabajadores as $row): 
                $trabajadores = new TrabajadoresClass();
                $trabajadores = $row; ?>
                <option value="<?= $trabajadores->getCedula()?>"><?= $trabajadores->getNombre() . ' ' . $trabajadores->getApellido(); ?></option>
              <?php endforeach; ?>
            </select>
            <p></p>
          </div>

          <div class="row form-group">
            <label for="rolModificar">Roles</label>
            <select class="select"  id="rolModificar" name="rol">
              <option value="0">Seleccione</option>
              <?php foreach ($this->roles as $row): 
                $roles = new RolesClass();
                $roles = $row; ?>
                <option value="<?php echo $roles->getId()?>"><?php echo $roles->getNombre_rol(); ?></option>
              <?php endforeach; ?>
            </select>
            <p></p>
          </div>

          <div class="row form-group">
            <label for="contrasenaModificar">Nueva Contraseña:</label>
            <input type="password" name="contrasena" id="contrasenaModificar" placeholder="Ingrese la contraseña" maxlength="32">
          </div>

          <div class="row form-group">
            <label for="contrasena2Modificar">Confirmar Nueva Contraseña:</label>
            <input type="password" name="contrasena2" id="contrasena2Modificar" placeholder="Confirme la contraseña" maxlength="32">
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