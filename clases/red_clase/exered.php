<?php
require_once("Red.php");
require_once("Alumno.php");
require_once("Twitter.php");
$red1 = new Red("Red1","45123");
$red1->citarPersona("Manuel","Jose");

$alumno = new Alumno("12345","Pedro","0011");
$alumno->buscarPersona("12345");


$tuit = new Twitter("23","pedrito");
$tuit->citarPersona("pedrito");

?>