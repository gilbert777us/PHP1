<?php

require_once('Profesor.php');
require_once('Redtamar.php');
require_once('RRSS.php');

$profeRaul = new Profesor("Raul","50465478Y",5);
$redRetamarFP = new Redtamar();
$redGenerica = new RRSS("gilbert");

echo $redGenerica->buscarPersona("dos");

?>