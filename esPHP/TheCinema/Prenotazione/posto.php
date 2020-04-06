<?php

class PostiGest{
  // constructor
  public $id=0;
  public $numero=0;
  public $fila="";
  public $disabile="";  //si o no
  public $occupato="";  //si o no
  public function __construct($id,$numero,$fila,$disabile,$occupato) {
      $this->id = $id;
      $this->numero = $numero;
      $this->fila = $fila;
      $this->disabile = $disabile;
      $this->occupato = $occupato;
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
  public function isDisabile(){
    return($this->disabile);
  }
  public function isOccupato(){
    return($this->occupato);
  }

}


 ?>
