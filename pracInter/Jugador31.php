<?php
require_once('iJugador.php');

class Jugador31 implements iJugador
{
    private $J02_nombreAlumno = "Arnaldo Santos";
    private $J02_nombreGuerra = "EL ENSORDECEDOR";
    private $J02_ruta_icono = "https://findicons.com/files/icons/176/monster/128/monster5.png";
  function Jugador31()
  {
    $_SESSION["J02_ultima_postura"] = "NULO";
    $_SESSION["J02_array_posturas"] = array();
  }
  public function setNombreAlumno($nAlumno) 
  {
    $this->J02_nombreAlumno=$nAlumno;
  }
  public function getNombreAlumno()
  {
    return $this->J02_ombreAlumno;
  }
  public function setNombreGuerra($nGuerra)
  {
    $this->J02_nombreGuerra=$nGuerra;
  }
  public function getNombreGuerra()
  {
    return $this->J02_nombreGuerra;
  }
  public function setIcono($ruta_icono)  
  {
    $this->J02_ruta_icono=$ruta_icono;
  }
  public function getIcono()
  {
    return $this->J02_ruta_icono;
  }
  
  // función que recibe el número de aciertos de la ronda anterior o si es 
  // la primera ronda recibirá el valor -1.
  // devuelve la postura siguiente del jugador como un string ej: "0010".
  public function jugar($numeroAciertosAnterior)
  {
    $postura ="".rand (0,1).rand (0,1).rand (0,1).rand (0,1);
    
    if (in_array($postura,$_SESSION["J02_array_posturas"])) 
    {
      return $this->jugar($numeroAciertosAnterior);
    }
    else
    {
       $_SESSION["J02_array_posturas"][] = $postura;
      return $postura;
    }
  }

}

?>