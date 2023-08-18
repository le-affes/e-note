<?php


require_once ('Connection.php');
//require_once ('../BEAN/ProfessorBEAN.php');

class ProfessorDao {
    private $objConnection;
   

    function __construct() {
        $this->objConnection = new Connection();
        
        //echo "creie";
    }
    

    function Logar($email, $senha) {
        $email_admin='admin@admin';
        $senha_admin='1234';
        $consulta = mysqli_query($this->objConnection->getCon(), "SELECT * FROM professor WHERE email = '$email' AND aprovado=1");
        $campos = mysqli_num_rows($consulta);
        $senhachecada = $senha;
        if ($campos != 0) {
// se o usuario existi verifica a senha dele
            while ($query = mysqli_fetch_array($consulta)) {
                $senha_banco = $query['senha'];
                $id = $query['idProfessor'];
            }
                  $consulta2 = mysqli_query($this->objConnection->getCon(), "SELECT * FROM curso WHERE Coordenador_idProfessor='$id'");
        $campos2 = mysqli_num_rows($consulta2);
            if ($senhachecada != $senha_banco) {
                echo "no_pass";
                exit;
            } else {
                // estiver tudo certo vamos ver se ele é o administrador
                if ($campos2!=0) {
                    // se for o email do administrador vamos verificar a senha dele
                    // se é igual a do administrado
                    //if ($senhachecada == $senha_admin) {
                        // se for o administrador vomos criar a sessão
                        session_name('755452c24adaa9a3097532020b9ad5a6df97cf53');
                        session_start();
                        $_SESSION['email'] = $email_admin;
                        $_SESSION['senha'] = $senhachecada;
                        $_SESSION['idProfessor'] = $id;

                        $ip = $_SERVER['REMOTE_ADDR'];
                        $hoster = gethostbyaddr($ip);
                        mysqli_query($conecta, "UPDATE professor SET ip = '$ip', host = '$hoster' WHERE id = '$id'");
                        header("Location: ../View/Administrador/index.php?id=$id");
                        echo "true_admin";
                   // }
                    
                    
                } else {
                    // se o email não for do administrado vamos criar a sessão dele
                    session_name('755452c24adaa9a3097532020b9ad5a6df97cf53');
                    session_start();
                    $_SESSION['email'] = $email;
                    $_SESSION['senha'] = $senhachecada;
                    $_SESSION['idProfessor'] = $id;

                    $ip = $_SERVER['REMOTE_ADDR'];
                    $hoster = gethostbyaddr($ip);
                    mysqli_query($conecta, "UPDATE professor SET ip = '$ip', host = '$hoster' WHERE id = '$id'");

                    header("Location: ../View/FullCalendar-BS3-PHP-MySQL-master/index.php?id=$id");
                }
                
            }
        } else {
            echo "no_user";
            exit;
        }
    }
    function getIdUsuario(){
        return $_SESSION['idProfessor'];
   }
 
   function Deslogar(){
      session_destroy();
      header("Location: ../index.php");
   }
   function Cadastrar(){
        $query2 = "SELECT MAX(idProfessor) AS max_id FROM professor;";
       $consulta2 = mysqli_query($this->objConnection->getCon(), $query2);
       $campos2 = mysqli_num_rows($consulta2);
        if ($campos2 != 0) {
          while ($query3 = mysqli_fetch_array($consulta2)) {
        $numero=$query3["max_id"]+1;
    }
    }       
        $usuario = $_POST["nome"];
       $senha = $_POST["senha"];
       $email = $_POST["email"];
      $disciplina=$_POST["tipo"];
      $aprovado=0;
       $query = "INSERT INTO professor(nome,email,senha,aprovado) VALUES('" . $usuario . "','".$email."','" . $senha . "','" . $aprovado . "');";
       $consulta = mysqli_query($this->objConnection->getCon(), $query);
       if($consulta){
           
           foreach($disciplina as $item){
               
               $query4 = "SELECT idTurma FROM  turma WHERE  Disciplina_idDisciplina ='$item'";
       $consulta4 = mysqli_query($this->objConnection->getCon(), $query4);
        $campos4= mysqli_num_rows($consulta4);
          if ($campos4 != 0) {
          while ($query5 = mysqli_fetch_array($consulta4)) {
        $numero2=$query5["idTurma"];
          }
        $query6 ="INSERT INTO professor_has_turma(turma_idTurma,professor_idProfessor) VALUES('" . $numero2 . "','".$numero."');";
       $consulta6 = mysqli_query($this->objConnection->getCon(), $query6);
       if( $consulta6){
           header("Location:../View/FullCalendar-BS3-PHP-MySQL-master/index.php");
           
       }
       else{
           die("erro6");
       }
    
    }
        
           }
       }
       else{
       die("erro");
       
   }
    
   //$objprof=new ProfessorBean();
   //echo $this->objprof->construtor($this->numeroProf,$usuario,$email,$senha);
   //$this->numeroProf++;

   }
   function aprovaProfessor(){
       if(isset($_POST["aprovado"])){
       $dados=$_POST["aprovado"];
       }
       
       foreach ($dados as $key => $value) {
           $query = "UPDATE professor SET aprovado=1 WHERE idProfessor=$value;";
       $consulta = mysqli_query($this->objConnection->getCon(), $query);
       if($consulta){
           
       }
       else{
           die("erro");
       }
           
       }
   }

}

?>
