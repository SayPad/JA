<?php 
  require_once 'controllers/errores.php';
  $campana = "campana.png";
   $id_ultimo_salario = 0;
   $id_ultimo_trabajosExtras = 0;
   $dolar = 0;

  class App {

    function __construct () {
      


        $url = isset($_GET['url']) ? $_GET['url'] : NULL;
        $url = rtrim($url, '/'); //quitar los slash del URL.
        $url = explode('/', $url); //Dividir URL por slashs.

        //si un usuario ha iniciado sesion
        if( isset( $_SESSION['usuario'] ) ){
          //si no se ingresa ningun controlador
          if (empty($url[0])) {

            $archivoController = 'controllers/main.php'; 
            require_once $archivoController;
            $controller = new Main();
            $controller->loadModel('main');
            $controller->setUsuario($_SESSION['usuario']);
            $controller->render(); //funcion para aparecer en pantalla.
            return false;
          }
          //convertimos el URL en un directorio para cargar controladores.
          $archivoController = 'controllers/' . $url[0] . '.php';

          if ( file_exists($archivoController) ) {

            require_once $archivoController;

            //inicializar el controlador
            $controller = new $url[0]; //URL[0] es el controlador
            $controller->loadModel($url[0]);

            $controller->setUsuario($_SESSION['usuario']);

            // # elementos del array URL
            $nparam = sizeof($url);

            if ($nparam > 1) {

            	if ($nparam > 2) {

            		$param = [];

            		for ($i=2; $i < $nparam; $i++) {
            			array_push($param, $url[$i]);
            		}
                $controller->load($url[1], $param);
            	}else {
            		$controller->load($url[1]);
            	}
            } else {
              $controller->render();
            }

          } else { //en caso de que no encuentre el archivo...
              $controller = new Errores(); //esto muestra un mensaje de error.
          }

        } else { //DESDE AQUI ES EL IF DE USUARIO

          $archivoController = 'controllers/' . $url[0] . '.php';

          if ( file_exists($archivoController) && $archivoController === 'controllers/restaurar.php' ||file_exists($archivoController) && $archivoController === 'controllers/contacto.php') {

            require_once $archivoController;
            $controller = new $url[0];
            $controller->loadModel($url[0]);

            if ( isset($url[1]) ){
                $controller->{$url[1]}();
            } else{
              $controller->render();
            }


          } else {

            $archivoController = 'controllers/login.php';
            require_once $archivoController;
            $controller = new Login();
            $controller->loadModel('Login');

            if ( isset($url[1]) ){
              $controller->{$url[1]}();

            } else{
              $controller->render();
            }

          }

        }




    }
  }

?>
