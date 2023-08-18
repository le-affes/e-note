<?php
require_once ('Connection.php');
class TipoDao{
private $objConnection;
   

    function __construct() {
        $this->objConnection = new Connection();
        
        //echo "creie";
    }
    function getTipo(){
         $consulta = mysqli_query($this->objConnection->getCon(), "SELECT * FROM tipo;");
        $campos = mysqli_num_rows($consulta);
        $contador=1;
        if ($campos != 0) {
            
            echo "<select class='form-control'name='tipo[]' id='tipo' placeholder='Tipo: '  style='width:100%;height:34px;border-radius:4px;border-color:#ccc;    padding: 6px 8px; margin-top:20px;margin-bottom:5px;'multiple='multiple'>";
            echo "<option value='' disabled selected hidden style='color:grey'>Disciplina:</option>";
            while ($query = mysqli_fetch_array($consulta)) {
               
                $god=$query['nome'];
                echo " <option value='$contador' style='max-width:100%'>".$query['nome']."</option>";
                $contador++;
              
              $this->cont=$contador;
            
                
            }
          
        }
         echo " </selected><br/>";
        
}
function NewTipo(){
         $nome=$_POST["nome1"];
           $descricao=$_POST["descricao"];
         $query = "INSERT INTO tipo(nome,descricao) VALUES('" . $nome . "','".$descricao."');";
       $consulta = mysqli_query($this->objConnection->getCon(), $query);
       if($consulta){
           
       }
       else{
           die("erro");
       }
}
}
?>
