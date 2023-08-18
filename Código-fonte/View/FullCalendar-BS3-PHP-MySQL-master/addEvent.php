<?php

// Connexion à la base de données

require_once('bdd.php');
//echo $_POST['title'];
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end'])){
	
    $title = $_POST['title'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    $tipo = $_POST['tipo'];
    $disciplina = $_POST['disciplina'];
    $sql2 = "SELECT idTurma *FROM turma WHERE idDisciplina=$disciplina";
    $Server = "localhost";
    $Username = "root";
    $Password = "";
    $Database = "e_note";
    if($tipo==1){
        $color='#8e44ad';
    }
    else{
        if($tipo=='2'){
            $color='#2ecc71';
        }
        else{
            if($tipo='3'){
                $color='#0071c5';
        }
        else{
            $color='#34495e';
        }
    }
    
        
        
    }
    
    // $variavel=new ProfessorDao();
    //  echo $variavel->getIdUsuario();
   // $id = $_GET["id"];
    $conexao = mysqli_connect($Server, $Username, $Password, $Database);
    $consulta = mysqli_query($conexao, "SELECT idTurma FROM turma WHERE Disciplina_idDisciplina=$disciplina");
    $campos = mysqli_num_rows($consulta);
    $contador = 1;
     if ($campos != 0) {


        while ($query = mysqli_fetch_array($consulta)) {

            
            $turma= $query['idTurma'];
            
        }
    }


    $sql = "INSERT INTO evento(title, start, end, color,Tipo_idTipo,Disciplina_idDisciplina, Turma_idTurma) values ('$title', '$start', '$end', '$color',$tipo,$disciplina,$turma)";
	//$req = $bdd->prepare($sql);
	//$req->execute();
	
	echo $sql;
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}
header('Location: '.$_SERVER['HTTP_REFERER']);

?>