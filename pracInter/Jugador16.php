<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 18/01/2018
 * Time: 18:46
 */

require_once("iJugador.php");

class Jugador16 implements iJugador
{
	var $j16_name      = "Carlos Ríos Alcántara";
	var $j16_warname   = "Lynx-Masked";
	var $j16_icon_path = "https://cdn.shopify.com/s/files/1/1495/0274/t/3/assets/logo.png";

	var $j16_trial;
	var $j16_possibilities;

	public function __construct()
	{
		$this->jugar(-1);
	}

	public function jugar($numeroAciertosAnterior)
	{
		if ($numeroAciertosAnterior < 0) {
			$this->generatePossibilities();
//			var_dump($this->j16_possibilities);
			////echo "Next trial: " . $this->j16_trial . "<br>";
			return $this->j16_trial = "0011";
			/*          OLD
			//          $this->j16_trial = array(0, 0, 1, 1);
			//			return implode($this->j16_trial);
			*/
		}
		else if ($numeroAciertosAnterior == 4) {
			return $this->j16_trial = "VICTORY";
		}
		else {
			foreach ($this->j16_possibilities as $trial) {
				/*          OLD
				//			for($i=0;$i<count($this->j16_possibilities);$i++){
				//				$trial=$this->j16_possibilities[$i];
				*/
				$count     = 0;
				$bit_array = str_split($this->j16_trial);
				for ($j = 0; $j < 4; $j++) {
					/*                  OLD
					//					if ($trial[$j]==$this->j16_trial[$j]) $count++;
					*/
					if ($trial[$j] == $bit_array[$j]) $count++;
				}
				if ($count != $numeroAciertosAnterior) {
					$this->removeTrial($trial);
				}
			}
//			var_dump($this->j16_possibilities);
			$this->j16_possibilities = array_values($this->j16_possibilities);
			if (count($this->j16_possibilities) > 1) {
				$this->j16_trial = $this->j16_possibilities[1];
			}
			else if(count($this->j16_possibilities)==1) {
				$this->j16_trial = $this->j16_possibilities[0];
			}
			else {
				$this->j16_trial = "VACÍO";
			}
			//var_dump($this->j16_possibilities);
			//echo "Next trial: " . $this->j16_trial . "<br>";
			return $this->j16_trial;
			/*          OLD
			//			//echo "Next trial: ".implode($this->j16_possibilities[0])."<br>";
			//			return implode($this->j16_possibilities[0]);
			*/
		}
	}

	private function generatePossibilities()
	{
		for ($i = 0; $i < (1 << 4); ++$i) {
			/*			OLD
			//			$int_array = array();
			//			$str_array = str_split(sprintf("%04b",$i));
			//			foreach ($str_array as $each_number) {
			//				$int_array[] = (int) $each_number;
			//			}
			//			$this->j16_possibilities[]= $int_array;
			*/
			$str_array                 = sprintf("%04b", $i);
			$this->j16_possibilities[] = $str_array;
		}
	}

	private function removeTrial($trial)
	{
		/*		OLD
		//		var_dump($this->j16_possibilities);
		//		//echo "<br>";
		//      var_dump(array($trial));
		//		//echo "Remove ".implode($trial)."<br>";
		*/
		//echo "Remove " . $trial . "<br>";
		$this->j16_possibilities = array_diff($this->j16_possibilities, array($trial));
//		//echo "Size ".count($this->j16_possibilities)."<br>";
	}

	public function setNombreAlumno($nAlumno)
	{
//		$this->j16_name = $nAlumno;
	}

	public function getNombreAlumno()
	{
		return $this->j16_name;
	}

	public function setNombreGuerra($nGuerra)
	{
//		$this->j16_warname = $nGuerra;
	}

	public function getNombreGuerra()
	{
		return $this->j16_warname;
	}

	public function setIcono($ruta_icono)
	{
//		$this->j16_icon_path = $ruta_icono;
	}

	public function getIcono()
	{
		return $this->j16_icon_path;
	}


}

?>