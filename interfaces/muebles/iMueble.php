<?php
interface iMueble { 
  public function setModelo($nombre);  
  public function getModelo();
  public function getNumeroPatas();
  public function setNumeroPatas($n);
  public function imprimirMueble();
  
}
?>