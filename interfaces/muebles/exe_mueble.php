<?php
require_once('Mesa.php');

$camilla1 = new Mesa();
$camilla1->setModelo("camilla");
$camilla1->setNumeroSitios(6);
$camilla1->imprimirMueble();
echo "<br/>";
$mesilla1 = new Mesa();
$mesilla1->setModelo("mesilla");
$mesilla1->setNumeroPatas(3);
$mesilla1->setNumeroSitios(2);
$mesilla1->imprimirMueble();

?>