<?php
interface iGuerrero { 
  public function setNombre($nombre);  
  public function getNombre();
  public function setEquipo($eq);  
  public function getEquipo();
  public function setCategoria($cat);  
  public function getCategoria();
  public function setPuntosVida($pv);  
  public function getPuntosVida(); 
  public function setAmigos($vector);  
  public function setAmigoI($posicionI,$amigo);  
  public function getAmigos(); // devuelve un vector
  public function getAmigoI($i);
}
?>
