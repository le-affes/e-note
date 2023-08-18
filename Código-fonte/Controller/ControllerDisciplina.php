
<?php
require_once '../Model/DAO/DisciplinaDAO.php';
 require_once '../Model/DAO/Connection.php';
 require_once '../Model/DAO/CursoDAO.php';
 

  $objLogin=new DisciplinaDao();
    //$id = $_POST['local'];

     echo $logar2=$objLogin->getDisciplina();


?>