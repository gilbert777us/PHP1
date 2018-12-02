<?php

require_once('Ruleta.php');
require_once('Tragaperras.php');
require_once('BlackJack.php');
require_once('Croupier.php');


class Casino
{
// Atributos
var $nombre;
var $nEstrellas;
var $aJuegos;
var $crRuleta;
var $crBJ;


// Constructor
function Casino ($nom, $est)
{
$this->nombre=$nom;
$this->nEstrellas=$est;

$ruleta = new Ruleta("RULEX");
$tragaperras = new Tragaperras ("Tragaperras",6,7);
$BJ1 = new BlackJack (56,"BJ1");
$BJ2 = new BlackJack (555,"BJ2");
$this->aJuegos = array ($ruleta,$tragaperras,$BJ1,$BJ2);
$this->crRuleta = new Croupier(1,"alta");
$this->crBJ = new Croupier(2,"muy alta");
  

echo "Casino ".$this->nombre." construido<br/>";
}

// Metodos
function jugar()
{
return "Empezamos a jugar";
}
function cenar()
{
return "Cenamos gambas";
}
function tomar()
{
return "Tomamos fanta";
}

function getJuegos()
{
  return $this->aJuegos;  
}
  
  
}

//echo "aaaaa";

/*$casinoGranVia = new Casino ("Gran Via S.L.",2);
echo "\n";
$juegoRuleta = new Juego();
echo "\n";
$juegoRuletaAmericana = new Juego("ruleta americana");
echo "\n";
*/

$casinoTorre = new Casino ("Torrelodones S.A.",4);
echo "\n";

$aJ = $casinoTorre->getJuegos();
for ( $i=0;$i<count($aJ);$i++)
{
  echo "nombre:".$aJ[$i]->nombreJuego."\n";
}

var_dump($casinoTorre);


$myJSON = json_encode($casinoTorre);

echo $myJSON;

?>