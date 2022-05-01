<?php

  if(isset($_POST['btn'])){
      $contrasena1    = ($_POST['contrasena1'] !== "") ? $_POST['contrasena1'] : NULL ;
      if($this->model->cambiar($contrasena1)){
        
        $this->view->mensaje = 'Cambio de contraseña efectuado con exito.';
        $this->view->render('login/index');

      }
      else{
        $this->view->mensaje = 'No se pudo realizar el cambio de contraseña.';
        $this->view->render('login/index');
      }


      }


?>