<?php 
	require_once('iJugador.php');

	/**
	* 
	*/
	class Jugador04 implements iJugador
	{
		private $j04_Nombre="Gregory";
		private $j04_NombreDeGuerra="keko";
		private $j04_Ruta="https://vignette.wikia.nocookie.net/scribblenauts/images/0/06/Gamer.png/revision/latest?cb=20130101110059";



	//metodos
	public function setNombreAlumno($nAlumno){
		$this->j04_Nombre=$nAlumno;
	}
	public function getNombreAlumno(){
		echo $this->$j04_Nombre;
	}

	public function setNombreGuerra($nGuerra){
		$this->j04_NombreDeGuerra=$nGuerra;
	}

	public function getNombreGuerra(){
		echo $this->j04_NombreDeGuerra;
	}

	public function setIcono($ruta_icono){
		$this->j04_Ruta = $ruta_icono;
	}

	public function getIcono(){
		echo $this->j04_Ruta;
	}

	public function jugar($numero){
		$j04_numero = array();
		$j04_lista = array("0000","0001","0010","0011","0100","0101","0110","0111","1000","1001","1010","1011","1100","1101","1110","1111");	
  		$r1=mt_rand(0,1);
  		$r2=mt_rand(0,1);
  		$r3=mt_rand(0,1);
  		$r4=mt_rand(0,1);

  		return $r1 . $r2 . $r3 . $r4 ;


	}	
}


 ?>