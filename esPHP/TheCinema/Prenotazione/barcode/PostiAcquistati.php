<?php

class PostiAcquistati{
  // constructor
  public $id=0;
  public $numero=0;
  public $fila="";

  public function __construct($id,$numero,$fila) {
      $this->id = $id;
      $this->numero = $numero;
      $this->fila = $fila;

  }
  public function getId(){
    return($this->id);
  }
  public function getNumero(){
    return($this->numero);
  }
  public function getFila(){
    return($this->fila);
  }


}


 ?>
