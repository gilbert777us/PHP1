<?php
require_once("Armario.php");
require_once("Mesa.php");

$colgado1 = new Armario();
$colgado1->setModelo("colgado");
$colgado1->setNumeroPatas(0);

//echo " el modelo es ".$colgado1->getModelo();
$colgado1->imprimirMueble();
echo "<br/>";

$emp1 = new Armario();
//$colgado1->setModelo("colgado");
$emp1->setNumeroPatas(6);

//echo " el modelo es ".$colgado1->getModelo();
$emp1->imprimirMueble();

echo "<br/>";

$comedor11 = new Mesa();

$comedor11->setModelo("comedor");
$comedor11->setNumeroSitios(11);

$comedor11->imprimirMueble();




?>