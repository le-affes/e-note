<?php
    class Connection {

    private $Server = "localhost";
    private $Username = "root";
    private $Password = "";
    private $Database = "e_note";
    private $conectar;
    function __construct(){
        $this->Conectar();
    }
    function Conectar(){
        if(!($this->conectar=mysqli_connect($this->Server,$this->Username,$this->Password))){
      
           echo "errado";
        }
        else{
            if(!($con= mysqli_select_db($this->conectar, $this->Database))){
                
                
            }
        }
    }
    public function getCon() {
        //$conectar->set_charset("utf8"); 
        $this->conectar->set_charset("utf8");
        return $this->conectar;
    }

}
?>
