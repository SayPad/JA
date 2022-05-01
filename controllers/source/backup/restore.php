<?php 
 include_once './models/Connet.php';
  $restorePoint=SGBD::limpiarCadena($_POST['restorePoint']);
  $sql=explode(";",file_get_contents($restorePoint));
  $totalErrors=0;
  set_time_limit (60);
  $con=mysqli_connect(SERVER, USER, PASS, BD);
  $con->query("SET FOREIGN_KEY_CHECKS=0");
  for($i = 0; $i < (count($sql)-1); $i++){
      if($con->query($sql[$i].";")){  }else{ $totalErrors++; }
  }
  $con->query("SET FOREIGN_KEY_CHECKS=1");
  $con->close();
  if($totalErrors<=0){
   $mensaje = "Restauración completada con éxito";
  }else{
   $mensaje = "Ocurrió un error, no se pudo realizar la restauración";
  }
   $this->view->mensaje = $mensaje;
   $this->view->render('backup/index');
?> 