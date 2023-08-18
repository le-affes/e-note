
<?php
class UsuarioBean{
    private $email;
    private $id;
    
        function __construct($id,$email){
         $this->id=$id;
         $this->email=$email;
     
     }
     function setEmail($email){
         $this->emaol=$email;
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
    
}
    
    
    ?>