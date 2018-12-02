<?php
/*session_start();

$_SESSION['j17_arrayIntroducidos']  = [];*/

require_once('iJugador.php');

class Jugador17 implements iJugador
{
    private $j17_nAlumno = 'Alberto'; 
	private $j17_nGuerra = 'Fsociety'; 
	private $j17_icono = 'https://cdn.iconscout.com/public/images/icon/premium/png-128/fsociety-mask-3ec74b5b05910ade-128x128.png';
	
  
    public function setNombreAlumno($nom)
    {
      	$this->nAlumno=$nom;
    }
    public function getNombreAlumno()
    {
      	return $this->j17_nAlumno;
    }
	
	public function getNombreGuerra() {
		return $this->j17_nGuerra;
	}
	
	public function setNombreGuerra($guerra) {
		return $this->nGuerra=$guerra;
	}
	
	public function getIcono() {
		return $this->j17_icono;
	}
	
	public function setIcono($icono) {
		return $this->icono = $icono;
	}
	
	
	
	public function jugar($numeroAciertosAnterior) {
		
		$j17_arrayAnteriores = array();
		$j17_arrayPosibles = array(
								'0001',
								'0010',
								'0100',
								'1000',
								'1100',
								'1110',
								'0111',
								'0011',
								'0110',
								'0101',
								'0110',
								'1010',
								'1011',
								'1101'
								);
		
		//EMPIEZA
		if($numeroAciertosAnterior == '-1') {
			return '0000';
	
		}
		
		//NUMERO ACIERTOS = 0
		else if($numeroAciertosAnterior == '0') {
			return '1111';
		}
		
		//NUMERO ACIERTOS > 0
		else if($numeroAciertosAnterior > '0') {
			
			$rand = range(0,12);
			shuffle($rand); //mezcla los numeros
			
			//Para que no se repitan los aleatorios
			foreach ($rand as $val) {
			
				$aleatorio = $j17_arrayPosibles[$val];
				//echo $aleatorio . " ";
				//$arr2 = str_split($aleatorio, 4); //como sale junto, divide la cadena en 4
				//$arr2 = explode(" ", $aleatorio);
				
				
			}
			return $aleatorio;
			//muestro la cadena
			//var_dump($aleatorio);
			/*$rand = array_rand($j17_arrayPosibles);
			$aleatorio = $j17_arrayPosibles[$rand];
			echo $aleatorio;*/
			
			//echo $j17_arrayPosibles[array_rand($j17_arrayPosibles)];
		
		
		}
	}
}

?>