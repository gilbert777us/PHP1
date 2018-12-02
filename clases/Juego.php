<?php
class Juego
{
// Atributos
var $nombreJuego;
// Constructor
function Juego ($nom="ruleta")
{
$this->nombreJuego=$nom;
echo "Juego ".$this->nombreJuego." construido<br/>";
}
// Metodos
function jugar()
{
return "Empezamos a jugar al juego ".$this->nombreJuego;
}
}

?>