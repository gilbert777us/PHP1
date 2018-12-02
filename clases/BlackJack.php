<?php
require_once('Juego.php');

class BlackJack extends Juego
{

  var $modo;
  
  function BlackJack($mod,$nom)
  {
    parent::__CONSTRUCT();
    $this->modo = $mod;
    $this->nombreJuego = $nom;
    echo " mesa BJ construida con modo ".$this->modo;
  }
}

$mesa2 = new BlackJack(24," BJ45 ");
echo "el nombre del juego es: ".$mesa2->nombreJuego;

?>