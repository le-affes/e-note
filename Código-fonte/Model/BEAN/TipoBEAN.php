<?php
class TipoBean{
    private $nome;
    private $id;
    private $descricao;
        function __construct($id,$nome,$descricao){
         $this->id=$id;
         $this->nome=$nome;
          $this->descricao=$descricao;
     }
     function setNome($nome){
         $this->nome=$nome;
     }
     function getdescricao(){
         return $this->descricao;
     }
     function setdescricao($descricao){
         $this->descricao=$descricao;
     }
     function getNome(){
         return $this->nome;
     }
      function setid($id){
         $this->id=$id;
     }
     function getid(){
         return $this->id;
     }
    
}
    
    
    ?>