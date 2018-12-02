<?php

	$_SESSION["j09_d1"]=rand(0,1);
	$_SESSION["j09_d2"]=rand(0,1);
	$_SESSION["j09_d3"]=rand(0,1);
	$_SESSION["j09_d4"]=rand(0,1);
	$_SESSION["j09_postura"]=$_SESSION["j09_d1"]."".$_SESSION["j09_d2"]."".$_SESSION["j09_d3"].$_SESSION["j09_d4"];
	


	require_once("iJugador.php");

class Jugador09 implements iJugador{
	private $j09_nAlumno;
	private $j09_nGuerra;
	private $j09_icono;
	private $j09_numeroAciertosAnterior;


	public function jugar($j09_numeroAciertosAnterior){
		return $_SESSION["j09_postura"];
		
		
	}

	public function Jugador09(){
		$this->j09_nAlumno = "Alvaro Mendivil";
		$this->j09_nGuerra = "Cartman Hitler";
		$this->j09_icono = "https://findicons.com/files/icons/213/south_park/128/cartman_hitler_head_icon.png";
	}

	public function getNombreAlumno(){
		return $this->j09_nAlumno;
	}

	public function setNombreAlumno($j09_nAlumno){
		$this->j09_nAlumno=$j09_nAlumno;
	}

	public function setNombreGuerra($j09_nGuerra){
		$this->j09_nGuerra=$j09_nGuerra;
		return $this->j09_nGuerra;
	}
	public function getNombreGuerra(){
		return $this->j09_nGuerra;
	}

	public function getIcono(){
		return $this->j09_icono;
	}

	public function setIcono($j09_icono){
		$this->j09_icono=$j09_icono;
	}
	
	
}
?>