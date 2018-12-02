<?php
interface iJugador { 
  public function setNombreAlumno($nAlumno);  
  public function getNombreAlumno();
  public function setNombreGuerra($nGuerra);  
  public function getNombreGuerra();
  public function setIcono($ruta_icono);  
  public function getIcono();
  
  // función que recibe el número de aciertos de la ronda anterior o si es 
  // la primera ronda recibirá el valor -1.
  // devuelve la postura siguiente del jugador como un string ej: "0010".
  public function jugar($numeroAciertosAnterior);
}
?>