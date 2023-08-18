<?php
    require_once '../Model/DAO/ProfessorDAO.php';
     require_once '../Model/DAO/Connection.php';
    $objLogin=new ProfessorDao();
 if(isset($_POST['email'])&&isset($_POST['email'])){
$email = $_POST['email'];
$senha = $_POST['senha'];
if(isset($_POST["nome"])){
    // $tipo=$_POST["tipo"];
     echo $logar = $objLogin->Cadastrar();
 }
   else{
    echo $logar = $objLogin->Logar($email,$senha);
   }
 }
 else{
   echo $logar = $objLogin->AprovaProfessor();  
 }

    
    ?>