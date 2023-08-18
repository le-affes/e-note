<?php

require_once ('Connection.php');

Class NivelDao {

    private $objConnection;
    private $cont=1;

    function __construct() {
        $this->objConnection = new Connection();

        //echo "creie";
    }

    function getNivel() {
        //echo "boom";
        
        $consulta = mysqli_query($this->objConnection->getCon(), "SELECT * FROM nivel;");
        $campos = mysqli_num_rows($consulta);
          $consulta2 = mysqli_query($this->objConnection->getCon(), "SELECT * FROM curso;");
        $contador=1;
        if ($campos != 0) {
            
            while ($query = mysqli_fetch_array($consulta)) {
               
                
               echo "<li class='dropdown'>";
                            echo "<a class='dropdown-toggle' data-toggle='dropdown' href='#'>".$query['nome']."<span class='caret'></span></a>";
                              echo "<ul class='dropdown-menu'>";            
                            while ($query2 = mysqli_fetch_array($consulta2)) {
                                    
                                    if($query2['Nivel_idNivel']==$query['idNivel']){
                                     echo "<li class='dropdown dropdown-submenu pull-left' style='display: block;'><a href='#' class='dropdown-toggle ' data-toggle='dropdown'>".$query2['nome']."</a>";
                                         $final=$query2["idCurso"];
                                         $consulta3 = mysqli_query($this->objConnection->getCon(), "SELECT DISTINCT periodo FROM curso_has_disciplina WHERE Curso_idCurso=$final ORDER BY periodo;");
                                         echo "<ul class='dropdown-menu pull-left' style='float:left'>";
                                           while ($query3 = mysqli_fetch_array($consulta3)){
                                               if($query['nome']!='Graduação'){
                                                   $l=$query2["idCurso"].".".$query3["periodo"];
                                               echo "<li ><a id='$l' class='a'>". $query3["periodo"]."&#186; ano"."</a></li>";}
                                               else{
                                                  $l=$query2["idCurso"].".".$query3["periodo"];
                                                   echo "<li><a id='$query3[periodo]' class='a'>". $query3["periodo"]."&#186; periodo"."</a></li>";
                                               }
                                               
                                              
                                           }
                                           echo "</ul>";
                                    }
                                }
                  echo "</ul>";
                   echo "</li>";
            
                
            }
          
        }
      
         
    }
    function getCont(){
        return $this->cont;
    }
    function NewNivel() {

     $nome=$_POST["nome"];
          
         $query = "INSERT INTO nivel(nome) VALUES('" . $nome . "');";
       $consulta = mysqli_query($this->objConnection->getCon(), $query);
       if($consulta){
           
       }
       else{
           die("erro");
       }

}
function selectNivel(){
     $consulta = mysqli_query($this->objConnection->getCon(), "SELECT * FROM nivel;");
        $campos = mysqli_num_rows($consulta);
     echo "<select class='form-control' name='nivel' id='nivel' placeholder='Tipo: '  style='width:100%;height:34px;border-radius:4px;border-color:#ccc;    padding: 6px 8px; margin-bottom:15px;'name='tipo'>";
            echo "<option value='' disabled selected hidden style='color:grey'>Nível:</option>";
        if ($campos != 0) {
         
            
            while ($query = mysqli_fetch_array($consulta)) {
               
                $i2=$query["idNivel"];
                echo " <option value='$i2'>".$query['nome']."</option>";
                $contador++;
              
            
            
                
            }
          
        }
         echo " </select>";
         
         $consulta2 = mysqli_query($this->objConnection->getCon(), "SELECT nome,idProfessor FROM professor WHERE aprovado=1;");
        $campos2 = mysqli_num_rows($consulta2);
     echo "<select class='form-control' name='coo' id='nivel' placeholder='Tipo: '  style='width:100%;height:34px;border-radius:4px;border-color:#ccc;    padding: 6px 8px; margin-bottom:15px;'name='tipo'>";
            echo "<option value='' disabled selected hidden style='color:grey'>Coordenador:</option>";
        if ($campos2 != 0) {
         
            
            while ($query2 = mysqli_fetch_array($consulta2)) {
               
                $i2=$query2["idProfessor"];
                echo " <option value='$i2'>".$query2['nome']."</option>";
                $contador++;
              
            
            
                
            }
          
        }
         echo " </select>";
    
}
}
?>
