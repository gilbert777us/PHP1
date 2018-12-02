<?php
require_once('Cliente.php');
require_once('Empleado.php');
require_once('Pan.php');

class Local
{
  // Atributos
  var $nombre;
  var $aEmpleados;
  var $aPanes;
  // Constructor
  function Local ($nom)
  {
    $this->nombre=$nom;
    $this->aEmpleados=array();
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
        return $pani;
      }
    }
  }
  
  function vender($tipoPan)
  {      
 
  if ($this->existePanDeTipo($tipoPan))
  {
    $empleado = $this->aEmpleados[0];
    echo "<br/>Existe pan del tipo ".$tipoPan;
    $panDevuelto = $empleado->vender($this,$tipoPan);
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
  function addEmpleado($emp)
  {
    $this->aEmpleados[] = $emp;
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
$empleadoEdu = new Empleado ("Edu");
$empleadaBego = new Empleado ("Bego");
$panRedondo1 = new Pan ("Redondo");
$panRedondo2 = new Pan ("Redondo");
$panFino1 = new Pan ("Fino");

$localEdus->addEmpleado($empleadoEdu);
$localEdus->addEmpleado($empleadaBego);
$localEdus->addPan($panRedondo1);
$localEdus->addPan($panRedondo2);
$localEdus->addPan($panFino1);
var_dump($localEdus);


//$clienteLuis->preguntar($localEdus,"Redondo");
$clienteLuis->preguntar($localEdus,"Fino");
$clienteLuis->preguntar($localEdus,"Redondo");
$clienteLuis->preguntar($localEdus,"Redondo");


var_dump($localEdus);


?>