<?php
class View {

  function __construct() {
      //echo '<p>Nueva vista</p>';
  }

  function render ( $nombre ) {
    require 'views/' . $nombre . '.php';
  }

}

?>