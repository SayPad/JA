<?php
  class Contacto extends Controller {

    function __construct () {
      parent::__construct();
    }
  
  public function render () {
        $this->view->render('contacto/index');
    }
   }
?>