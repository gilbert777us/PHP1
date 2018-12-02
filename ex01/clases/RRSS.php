<?php
require_once('Redtamar.php');
require_once('RedTwitter.php');
require_once('RedInstagram.php');
class RRSS
{
// Atributos
var $nNick;
var $redtamar;
var $redTwitter;
var $redInstagram;
// Constructor
function RRSS ($n)
{
  $this->nNick= $n;
  $this->redtamar= new Redtamar();
  $this->redTwitter= new RedTwitter(0);
  $this->redInstagram= new RedInstagram(0);
  echo "RRSS creada correctamente";
}
// Metodos

function buscarPersona($p)
{
  return $this->redTwitter->buscarPersona($p) . $this->redInstagram->buscarPersona($p) . $this->redtamar->buscarAlumno($p) . $this->redtamar->buscarProfesor($p) ; 
}
}

?>