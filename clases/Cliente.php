<?php
require_once('Juego.php');

class Cliente
{
// Atributos
var $nCliente;
var  $dinero;
// Constructor
function Cliente ($cli,$di)
{
$this->nCliente=$cli;
$this->dinero=$di;
echo "Cliente ".$this->nCliente." creado con ".$this->dinero;
}
// Metodos
function apostar($di,$juego)
{
$juego->jugar();
return "Empezamos a jugar apostando".$di;
}
}

?>