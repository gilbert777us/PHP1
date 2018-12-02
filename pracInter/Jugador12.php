<?php
	require_once('iJugador.php');

	/**
	* 
	*/

	class Jugador12 implements iJugador
	{
		private $a="Nicolas";
		private $j12_NombreDeGuerra="Don Kaos <3";
		private $j12_Ruta="https://icon-icons.com/icons2/37/PNG/128/Vikinghelmet_viking_3368.png";
		private $j12_jugadas=15;
		private $j12_resultado;
		private $j12_numeroAnterior='1001';

        public function setNombreAlumno($nom){
        	global $a;
			$this->$a=$nom;
		}

		public function getNombreAlumno(){
			return 'Nicolas';
		}

		public function setNombreGuerra($nomg){
			$this->j12_NombreDeGuerra=$nomg;
		}

		public function getNombreGuerra(){
			return $this->j12_NombreDeGuerra;
		}
		public function setIcono($icono){
			$this->j12_Ruta = $icono;
		}

		public function getIcono(){
			return $this->j12_Ruta;
		}

		public function sacarResultado($num){
			global $j12_numeroAnterior;
			if ($num==0) {
				$numero;
				$mil = ($j12_numeroAnterior % 10000) / 1000;
			 	$cien = ($j12_numeroAnterior % 10000) % 1000 / 100;
			 	$diez = (($j12_numeroAnterior % 10000) % 1000) % 100 / 10;
			 	$uno = ((($j12_numeroAnterior % 10000) % 1000) % 100) % 10;

			 	$milc = 0;
			 	$cienc = 0;
			 	$diezc = 0;
			 	$unoc = 0;

			 	if ($mil==1) {
			 		$milc = 0;
			 	}
			 	elseif ($mil==0) {
			 		$milc = 1;
			 	}
			 	elseif ($cien==1) {
			 		$cienc = 0;
			 	}
			 	elseif ($cien==0) {
			 		$cienc = 1;
			 	}
			 	elseif ($diez==1) {
			 		$diezc = 0;
			 	}
			 	elseif ($diez==0) {
			 		$diezc = 1;
			 	}
			 	elseif ($uno==1) {
			 		$unoc = 0;
			 	}
			 	elseif ($uno==0) {
			 		$unoc = 1;
			 	}
			 	$numero=$milc*1000+$cienc*100+$diezc*10+$unoc;
			 	$j12_numeroAnterior = $numero;
			 	return $numero;


			}
		}
		public function jugar($num){
			$j12_var=array('0000','0001','0010','0011','0100','0101','0110','0111','1000','1001','1010','1011','1100','1101','1110','1111');
			$ramdom= rand(0,15);
			switch ($num) {
				case '-1':
					return $j12_var[9];
					break;
				case '0':
					return $j12_var[$ramdom];
					break;
				case '1':
					return $j12_var[$ramdom];
					break;
				case '2':
					return $j12_var[$ramdom];
					break;
				case '3':
					return $j12_var[$ramdom];
					break;
				default:
					# code...
					break;
			}
		}
	}
	
?>