<?php
require_once('iBarman.php');


class Barman implements iBarman
{
  // Atributos
private $nombre;
private $bar;
private $aCocteles;
// Constructor
function Barman ($n,$b)
{
  $this->nombre= $n;
  $this->bar= $b;
  $this->aCocteles=array();
  echo "Barman creado correctamente.";
}

// Metodos
  public function setNombre($nombre)
  {
    $this->nombre= $nombre;
  }
  public function getNombre()
  {
    return $this->nombre;
  }
  
  public function setBar($bar)
  {
     $this->bar= $bar;
  }
  public function getBar()// devuelve el nombre del bar en el que trabaja.
  {
    return $this->bar;
  }
  public function servirCoctel($nombreCoctel) // devuelve la fórmula aprendida del coctel, si el barman no conoce el coctel pedido dará una excepción informándolo.
  {
    if (isset($this->aCocteles[$nombreCoctel]))
    {
      return $this->aCocteles[$nombreCoctel];
    }
    else
    {
       throw new Exception("No se conoce el coctel ".$nombreCoctel);
    }
  }
  public function aprenderCoctel($nombreCoctel,$formulaCoctel) // el barman aprende la fórmula de un coctel.
  {
    $this->aCocteles[$nombreCoctel] = $formulaCoctel;
  }  
  public function getAllCoctels() // devuelve todos los cócteles que sabe el barman.
  {
    return $this->aCocteles;
  }
  public function setAllCoctels($cocs) // devuelve todos los cócteles que sabe el barman.
  {
    $this->aCocteles=$cocs;
  }
}  
?>
 