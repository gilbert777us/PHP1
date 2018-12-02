<?php
	$_SESSION["valor1"] = "0000";
	$_SESSION["valor2"] = "1111";
	$_SESSION["valor3"] = "0011";	
	$_SESSION["valor4"] = "1100";	
	$_SESSION["valor5"] = "1010";
	$_SESSION["valor6"] = "0101";
	$_SESSION["valor7"] = "1000";
	$_SESSION["valor8"] = "0001";
	$_SESSION["valor9"] = "0010";
	$_SESSION["valor10"] = "0100";
	$_SESSION["valor11"] = "0110";
	$_SESSION["valor12"] = "0111";
	$_SESSION["valor13"] = "1001";
	$_SESSION["valor14"] = "1011";
	$_SESSION["valor15"] = "1101";
	$_SESSION["valor16"] = "1110";

	
	if (isset($_SESSION["contador"])) $_SESSION["contador"]=0;



	require_once("iJugador.php");

class Jugador10 implements iJugador{
	var $j10_nAlumno;
	var $j10_nGuerra;
	var $j10_ruta_icono;
	var $j10_numeroAciertosAnterior;

	public function Jugador10(){
		$this->j10_nAlumno = "Javier Millo";
		$this->j10_nGuerra = "Peter Griffin";
		$this->j10_ruta_icono = "http://vignette1.wikia.nocookie.net/family-guy-the-quest-for-stuff/images/8/86/Rollerbal.png/revision/latest?cb=20140717092508";
	}

	//Nombre Real
	public function getNombreAlumno(){
		return $this->j10_nAlumno;
	}

	public function setNombreAlumno($j10_nAlumno){
		$this->j10_nAlumno=$j10_nAlumno;
	}

	//Nombre Guerra
	public function setNombreGuerra($j10_nGuerra){
		$this->j10_nGuerra=$j10_nGuerra;
		return $this->j10_nGuerra;
	}
	public function getNombreGuerra(){
		return $this->j10_nGuerra;
	}


	// ICONO

	public function getIcono(){
		return $this->j10_ruta_icono;
	}

	public function setIcono($j10_ruta_icono){
		$this->j10_ruta_icono=$j10_ruta_icono;
	}

	
	
	public function jugar($j10_numeroAciertosAnterior){
		if ($j10_numeroAciertosAnterior == -1) {

			return $_SESSION["valor1"];
		}
		elseif ($_SESSION["contador"] == 0) {
			$_SESSION["contador"]++;
			return $_SESSION["valor2"];
		}
		elseif ($_SESSION["contador"] == 1) {
			$_SESSION["contador"]++;
			return $_SESSION["valor3"];
		}
		elseif ($_SESSION["contador"] == 2) {
			$_SESSION["contador"]++;
			return $_SESSION["valor4"];
		}
		elseif ($_SESSION["contador"] == 3) {
			$_SESSION["contador"]++;
			return $_SESSION["valor5"];
		}
		elseif ($_SESSION["contador"] == 4) {
			$_SESSION["contador"]++;
			return $_SESSION["valor6"];
		}
		elseif ($_SESSION["contador"] == 5) {
			$_SESSION["contador"]++;
			return $_SESSION["valor7"];
		}
		elseif ($_SESSION["contador"] == 6) {
			$_SESSION["contador"]++;
			return $_SESSION["valor8"];
		}
		elseif ($_SESSION["contador"] == 7) {
			$_SESSION["contador"]++;
			return $_SESSION["valor9"];
		}
		elseif ($_SESSION["contador"] == 8) {
			return $_SESSION["valor10"];
		}
		elseif ($_SESSION["contador"] == 9) {
			return $_SESSION["valor11"];
		}
		elseif ($_SESSION["contador"] == 10) {
			$_SESSION["contador"]++;
			return $_SESSION["valor12"];
		}
		elseif ($_SESSION["contador"] == 11) {
			$_SESSION["contador"]++;
			return $_SESSION["valor13"];
		}
		elseif ($_SESSION["contador"] == 12) {
			$_SESSION["contador"]++;
			return $_SESSION["valor14"];
		}
		elseif ($_SESSION["contador"] == 13) {
			$_SESSION["contador"]++;
			return $_SESSION["valor15"];
		}
		elseif ($_SESSION["contador"] == 14) {
			$_SESSION["contador"]++;
			return $_SESSION["valor16"];
		}

		
		

		
		
		
	}
}


	
	

  ?>