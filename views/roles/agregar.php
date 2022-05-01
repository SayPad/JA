<div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-body">
        <h4 class="modal-title" id="myModalLabel">Llene los datos</h4>
        <div id="alert" style="text-align: center;"><img style="width: 100px;" id="imagen" src="<?php echo constant('URL')?>public/img/carga.gif"> <span id="mensajes"></span></div>
        <form id="formulario" action="" method="POST" class="" onsubmit = "return validar();"> 
          <div class="contenido">
 
    <label for="nombre_rol">Nombre del rol:</label>
    <input type="text" name="nombre_rol" id="nombre_rol" placeholder="Ingrese el nombre">


      <table class="tabla3">
            <tr>
              <th>Modulos</th>
              <th>Agregar</th>
              <th>Editar</th>
              <th>Eliminar</th>
              <th>Ver</th>
            </tr>
            <tr>
            <td>Usuarios</td>
              <td><input type="checkbox" name ="check_list[]" value="1"></td>
              <td><input type="checkbox" name ="check_list[]" value="2"></td>
              <td><input type="checkbox" name ="check_list[]" value="3"></td>
              <td><input type="checkbox" name ="check_list[]" value="4"></td>
            </tr>
            <td>Trabajadores</td>
              <td><input type="checkbox" name ="check_list[]" value="5"></td>
              <td><input type="checkbox" name ="check_list[]" value="6"></td>
              <td><input type="checkbox" name ="check_list[]" value="7"></td>
              <td><input type="checkbox" name ="check_list[]" value="8"></td>
            </tr>
            <td>Cargo</td>
              <td><input type="checkbox" name ="check_list[]" value="9"></td>
              <td><input type="checkbox" name ="check_list[]" value="10"></td>
              <td><input type="checkbox" name ="check_list[]" value="11"></td>
              <td><input type="checkbox" name ="check_list[]" value="12"></td>
            </tr>
            <td>Inasistencias</td>
              <td><input type="checkbox" name ="check_list[]" value="13"></td>
              <td><input type="checkbox" name ="check_list[]" value="14"></td>
              <td><input type="checkbox" name ="check_list[]" value="15"></td>
              <td><input type="checkbox" name ="check_list[]" value="16"></td>
            </tr>
            <td>Nominas</td>
              <td><input type="checkbox" name ="check_list[]" value="17"></td>
              <td><input type="checkbox" disabled></td>
              <td><input type="checkbox" name ="check_list[]" value="18"></td>
              <td><input type="checkbox" name ="check_list[]" value="19"></td>
            </tr>
            <td>Trabajos extras</td>
              <td><input type="checkbox" name ="check_list[]" value="20"></td>
              <td><input type="checkbox" disabled></td>
              <td><input type="checkbox" name ="check_list[]" value="21"></td>
              <td><input type="checkbox" name ="check_list[]" value="22"></td>
            </tr>
            <td>Bonos</td>
              <td><input type="checkbox" name ="check_list[]" value="23"></td>
              <td><input type="checkbox" disabled></td>
              <td><input type="checkbox" name ="check_list[]" value="24"></td>
              <td><input type="checkbox" name ="check_list[]" value="25" ></td>
            </tr>
            <td>Seguridad</td>
              <td><input type="checkbox" name ="check_list[]" value="26"></td>
              <td><input type="checkbox" name ="check_list[]" value="27"></td>
              <td><input type="checkbox" name ="check_list[]" value="28"></td>
              <td><input type="checkbox" name ="check_list[]" value="29"></td>
            </tr>
            <td>Reportes</td>
              <td><input type="checkbox" disabled ></td>
              <td><input type="checkbox" disabled ></td>
              <td><input type="checkbox" disabled ></td>
              <td><input type="checkbox" name ="check_list[]" value="30"></td>
            </tr>
            </table>
      
  
</div>
        <div class="modal-footer">
        <button type="submit" name="agregar"  value="agregar" id="submit">Agregar</button>
        <a class="btn btn-default" href="<?php echo constant('URL')?>roles" >Volver</a>
      </div>
      </form> 
      </div>
    </div>
  </div>