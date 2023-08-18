<?php

require_once 'ProfessorBEAN.php';
require_once 'NivelBEAN.php';
class CursoBean{
     private $coordenador; 
     private $nome;
     private $nivel;
     private $id;
     
  function __construct($id,$nome){
         $this->coordenador=new ProfessorBean();
         $this->nome=$nome;
           $this->id=$id;
         $this->nivel=new NivelBean();
     }
  function setNome($nome){
      $this->nome=$nome;
  }
   function getNome(){
      return $this->nome;
  }
  function setId($id){
      $this->id=$id;
  }
   function getid(){
      return $this->id;
  }
}
?>