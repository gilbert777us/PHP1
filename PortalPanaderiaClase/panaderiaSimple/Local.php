<?php
require_once('Cliente.php');
require_once('Pan.php');

class Local
{
  // Atributos
  var $nombre;
  var $aPanes;
  // Constructor
  function Local ($nom)
  {
    $this->nombre=$nom;
    $this->aPanes=array();
    //echo "<br/>Local creado con nombre: ".$this->nombre;
  }
  // Metodos
  function cogerPan($tipoPan)
  {
    for ($i=0;$i<count($this->aPanes);$i++)
    {
      $pani = $this->aPanes[$i];
      if (strcmp($pani->tipo,$tipoPan)==0)
      {
        unset($this->aPanes[$i]);
        $this->aPanes= array_values($this->aPanes);
        return $pani;
      }
    }
  }
  
  function cuantosPanes($tipoPan)
  {
    $value =0;
    for ($i=0;$i<count($this->aPanes);$i++)
    {
      $pani = $this->aPanes[$i];
      if (strcmp($pani->tipo,$tipoPan)==0)
      {
        $value +=1;
      }
    }
    return $value;
  }   
  
   function cogerPrecio($tipoPan)
  {
     $value =0;
    switch ($tipoPan) {
    case "Redondo":
        $value=20;
        break;
    case "Fino":
        $value=15;
        break;
    case "Payes":
        $value=50;
        break;
    }
     // echo 'va a devolver:'.$value;
     return $value;
  }
 
  function vender($tipoPan)
  {      
 
  if ($this->existePanDeTipo($tipoPan))
  {
    //echo "<br/>Existe pan del tipo ".$tipoPan;
    $panDevuelto = $this->cogerPan($tipoPan);
    if (!(""==$panDevuelto))
    {
      //echo "<br/>Se vende el siguiente pan ";
      //var_dump($panDevuelto);
      return $panDevuelto->entregar();
    }     
  }
  else
  {
    //echo "<br/>No hay pan del tipo ".$tipoPan;
    return "";
  }
  }
  function addPan($pan)
  {
    $this->aPanes[] = $pan;
  }  
  function existePanDeTipo($tipoPan)
  {
   
    for ($i=0;$i<count($this->aPanes);$i++)
    {
      $pani = $this->aPanes[$i];
      if (strcmp($pani->tipo,$tipoPan)==0)
      {
        return true;
      }
    }
    return false;
  }
}



?>