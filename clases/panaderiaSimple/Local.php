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
    echo "<br/>Local creado con nombre: ".$this->nombre;
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
  
  function vender($tipoPan)
  {      
 
  if ($this->existePanDeTipo($tipoPan))
  {
    echo "<br/>Existe pan del tipo ".$tipoPan;
    $panDevuelto = $this->cogerPan($tipoPan);
    if (!(""==$panDevuelto))
    {
      echo "<br/>Se vende el siguiente pan ";
      var_dump($panDevuelto);
      return $panDevuelto->entregar();
    }     
  }
  else
  {
    echo "<br/>No hay pan del tipo ".$tipoPan;
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


$localEdus = new Local("*** LA PANADERIA DE EDUs ***");
$clienteLuis = new Cliente (100,"Luis");
$panRedondo1 = new Pan ("Redondo");
$panRedondo2 = new Pan ("Redondo");
$panFino1 = new Pan ("Fino");
$localEdus->addPan($panRedondo1);
$localEdus->addPan($panRedondo2);
$localEdus->addPan($panFino1);

//var_dump($localEdus);

echo " <br/> EMPIEZA LA VENTA <br/>";

$panDevuelto = $clienteLuis->preguntar($localEdus,"Fino");
echo " <br/> pedimos otro pan fino <br/>";
$panDevuelto2 = $clienteLuis->preguntar($localEdus,"Fino");
$panDevuelto3 = $clienteLuis->preguntar($localEdus,"Redondo");
$panDevuelto4 = $clienteLuis->preguntar($localEdus,"Redondo");
$panDevuelto5 = $clienteLuis->preguntar($localEdus,"Redondo");
//var_dump($panDevuelto);
//$clienteLuis->preguntar($localEdus,"Redondo");
//$clienteLuis->preguntar($localEdus,"Redondo");


//var_dump($localEdus);


?>