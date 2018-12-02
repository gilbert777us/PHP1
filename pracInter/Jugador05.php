<?php

$con1 = 0;
$con2 = 0;
$con3 = 0;
$con4 = 0;

require_once("iJugador.php");

class Jugador05 implements iJugador
{
    private $nAlumno = "Rafael"; 
	private $nGuerra = "Yoghurtlado"; 
	private $icono = "https://image.flaticon.com/icons/svg/110/110388.svg";
	
    
    public function setNombreAlumno($nom)
    {
      	$this->nAlumno=$nom;
    }
    public function getNombreAlumno()
    {
      	return $this->nAlumno;
    }
	
	public function getNombreGuerra() {
		return $this->nGuerra;
	}
	
	public function setNombreGuerra($guerra) {
		return $this->nGuerra=$guerra;
	}
	
	public function getIcono() {
		return $this->icono;
	}
	
	public function setIcono($ruta_icono) {
		return $this->icono = $icono;
	}

	public function jugar($numeroAciertosAnterior) {
		
		echo 'numeroAciertosAnterior:'.$numeroAciertosAnterior;
		
		$j05_arrayCombinaciones = array(0000,
								0001,0010,0100,
								1000,1100,1110,
								1111,0111,0011,
								0110,0101,0110,
								1010,1011,1101);

		if ($numeroAciertosAnterior == -1){    //0000
				return 0000;
		}

		else if ($numeroAciertosAnterior == '0'){  //0110,  1001,  1101
				$con1 = $con1 +1;

				if($con1 == 1){
					return 0110;
				}
				else if ($con1 == 2){
					return 1001;
				}
				else{
					return 1101;
				}
		}

		else if ($numeroAciertosAnterior == '1'){	//0001,  0010,   0100,   0111,   1110
				$con2 = $con2 +1;

				if($con2 == 1){
					return 0001;
				}
				else if ($con2 == 2){
					return 0010;
				}
				else if ($con2 == 3){
					return 0100;
				}
				else if ($con2 == 4){
					return 0111;
				}
				else{
					return 1110;
				}
		}

		else if ($numeroAciertosAnterior == '2'){	//1111,   1100,   0011,   1010,   0101   
				$con3 = $con3 +1;

				if($con3 == 1){
					return 1111;
				}
				else if ($con3 == 2){
					return 1100;
				}
				else if ($con3 == 3){
					return 0011;
				}
				else if ($con3 == 4){
					return 1010;
				}
				else{
					return 0101;
				}
		}

		else if ($numeroAciertosAnterior == '3'){	//1000,   0001
				$con4 = $con4 +1;

				if($con4 == 1){
					return 1000;
				}
				else{
					return 0001;
				}
		}
	}
}
?>