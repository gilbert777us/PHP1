<?php
require_once("guerrero.php");
// Leer un fichero json
$string = file_get_contents("guerreros.json");
$json_a = json_decode($string, true);
print_r ($json_a);
//Recorrer el JSON
foreach ($json_a as $nombre_guerrero => $guerrero) {
  $guerrerotemporal= new Guerrero();
  $guerrerotemporal->setAmigos($guerrero['amigos']);
  $guerrerotemporal->setEquipo($guerrero['equipo']);
$guerrerotemporal->setNombre($nombre_guerrero);
 print_r($guerrerotemporal); 

}


?>