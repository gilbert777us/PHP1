<?php
require_once('iMueble.php');

class Mesa implements iMueble
{
    private $nombre = "mesilla";
    private $nPatas = 4;
    private $nSitios = 2;
    
    // Funciones de interfaz
    public function setModelo($nombre)
    {
      $this->nombre=$nombre;
    }
    public function getModelo()
    {
      return $this->nombre;
    }
    public function getNumeroPatas()
    {
      return $this->nPatas;
    }
    public function setNumeroPatas($no)
    {
      $this->nPatas=$no;
    }
    public function imprimirMueble()
    {
      print "Este mueble es una mesa de modelo ".$this->nombre." de ".$this->nSitios." sitios y con numero de patas: ".$this->nPatas;
    }
  
    // Funciones propias de Mesa
  
    public function getNumeroSitios()
    {
      return $this->nSitios;
    }
    public function setNumeroSitios($nS)
    {
      $this->nSitios=$nS;
    }

}

?>