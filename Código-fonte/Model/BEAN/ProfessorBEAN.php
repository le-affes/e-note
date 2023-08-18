<?php

 class ProfessorBean{
     private $id;
     private $nome;
     private $email; 
     private $senha;
     function __construct($id,$nome,$email,$senha){
         $this->id=$id;
         $this->email=$email;
         $this->nome=$nome;
         $this->senha=$senha;
     }
     function getID(){
         return $this->id;
     }
     function getNome(){
         return $this->nome;
     }
     function getEmail(){
         return $this->email;
     }
     function getSenha(){
         return $this->senha;
     }
     function setSenha($senha){
          $this->senha=$senha;
     }
      function setid($id){
          $this->id=$id;
     }
     function setNome($nome){
          $this->nome=$nome;
     }
     function setEmail($email){
          $this->email=$email;
     }
 }


?>