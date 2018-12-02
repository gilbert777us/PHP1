<?php
require_once('iJugador.php');
class Jugador03 implements iJugador{
//atributos
	var $j03_nombre="Manuel Costafreda";
	var $j03_nombreGuerra="mcm";
	var $j03_icono="https://pbs.twimg.com/profile_images/653042577529139201/pl1WOH2w.jpg";
//getter setter nombre
	public function setNombreAlumno($nAlumno){
		$this->j03_nombre=$nAlumno;
	}
	public function getNombreAlumno(){
		return $this->j03_nombre;
	}
//getter setter nombreGuerra
	public function setNombreGuerra($nGuerra){
		$this->j03_nombreGuerra=$nGuerra;
	}
	public function getNombreGuerra(){
		return $this->j03_nombreGuerra;
	}
//getter setter ico
	public function setIcono($ruta_icono){
		$this->j03_icono=$ruta_icono;
	}

	public function getIcono(){
		return $this->j03_icono;
	}

	public function jugar($numeroAciertosAnterior){
		global $contador, $j12_resultado;
			$j12_var=array('0000','0001','0010','0011','0100','0101','0110','0111','1000','1001','1010','1011','1100','1101','1110','1111');
			$ramdom= rand(0,15);
			switch ($numeroAciertosAnterior) {
				case '-1':
					$contador = 9;
					return $j12_var[9];
					break;
				case '0':
					if ($contador==0) {
						return $j12_var[15];
					}
					elseif ($contador==1) {
						return $j12_var[14];
					}
					elseif ($contador==2) {
						return $j12_var[13];
					}
					elseif ($contador==3) {
						return $j12_var[12];
					}
					elseif ($contador==4) {
						return $j12_var[11];
					}
					elseif ($contador==5) {
						return $j12_var[10];
					}
					elseif ($contador==6) {
						return $j12_var[9];
					}
					elseif ($contador==7) {
						return $j12_var[8];
					}
					elseif ($contador==8) {
						return $j12_var[7];
					}
					elseif ($contador==9) {
						return $j12_var[6];
					}
					elseif ($contador==10) {
						return $j12_var[5];
					}
					elseif ($contador==11) {
						return $j12_var[4];
					}
					elseif ($contador==12) {
						return $j12_var[3];
					}
					elseif ($contador==13) {
						return $j12_var[2];
					}
					elseif ($contador==14) {
						return $j12_var[1];
					}
					elseif ($contador==15) {
						return $j12_var[0];
					}
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