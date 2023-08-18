<?php
require_once 'DisciplinaBEAN.php';
class TurmaBean{
    private $id;
    private $disciplina;
    private $ano;
    private $semestre;
    function __construct($id,$ano,$semestre){
         $this->id=$id;
         $this->disciplina=new DisciplinaBean();
         $this->ano=$ano;
         $this->semestre=$semestre;
     
     }
     function setEmail($email){
         $this->email=$email;
     }
     function getEmail(){
         return $this->email;
     }
      function setid($id){
         $this->id=$id;
     }
     function getid($id){
         return $this->id;
     }
      function setSemestre($semestre){
         $this->semestre=$semestre;
     }
     function getSemestre(){
         return $this->semestre;
     }
     function setAno($ano){
         $this->ano=$ano;
     }
     function getAno(){
         return $this->ano;
     }
}

    ?>