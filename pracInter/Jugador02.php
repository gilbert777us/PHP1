<?php
	$_SESSION["clave1"] = "1010";
	$_SESSION["clave2"] = "0101";
	$_SESSION["n1"] = rand(0,1);
	$_SESSION["n2"] = rand(0,1);
	$_SESSION["n3"] = rand(0,1);
	$_SESSION["n4"] = rand(0,1);
	$_SESSION["postura1"] = $_SESSION["n1"]."".$_SESSION["n2"]."".$_SESSION["n3"]."".$_SESSION["n4"];
	require_once("iJugador.php");

class Jugador02 implements iJugador{
	private $nAlumno;
	private $nGuerra;
	private $ruta_icono;
	private $numeroAciertosAnterior;

	public function Jugador02(){
		$this->nAlumno = "Miguel Campos";
		$this->nGuerra = "Jimok";
		$this->ruta_icono = "https://res.cloudinary.com/teepublic/image/private/s--kuPTocn5--/t_Resized%20Artwork/c_fit,g_north_west,h_954,w_954/co_191919,e_outline:48/co_191919,e_outline:inner_fill:48/co_ffffff,e_outline:48/co_ffffff,e_outline:inner_fill:48/co_bbbbbb,e_outline:3:1000/c_mpad,g_center,h_1260,w_1260/b_rgb:eeeeee/c_limit,f_auto,h_285,q_90,w_285/v1515560029/production/designs/2268508_1";
	}

	public function setNombreAlumno($nAlumno){
		$this->nAlumno=$nAlumno;
	}
	public function getNombreAlumno(){
		return $this->nAlumno;
	}
	public function setNombreGuerra($nGuerra){
		$this->nGuerra=$nGuerra;
		return $this->nGuerra;
	}
	public function getNombreGuerra(){
		return $this->nGuerra;
	}
	public function setIcono($ruta_icono){
		$this->ruta_icono=$ruta_icono;
	}
	public function getIcono(){
		return $this->ruta_icono;
	}
	
	public function jugar($numeroAciertosAnterior){
		if ($numeroAciertosAnterior == -1) {
			return $_SESSION["postura1"];
		}
		else if ($numeroAciertosAnterior == 0) {
			
			return $_SESSION["postura1"];
		}
		else if ($numeroAciertosAnterior == 1) {
			return $_SESSION["postura1"];
		}
		else if ($numeroAciertosAnterior == 2) {
			return $_SESSION["postura1"];
		}
		else if ($numeroAciertosAnterior == 3) {
			return $_SESSION["postura1"];
		}
		
	}
}


	
	

  ?>