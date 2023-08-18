<?php

require_once ('Connection.php');

Class TurmaDao {

    private $objConnection;
    private $cont=1;

    function __construct() {
        $this->objConnection = new Connection();

        //echo "creie";
    }

    function getCurso() {
        //echo "boom";
        
        $consulta = mysqli_query($this->objConnection->getCon(), "SELECT * FROM disciplina;");
        $campos = mysqli_num_rows($consulta);
        $contador=1;
        if ($campos != 0) {
            
            echo "<select class='form-control'name='tipo' id='tipo' placeholder='Tipo: '  style='width:100%;height:34px;border-radius:4px;border-color:#ccc;    padding: 6px 8px; margin-top:20px;margin-bottom:5px;'>";
            echo "<option value='' disabled selected hidden style='color:grey'>Cursos:</option>";
            while ($query = mysqli_fetch_array($consulta)) {
               
                
                echo " <option value='$contador' style='max-width:100%'>".$query['nome']."</option>";
                $contador++;
              
              $this->cont=$contador;
            
                
            }
          
        }
         echo " </selected><br/>";
         
    }
    function getCont(){
        return $this->cont;
    }
   function NewTurma(){
   echo "entre";
  echo $semestre=$_POST["semestre"];
     echo $ano=$_POST["ano"];
          echo  $disciplina=$_POST["disciplina"];
         $query = "INSERT INTO turma(ano,semestre,Disciplina_idDisciplina) VALUES('" . $ano . "','".$semestre."','" . $disciplina . "');";
       $consulta = mysqli_query($this->objConnection->getCon(), $query);
       if($consulta){
           
       }
       else{
           die("vsvgc");
       }
    
}
   

}
?>

<?php



?>