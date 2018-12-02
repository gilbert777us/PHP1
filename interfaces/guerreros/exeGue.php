<?php
require_once('Guerrero.php');

$string = file_get_contents("data.json");
$json_a = json_decode($string);


foreach ($json_a as $g_name => $g_a) {
    $myG= new Guerrero();
    $myG->setNombre($g_name);
    $myG->setEquipo($g_a->equipo);
    $myG->setAmigos($g_a->amigos);
    print_r($myG);
}

//print_r($json_a->Bego->equipo);
//var_dump($json_a);


?>