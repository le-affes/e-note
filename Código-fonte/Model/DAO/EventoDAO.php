<?php
require_once 'ProfessorDAO.php';
require_once ('Connection.php');
class EventoDao{
       private $professor;
       private $objConnection;
    function __construct(){
        $this->professor=new ProfessorDao();
       
        //echo $idProfessor;
        $this->objConnection=new Connection();
    }
    function getEventos() {
         $consulta = mysqli_query($this->objConnection->getCon(), "SELECT a.nome FROM turma b JOIN disciplina a ON b.disciplina_idDisciplina=2;");
        $campos = mysqli_num_rows($consulta);
        $contador=1;
        if ($campos != 0) {
      echo " <select class='form-control' style='width:100%; border-radius:4px;height: 35px;margin-bottom:15px;padding-left:10px;font-size:100%; font-family:Calibri Light; color:gray;' >";
               echo "<option value='' disabled selected hidden style='color:grey'>Disciplina:</option>";
            while ($query = mysqli_fetch_array($consulta)) {
                   if($query['idProfessor']==$this->professor->getIdUsuario()){
              // echo $this->idProfessor;
                 echo "<option value='volvo'><h4>".  $query['nome']."</h4>"; 
              
                $contador++;
              
              $this->cont=$contador;
                    //s }
                
            }
          
        }
         echo " </selected><br/>";
        
    }
    
}
//function calendario(){
     //$consulta = mysqli_query($this->objConnection->getCon(), "SELECT  * FROM evento ;");
    // $array=array();
     //   $campos = mysqli_num_rows($consulta);
        //$contador=1;
       // if ($campos != 0) {
     
           // while ($query = mysqli_fetch_array($consulta)) {
                  
              // echo $this->idProfessor;
                
                //  $string= $query['data']; 
                 // $string2= substr($string,0,11)." ";
             // $array[$contador]=$string2;
               // $contador++;
              
              //$this->cont=$contador;
                    //s }
                
           // }
          
       // }
      //  print_r($array);
        
        //echo json_encode($array);
        
    //
    
    
      
       
       
      // }
    

}


?>

<?php
$a=new EventoDao();
echo $a->__construct();
echo $a->getEventos();
//echo $a->calendario();
?>
