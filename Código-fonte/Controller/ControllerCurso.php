<?php
    require_once '../Model/DAO/CursoDAO.php';
     require_once '../Model/DAO/Connection.php';
    $objCurso=new CursoDao();
   

    
    echo $curso = $objCurso->getCurso();

    ?>