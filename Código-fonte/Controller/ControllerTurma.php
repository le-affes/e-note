<?php
require_once '../Model/DAO/CursoDAO.php';

require_once '../Model/DAO/Connection.php';
$objNivel= new CursoDao();
if(!isset($_POST["nome3"])){


}
else{
     echo $objNivel->selectCurso();
    
}

 

?>