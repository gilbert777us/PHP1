<?php

require_once("iGuerrero.php");

class Guerrero implements iGuerrero{



	var $nombre;
	var $equipo;
	var $categoria;
	var $vida;
	var $aAmigos = array();


  public function setNombre($nombre)
  {

  		$this->nombre=$nombre;
  }


  public function getNombre()
  {
  		
 return $this->nombre;
  }




  public function setEquipo($eq)
  {
  	 $this->equipo=$eq;
  } 


  public function getEquipo()
  {
  		return $this->equipo;
  }

  public function setCategoria($cat)
  {
  		$this->categoria=$cat;
  }
  public function getCategoria()
  {
  		return $this->categoria;
  }
  public function setPuntosVida($pv)
  {
  		$this->vida=$pv;
  }


  public function getPuntosVida()
  {
  		return $this->vida;
  }

  public function setAmigos($vector)
  {
  		$this->aAmigos=$vector;
  } 


  public function setAmigoI($posicionI,$amigo)
  {
    $this->aAmigos[$posicionI]=$amigo;
  } 

  public function getAmigos()
  {
  		$this->aAmigos;
  }

  public function getAmigoI($i)
  {
  		return $this->amigos[$i];
  }

}

?>