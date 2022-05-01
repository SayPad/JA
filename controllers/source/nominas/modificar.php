<?php 
sleep(1);

        $id = 1;
        $ivss = ($_POST['ivss'] !== "") ? $_POST['ivss'] : NULL;
        $rpe        = ($_POST['rpe'] !== "") ? $_POST['rpe'] : NULL;
        $faov     = ($_POST['faov'] !== "") ? $_POST['faov'] : NULL;
        $inces     = ($_POST['inces'] !== "") ? $_POST['inces'] : NULL;
  
  
        if ($this->model->nominas->update(['id'=>$id, 'ivss'=>$ivss,'rpe'=>$rpe, 'faov'=>$faov, 'inces'=>$inces])){
          $this->bitacora($_SESSION['usuario'], 'Usuarios', 'Modificó a '. $usuario);
          $this->view->mensaje = '¡Usuario Modificado exitosamente!';
        echo "correcto";
        }else{
          $this->view->mensaje = '¡Ha ocurrido un error!';
          echo "error";
        }
        $this->view->render('nominas/mensaje');
  

       


?>