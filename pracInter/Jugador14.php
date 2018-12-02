<?php
require_once('iJugador.php');


class Jugador14 implements iJugador
{
  // Atributos
var $j14_nomAlumn ;
var $j14_nomGuerra ;
var $j14_icono ;
var $j14_jugadaUno;
var $j14_jugadaActual;
// Constructor
function Jugador14 ()
{
  $this->j14_nomAlumn = "Alvaro";
  $this->j14_nomGuerra = "Maisterminder";
  $this->j14_icono = "https://findicons.com/files/icons/2841/very_emotional_emoticons_remastered_2014/128/52_y.png";
  $this->j14_jugadaUno = "0000";
 
}

public function invertir($j14_jugadaActual){
 
  global $j14_jugadaActual;

  if($j14_jugadaActual == "0000"){
    return "1111";
  }
  if($j14_jugadaActual == "0001"){
    return "1110";
  }
  if($j14_jugadaActual == "0010"){
    return "1101";
  }
  if($j14_jugadaActual == "0100"){
    return "1011";
  }
  if($j14_jugadaActual == "1000"){
    return "0111";
  }
  if($j14_jugadaActual == "0011"){
    return "1100";
  }
  if($j14_jugadaActual == "0110"){
    return "1001";
  }
  if($j14_jugadaActual == "1100"){
    return "0011";
  }
  if($j14_jugadaActual == "0111"){
    return "1000";
  }
  if($j14_jugadaActual == "1110"){
    return "0001";
  }
  if($j14_jugadaActual == "1111"){
    return "0000";
  }
  if($j14_jugadaActual == "1001"){
    return "0110";
  }
  if($j14_jugadaActual == "1010"){
    return "0101";
  }
  if($j14_jugadaActual == "0101"){
    return "1010";
  }
  if($j14_jugadaActual == "1011"){
    return "0100";
  }
  if($j14_jugadaActual == "1101"){
    return "0010";
  }

}
public function setNombreAlumno($nA)
  {
    $this->j14_nomAlumn = $nA;
  }
  public function getNombreAlumno()
  {
    return $this->j14_nomAlumn;
  }
  public function setNombreGuerra($nG)
  {
    $this->j14_nomGuerra = $nG;
  }
  public function getNombreGuerra()
  {
    return $this->j14_nomGuerra;
  }
  public function setIcono($ic)
  {
  	$this->j14_icono = $ic;
  }
  public function getIcono()
  {
  	return $this->j14_icono;
  }
  
  // función que recibe el número de aciertos de la ronda anterior o si es 
  // la primera ronda recibirá el valor -1.
  // devuelve la postura siguiente del jugador como un string ej: "0010".
  public function jugar($numeroAciertosAnterior)
  {
    global $j14_jugadaActual;
    
    $j14_aleatorio = array(rand(0,1),rand(0,1),rand(0,1),rand(0,1));

  	if($numeroAciertosAnterior==-1)
  	{
      return $this->j14_jugadaUno;

      $j14_jugadaActual = $this->j14_jugadaUno;

  	}
  	elseif($numeroAciertosAnterior==0)
  	{
      $j14_jugadaActual1 = invertir($j14_jugadaActual);
      
      return $j14_jugadaActual1;
  	}
  	if($numeroAciertosAnterior==1)
  	{
  		return $j14_aleatorio;
  	}
  	if($numeroAciertosAnterior==2)
  	{
  		return $j14_aleatorio;
  	}
  	if($numeroAciertosAnterior==3)
  	{
  		return $j14_aleatorio;
  	}
}
}
?>