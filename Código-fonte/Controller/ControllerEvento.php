
<?php
require_once '../Model/DAO/CursoDAO.php';
$objNivel= new CursoDao();
echo $objNivel->selectCurso();


?>