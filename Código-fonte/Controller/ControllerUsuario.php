<?php
require_once '../Model/DAO/NivelDAO.php';

require_once '../Model/DAO/Connection.php';

$objNivel= new NivelDao();
 echo $objNivel->selectNivel();

 

?>