<?php

require_once ('Connection.php');

class AlertaDAO {

    private $objConnection;
    private $emailnt = " ";
    private $disciplinasnt = [];
    private $intervalo = false;

    function __construct() {

        $this->objConnection = new Connection();
    }

    function setinterval() {
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('l H:i');
        if ($date == "Saturday 00:00") {
            return true;
        }
    }

    function getdiaspossiveis($diaatual, $diasevento) {
        $dias = [];
        $aux = $diaatual;
        for ($i = 0; $i <= 8; $i++) {
            $diaatual = $diaatual + $i;
            if ($diaatual + $i > 31) {
                $diaatual = $diaatual - 30;
            }
            $dias[$i] = $diaatual;
            $diaatual = $aux;
        }
        for ($j = 0; $j < count($dias); $j++) {
            if ($diasevento == $dias[$j]) {
                return true;
            }
        }
        return false;
    }

    function validadata($databd) {
        date_default_timezone_set('America/Sao_Paulo');

        $dataexpl = explode(" ", $databd);

        $dia = explode("-", $dataexpl[0]);
        $datafinal = array_reverse($dia);
        $mesatual = intval(date("m"));
        $diaatual = intval(date("d"));
        $diasevento = intval($datafinal[0]);
//            echo "dia do evento: " . $diasevento . " |dia atual: " . $diaatual;
        $mesevento = intval($datafinal[1]);
//            echo "<br/>mes do evento: " . $mesevento . " |mes atual: " . $mesatual;
        if (($mesevento = $mesatual || $mesevento = $mesatual + 1) && (getdiaspossiveis($diaatual, $diasevento))) {
            return true;
        } else {
            return false;
        }
    }

    function getdata($databd) {
        $dataexpl = explode(" ", $databd);
        $dia = explode("-", $dataexpl[0]);
        $datafinal = array_reverse($dia);
        $diasevento = intval($datafinal[0]);
        $mesevento = intval($datafinal[1]);
        $anoevento = intval($datafinal[2]);
        return " " . $diasevento . "/" . $mesevento . "/" . $anoevento;
    }

    function getAlerta() {
        $bdd = $this->objConnection->getCon();
        if ($this->setinterval()) {
            while (true) {

                $query2 = "";
                $query2 = "SELECT data FROM `corpoemail`"; //aplicar a condição do usuário
                $stmt2 = $bdd->prepare($query2);
                $stmt2->execute();
                $array2 = $stmt2->fetchAll();

                //seta a condição de datas para colocar no sql{
                $condicaodata = " AND (";
                $m = 0;
                for ($k = 0; $k < count($array2); $k++) {
                    if ($k == count($array2) && validadata($array2[$k]["data"])) {
                        $condicaodata = $condicaodata . " data= '" . $array2[$k]["data"] . "'";
                    }
                    if (validadata($array2[$k]["data"])) {
                        $condicaodata = $condicaodata . " data= '" . $array2[$k]["data"] . "'" . " OR";
                    }
                }
                $condicaodata = $condicaodata . " )";
                $aux10 = explode("OR )", $condicaodata);
                $condicaodata = $aux10[0] . " )";
                //echo $query;
                //}
                //teste final
                $query;
                $stmt;
                $stmt;
                $array;
                $atividades = "";
                $aux3 = "";

                //pegar do banco os emails cadastrados
                $query1 = "SELECT * FROM usuario";
                $stmt1 = $bdd->prepare($query1);
                $stmt1->execute();
                $array1 = $stmt1->fetchAll();
                //echo var_dump($array);
                //enviar os emails para todos os cadastrados
                for ($i = 0; $i < count($array1); $i++) {
                    $destinatario = $array1[$i]["email"];

                    //definir os eventos que devem ser enviados para o usuário  . $array1[$i]["idUsuario"]
                    $query = "SELECT * FROM corpoemail WHERE usuario=" . $array1[$i]["idUsuario"];

                    $stmt = $bdd->prepare($query);
                    $stmt->execute();
                    $array = $stmt->fetchAll();
                    //echo count($array);
                    //definir o corpo do email

                    $atividades = '<center>
                <h1 style="color: red">Atividades da semana: </h1>
                <table align=center style="border: 1px solid black; width: 70%; ">
                <tr style="border: 1px solid black;"  align=center>
                <td align=center style="font-weight:bold;">Evento</td>
                <td style="border-left: 1px solid black; font-weight:bold;" align=center>Disciplina</td>
                <td style="border-left: 1px solid black;font-weight:bold;" align=center>Tipo</td>
                <td style="border-left: 1px solid black;font-weight:bold;" align=center>Data</td>
                </tr>';


                    for ($j = 0; $j < count($array); $j++) {
//                $aux3 = '<div>Evento: ' . $array[$j]["evento"] . "---->" .
//                        'Disciplina: ' . $array[$j]["disciplina"] . "---->" .
//                        'Tipo: ' . $array[$j]["tipo"] . "---->" .
//                        'Data:' . getdata($array[$j]["data"]) . "<br/>";

                        $aux3 = '<tr style="border: 1px solid black;  border-bottom: 1px dotted black;  border-top: 1px dotted black; "  align=center>
                          <td align=center style="border-bottom: 1px dotted black;  border-top: 1px dotted black;">' . $array[$j]["evento"] . '</td>
                <td style="border-left: 1px solid black;border-bottom: 1px dotted black;  border-top: 1px dotted black;" align=center>' . $array[$j]["disciplina"] . '</td>
                <td style="border-left: 1px solid black;border-bottom: 1px dotted black;  border-top: 1px dotted black;" align=center>' . $array[$j]["tipo"] . '</td>
                <td style="border-left: 1px solid black; border-bottom: 1px dotted black;  border-top: 1px dotted black;color:red;" align=center>' . getdata($array[$j]["data"]) . '</td>
                </tr>';

                        $atividades = $atividades . $aux3 . "<br/>";
                    }
                    $atividades = $atividades . '</table>   </center>';
                    $mensagem = $atividades;
                    //echo $mensagem;
//            enviar o email
                    $headers = "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                    $headers .= "From: Suporte e-Note <suporte@enote.ga>\r\n";
                    $headers .= "Reply-To: suporte@enote.ga \r\n";
                    $headers .= "Return-Path: suporte@enote.ga \r\n";
                    $headers .= "X-Priority: 1\r\n";
                    $headers .= "X-Mailer: PHP" . phpversion() . "\r\n";
                    $assunto = "Atividades da Semana";

                    $enviado = mail($destinatario, $assunto, $mensagem, $headers);
                }

                //vai "dormir" por exatamente uma semana
                sleep(604800);
            }
        }
    }

