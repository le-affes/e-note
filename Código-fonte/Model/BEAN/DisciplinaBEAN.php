<?php
class DisciplinaBean{
    private $nome;
    private $id;
        function __construct($id,$nome){
         $this->id=$id;
         $this->nome=$nome;
     
     }
     function setNome($nome){
         $this->nome=$nome;
     }
     function getNome(){
         return $this->nome;
     }
      function setid($id){
         $this->id=$id;
     }
     function getid($id){
         return $this->id;
     }
    
}
    
    
    ?>