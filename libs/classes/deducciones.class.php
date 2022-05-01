<?php 
class DeduccionesClass  {
      private $id;
      private $ivss;
      private $rpe;
      private $faov;
      private $inces;

      public function getId() {
        return $this->id;
      }
      public function getIvss() {
        return $this->ivss;
      }
      public function getRpe() {
        return $this->rpe;
      }
      public function getFaov() {
        return $this->faov;
      }
      public function getInces() {
        return $this->inces;
      }


      //SETTERS
      public function setId($id) {
        $this->id = $id;
      }
      public function setIvss($ivss) {
        $this->ivss = $ivss;
      }
      public function setRpe($rpe) {
        $this->rpe = $rpe;
      }
      public function setFaov($faov) {
        $this->faov = $faov;
      }
      public function setInces($inces) {
        $this->inces = $inces;
      }

  }

?>