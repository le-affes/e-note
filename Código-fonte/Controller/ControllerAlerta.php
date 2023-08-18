<?php

require_once '../Model/DAO/AlertaDAO.php';
$emailnt = $_POST['Emailnt'];
$discnt = $_POST['disciplinas'];
//$discnt = "7,9,11";
$s = new AlertaDao();
if ($emailnt != "" && $discnt != "") {
    $s->cadastrausuario($emailnt);
    $s->cadastraalerta($emailnt, $discnt);
}

$emailcan = $_POST['emailcan'];
$nomecan = $_POST['nomecan'];
if ($emailcan != "" && $nomecan != "") {
    $s->deletaemail($emailcan, $nomecan);
}
?>
    