<?php

require_once ('Connection.php');

Class CursoDao {

    private $objConnection;
    private $cont=1;

    function __construct() {
        $this->objConnection = new Connection();

        //echo "creie";
    }

    function getCurso() {
        //echo "boom";
        echo "<br/>";
        $consulta = mysqli_query($this->objConnection->getCon(), "SELECT * FROM disciplina;");
        $campos = mysqli_num_rows($consulta);
        $contador=1;
        if ($campos != 0) {
            
            echo "<select class='form-control'name='tipo[]' id='tipo' placeholder='Tipo: '  style='width:100%;height:34px;border-radius:4px;border-color:#ccc;  padding: 6px 8px; margin-top:20px;margin-bottom:5px;  'multiple='multiple'>";
            //echo "<option value='' disabled selected hidden style='color:grey'>Disciplina:</option>";
            while ($query = mysqli_fetch_array($consulta)) {
               
                $god=$query['nome'];
                echo " <option value='$contador' style='max-width:100%'>".$query['nome']."</option><br/>";
                $contador++;
              
              $this->cont=$contador;
            
                
            }
          
        }
         echo " </selected><br/>";
         
    }
    function getCont(){
        return $this->cont;
    }


function NewCurso(){
   echo $nivel=$_POST["nivel"];
    echo $nome=$_POST["nome"];
           echo $coordenador=$_POST["coo"];
         $query = "INSERT INTO curso(nome,Coordenador_idProfessor,Nivel_idNivel) VALUES('" . $nome . "','".$nivel."','" . $coordenador . "');";
       $consulta = mysqli_query($this->objConnection->getCon(), $query);
       if($consulta){
           
       }
       else{
           die("vsvgc");
       }
    
}
function selectDisciplina(){
    $consulta = mysqli_query($this->objConnection->getCon(), "SELECT nome,idDisciplina FROM disciplina;");
        $campos = mysqli_num_rows($consulta);
     echo "<select class='form-control' name='disciplina' id='disciplina' placeholder='Disciplina: '  style='width:100%;height:34px;border-radius:4px;border-color:#ccc;    padding: 6px 8px; margin-bottom:15px;'>";
            echo "<option value='' disabled selected hidden style='color:grey'>Disciplina:</option>";
        if ($campos != 0) {
         
            
            while ($query = mysqli_fetch_array($consulta)) {
               
                $i2=$query["idDisciplina"];
                echo " <option value='$i2'>".$query['nome']."</option>";
                $contador++;
              
            
            
                
            }
          
        }
         echo " </select>";
}
function selectCurso(){
    $consulta = mysqli_query($this->objConnection->getCon(), "SELECT nome,idCurso FROM Curso;");
        $campos = mysqli_num_rows($consulta);
        echo "</br>";
     echo "<select class='form-control' name='curso' id='disciplina' placeholder='Curso: '  style='width:100%;height:34px;border-radius:4px;border-color:#ccc;    padding: 6px 8px; margin-bottom:15px;'>";
            echo "<option value='' disabled selected hidden style='color:grey'>Curso:</option>";
        if ($campos != 0) {
         
            
            while ($query = mysqli_fetch_array($consulta)) {
               
                $i2=$query["idCurso"];
                echo " <option value='$i2'>".$query['nome']."</option>";
                $contador++;
              
            
            
                
            }
          
        }
         echo " </select>";
}
function NewDisciplina(){
    $nome=$_POST["nome3"];
    if(isset($_POST["obrigatoria"])){
        $obrigatoria=$_POST["obrigatoria"];
    }
    else{
        $obrigatoria=0;
    }
    $periodo=$_POST["periodo"];
    $curso=$_POST["curso"];
    echo "enter";
     $query = "INSERT INTO disciplina(nome) VALUES('" . $nome . "');";
       $consulta = mysqli_query($this->objConnection->getCon(), $query);
       if($consulta){
           
       }
       else{
           die("erro");
       }
    
    
}
}
?>

<?php



?>