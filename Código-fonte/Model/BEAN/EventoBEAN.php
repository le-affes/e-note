<?php
require_once 'TurmaBEAN.php';
require_once 'TipoBEAN.php';
class EventoBean{
private $id;
private $tipo;
private $turma;
private $descricao;
private $data;
 function __construct($id,$descricao,$data){
         $this->id=$id;
         $this->descricao=$descricao;
         $this->data=$data;
     
     }
     
     function getId(){
         return $this->id;
         
     }
     function setId($id){
     $this->id=$id;
         
     }
       function getData(){
         return $this->data;
         
     }
     function setData($data){
     $this->data=$data;
         
     }
      function getDescricao(){
         return $this->descricao;
         
     }
     function setDescricao($descricao){
     $this->descricao=$descricao;
         
     }
}

?>