<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=e_note;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
