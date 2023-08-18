<?php

require_once '../Model/DAO/TipoDAO.php';
require_once '../Model/DAO/NivelDAO.php';
require_once '../Model/DAO/CursoDAO.php';
require_once '../Model/DAO/TurmaDAO.php';
require_once '../Model/DAO/Connection.php';
$objLogin = new TipoDao();
$objNivel= new NivelDao();
if (!isset($_POST["nome"]) && !isset($_POST["nome1"])) {
    if(isset($_POST["ano"])){
        echo "entrei";
        $objTurma= new TurmaDao();
        echo $objTurma->NewTurma();
    }
    if(isset($_POST["nome3"])){
        $objCurso= new CursoDao();
         echo $objCurso->NewDisciplina();
    }
    else{
    echo $objLogin->__construct();
    echo $objLogin->getTipo();
} }else {
    if (isset($_POST["nome1"])) {
        echo $objLogin->__construct();
        echo $objLogin->NewTipo();
    } if(isset($_POST["nome"])&&!isset($_POST["nivel"])) {
        
        echo $objNivel->NewNivel();
    }
    if(isset($_POST["nivel"])){
        $objCurso= new CursoDao();
         echo $objCurso->NewCurso();
        
    }
    
   
}
?>
   

    
   