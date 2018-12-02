<?php

require_once("iMueble.php");

class Armario implements iMueble
{
    private $modelo = "empotrado";
    private $nPatas = "4";  
  
    public function setModelo($mo)
    {
      $this->modelo=$mo;
    }
    public function getModelo()
    {
      return $this->modelo;
    }
    public function getNumeroPatas()
    {
      return $this->nPatas;
    }
    public function setNumeroPatas($n)
    {
      $this->nPatas = $n;
    }
  
   public function imprimirMueble()
   {
     print " El armario de tipo ".$this->modelo." y con numero de patas ". $this->nPatas;
   }
     
     
     
  
}
?>