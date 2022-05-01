<?php 

	if(isset($_POST['actualizar_dolar'])) {
	 $id_dolar = 1;
	  $valor_actual        = ($_POST['actualizar'] !== "") ? $_POST['actualizar'] : NULL;
	  $fecha_actualizacion = date("Y-m-d");
        if ($this->model->dolar->update([
        'valor_actual'=>$valor_actual, 
        'fecha_actualizacion'=>$fecha_actualizacion,
        'id_dolar'=>$id_dolar
      ])){
        $this->bitacora($_SESSION['usuario'], 'Dolar', 'Modificó el valor $ a: '. $valor_actual);
        $this->view->mensaje = '¡Precio del dolar actualizado!';
      }else{
        $this->view->mensaje = '¡Ha ocurrido un error!';
        $this->view->error = $this->model->dolar->getError();
      }
      $this->view->render('main/mensaje');
    }else{
      $this->view->mensaje = 'Rellene los campos';
      $dolar = $this->model->dolar->get($param[0]);

      if (isset($dolar)){

        $this->view->dolar = $dolar[0];

        $this->view->render('main/index'); 
      } else {
        $this->view->mensaje = 'No encontrado';
        $this->view->render('trabajadores/mensaje');
      
      }
    }

?>