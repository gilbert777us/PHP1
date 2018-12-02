<?php
require_once('iJugador.php');

class Jugador08 implements iJugador
{
  public function setNombreAlumno($nAlumno)
  {
    $this->nombreAlumno = $nAlumno;
  }
  public function getNombreAlumno()
  {
    return $this->nombreAlumno;
  }
  public function setNombreGuerra($nGuerra)
  {
    $this->nombreGuerraAlumno = $nGuerra;
  } 
  public function getNombreGuerra()
  {
    return $this->nombreGuerraAlumno;
  }
  public function setIcono($ruta_icono)
  {
    $this->numIcono = $ruta_icono;
  }
  public function getIcono()
  {
    return $this->numIcono;
  }
  
  // /función que recibe el número de aciertos de la ronda anterior o si es 

  // la primera ronda recibirá el valor -1.
  public function getNumAciertos()
  {
    return $this->jugadaAnterior;
  }
  
  // devuelve la postura siguiente del jugador como un string ej: "0010".
  public function jugar($numeroAciertosAnterior)
  {
    $jug1 = rand(0, 1);
    $jug2 = rand(0, 1);
    $jug3 = rand(0, 1);
    $jug4 = rand(0, 1);

    $jugada = strval($jug1) . strval($jug2) . strval($jug3) . strval($jug4);

    return $jugada;
  }

  private $jugadaAnterior = -1;
  private $numIcono = "https://mariskalrock.com/wp-content/uploads/2017/06/Mago-de-Oz-Ilussia.jpg";
  private $nombreAlumno = "Luis";
  private $nombreGuerraAlumno = "Illusia";
};
?>