<?php
require_once('iGuerrero.php');

class Guerrero implements iGuerrero
{
    private $nombre = "jose";
    private $equipo = "jose";
    private $aAmigos = array();
//    private $nPatas = 4;
//    private $nSitios = 2;

  // Funciones de interfaz
  public function setNombre($nombre)
  {
    $this->nombre=$nombre;
  }
  public function getNombre()
  {
    return $this->nombre;
  }
  public function setEquipo($equipo)
  {
    $this->equipo=$equipo;
  }
  public function getEquipo()
  {
    return $this->equipo;
  }

  public function setCategoria($cat){}  
  public function getCategoria(){}
  public function setPuntosVida($pv){}  
  public function getPuntosVida(){} 
  public function setAmigos($vector){
    $this->aAmigos=$vector;
  } 
  public function setAmigoI($posicionI,$amigo){} 
  public function getAmigos(){} // devuelve un vector
  public function getAmigoI($i){}

  
  
  
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