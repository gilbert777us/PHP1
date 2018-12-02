<?php
require_once('iJugador.php');

class Jugador30 implements iJugador
{
    private $J01_nombreAlumno = "Alberto Fernandez";
    private $J01_nombreGuerra = "PUSILANIME MAN";
    private $J01_ruta_icono = "https://findicons.com/files/icons/176/monster/128/monster4.png";
  function Jugador30()
  {
    $_SESSION["J01_ultima_postura"] = "NULO";
    $_SESSION["J01_array_posturas"] = array();
  }
  public function setNombreAlumno($nAlumno) 
  {
    $this->J01_nombreAlumno=$nAlumno;
  }
  public function getNombreAlumno()
  {
    return $this->J01_ombreAlumno;
  }
  public function setNombreGuerra($nGuerra)
  {
    $this->J01_nombreGuerra=$nGuerra;
  }
  public function getNombreGuerra()
  {
    return $this->J01_nombreGuerra;
  }
  public function setIcono($ruta_icono)  
  {
    $this->J01_ruta_icono=$ruta_icono;
  }
  public function getIcono()
  {
    return $this->J01_ruta_icono;
  }
  
  // función que recibe el número de aciertos de la ronda anterior o si es 
  // la primera ronda recibirá el valor -1.
  // devuelve la postura siguiente del jugador como un string ej: "0010".
  public function jugar($numeroAciertosAnterior)
  {
    $postura ="0000";
    switch ($_SESSION["J01_ultima_postura"]) {
    case "NULO":
        $postura ="0000";
        break;
    case "0000":
        $postura ="0001";
        break;
    case "0001":
        $postura ="0010";
        break;
    case "0010":
        $postura ="0011";
        break;
    case "0011":
        $postura ="0100";
        break;
    case "0100":
        $postura ="0101";
        break;
    case "0101":
        $postura ="0110";
        break;
    case "0110":
        $postura ="0111";
        break;
    case "0111":
        $postura ="1000";
        break;
    case "1000":
        $postura ="1001";
        break;
    case "1001":
        $postura ="1010";
        break;
    case "1010":
        $postura ="1011";
        break;
    case "1011":
        $postura ="1100";
        break;
    case "1100":
        $postura ="1101";
        break;
    case "1101":
        $postura ="1110";
        break;
    case "1110":
        $postura ="1111";
        break;
    default:
        $postura ="0000";
}
    if ($numeroAciertosAnterior===-1)
    {
      $postura ="0000";
    }
    $_SESSION["J01_ultima_postura"] = $postura;
    $_SESSION["J01_array_posturas"][] = $postura;
    
    return $postura;
  }


}

?>