    function cadastrausuario($emailnt) {
        $bdd = $this->objConnection->getCon();

//        $query2 = "";
//        $query2 = "SELECT email FROM `usuario`"; //aplicar a condição do usuário
//        $stmt2 = $bdd->prepare($query2);
//        $stmt2->execute();
//        $array2 = $stmt2->fetchAll();
//        for($i=0; $i<count($array2); $i++){
//            if($emailnt==$array2[$i][email]){
//                return 0;
//            }
//        }

        $query = "INSERT INTO `usuario`(`email`) VALUES ('" . $emailnt . "')";
        $stmt = $bdd->prepare($query);
        $stmt->execute();
    }

    function cadastraalerta($email, $disc) {
        $bdd = $this->objConnection->getCon();
        $disciplinas = explode(',', $disc);
        for ($i = 0; $i < count($disciplinas); $i++) {
            $query2 = "INSERT INTO `alerta`(`Usuario_idUsuario`, `Turma_idTurma`) 
            VALUES ((SELECT usuario.idUsuario FROM usuario WHERE usuario.email='" . $email . "'),
            (SELECT turma.idTurma FROM turma, disciplina WHERE turma.Disciplina_idDisciplina=disciplina.idDisciplina AND disciplina.idDisciplina=" . $disciplinas[$i] . "))"; //aplicar a condição do usuário
            $stmt2 = $bdd->prepare($query2);
            $stmt2->execute();
//                echo $query2."<br/>";
        }
    }

    function deletaemail($email, $nome) {

        $bdd = $this->objConnection->getCon();
        //alerta do canelamento
//        $mensagem = "<h4>Olá " . $nome . "</h4>
//        <h7>
//            Você solicitou cancelamento das notificações do sistema e-Note.<br/>
//            A partir deste momento você não receberá nenhuma notificação do sistema a não ser que se cadastre novamente.<br/>
//            Esperamos que sua experiência tenho sido boa.<br/>
//            Att, <br/>
//            Suporte e-Note.
//        </h7>";
//        $headers = "MIME-Version: 1.0\r\n";
//        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
//        $headers .= "From: Suporte e-Note <suporte@enote.ga>\r\n";
//        $headers .= "Reply-To: suporte@enote.ga \r\n";
//        $headers .= "Return-Path: suporte@enote.ga \r\n";
//        $headers .= "X-Priority: 1\r\n";
//        $headers .= "X-Mailer: PHP" . phpversion() . "\r\n";
//        $assunto = "Cancelamento de notiicações";
//        $enviado = mail($email, $assunto, $mensagem, $headers);
        //cancelamento

        $query2 = "DELETE FROM `alerta`
                WHERE 
                alerta.Usuario_idUsuario=
                (SELECT usuario.idUsuario FROM usuario 
                WHERE usuario.email='" . $email . "');"; //aplicar a condição do usuário
        $stmt2 = $bdd->prepare($query2);
        $stmt2->execute();

        $query3 = " DELETE FROM `usuario` WHERE usuario.email='" . $email . "';";
        $stmt3 = $bdd->prepare($query3);
        $stmt3->execute();
//                echo $query2."<br/>";
    }

}
