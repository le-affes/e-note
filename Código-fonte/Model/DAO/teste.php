<?php

session_start();




     $host= "localhost";
    $user = "root";
    $password = "";
    $database = "e_note";
    $conexao= mysqli_connect($host, $user, $password, $database);
     mysqli_set_charset($conexao, "utf8");
    $query="SELECT*FROM disciplina;";
   
    $resultado= mysqli_query($conexao,$query);
// VERIFICAR NOME DE USUARIO E SENHA
// GERALMENTE FEITO COM USO DE BANCO DE DADOS
   echo"<form action='2.php' method='post'>";
   echo" <button type='submit' style='width:200px;height=50px;'>"."</button>";
     echo "<select id='' name='disciplina'style='width:100%;height:34px;border-radius:4px;border-color:#ccc;    padding: 6px 8px; margin-top:15px;' >";
      echo "<option value='' disabled selected hidden>Selecione as disciplinas</option>";

  if ($resultado) {
                if ($resultado->num_rows > 0) {
                    while ($linha = $resultado->fetch_assoc()) {
                       echo "<option value='$contador'>".$linha['nome']."</option>";
						$contador++;
					              
                    }
                     
                } else {
                    echo "Nenhum registro encontrado!";
                }
            } else {
                die("Erro!");
            }
c();
 echo "</form >";           
?>

 