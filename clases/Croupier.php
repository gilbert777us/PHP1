<?php
class Croupier
{
// Atributos
var $nCroupier;
var  $categoria;
// Constructor
function Croupier ($crou,$ca)
{
$this->nCroupier=$crou;
$this->categoria=$ca;
echo "Cliente ".$this->nCroupier." de categoría ".$this->categoria;
}
// Metodos
function empezarJugada()
{

return "Empezamos la jugada";
}
  
 function resolverJugada()
{

return "Resolvemos la jugada";
}
  
  function pagar($di)
{

return "Paga la casa".$di;
}
}

?>