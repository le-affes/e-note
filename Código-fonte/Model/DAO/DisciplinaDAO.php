<?php
    require_once ('Connection.php');

class DisciplinaDAO{
    private $objConnection;
    
function __construct(){
   
     $this->objConnection = new Connection();
    
}
function getDisciplina(){
    $numero=2;
    $numero2=3;
    
    $consulta2 = mysqli_query($this->objConnection->getCon(),"INSERT INTO professor_has_turma(turma_idTurma,professor_idProfessor) VALUES('" . $numero2 . "','".$numero."');");
 
   if ($consulta2) {
          
   }
    else{
        die("erro");
    }
   
     $cont=1;
     $contador=1;
   $item=3;
            $consulta = mysqli_query($this->objConnection->getCon(),"SELECT* FROM  curso_has_disciplina");
     $campos = mysqli_num_rows($consulta);
      echo "<select id='$cont' name='disciplina[]'style='width:100%;height:34px;border-radius:4px;border-color:#ccc;    padding: 6px 8px; margin-top:15px;'multiple='multiple' >";
      echo "<option value='' disabled selected hidden>Selecione as disciplinas</option>";
     
     if ($campos != 0) {
// se o usuario existi verifica a senha dele
            while ($query = mysqli_fetch_array($consulta)) {
                //echo  $query['idDisciplina'];  echo " ";
                //echo  $query['periodo'];echo ' ';
                
                
                   
						echo "<option value='$contador'>".$query['Curso_idCurso']."</option>";
						$contador++;
					              
               
                
                  // echo  $query['idDisciplina'];echo ' ';
                 //echo  $query['obrigatoria'];
             
                //echo $query['idCurso'];
                  
            }
          //  echo "<option value='1'>".$numero."</option>";
             echo "</select>";
            $cont++;
     
           
           

}
}
function selectCurso(){
    $consulta = mysqli_query($this->objConnection->getCon(), "SELECT nome,idCurso FROM Curso;");
        $campos = mysqli_num_rows($consulta);
     echo "<select class='form-control' name='curso' id='disciplina' placeholder='Disciplina: '  style='width:100%;height:34px;border-radius:4px;border-color:#ccc;    padding: 6px 8px; margin-bottom:15px;'name='tipo'>";
            echo "<option value='' disabled selected hidden style='color:grey'>Disciplina:</option>";
        if ($campos != 0) {
         
            
            while ($query = mysqli_fetch_array($consulta)) {
               
                $i2=$query["idCurso"];
                echo " <option value='$i2'>".$query['nome']."</option>";
                $contador++;
              
            
            
                
            }
          
        }
         echo " </select>";
}
}
?>
<?php
$g=new DisciplinaDAO();
echo $g->__construct();
echo $g->getDisciplina();

?>
