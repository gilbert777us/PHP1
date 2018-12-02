<?php
require_once('iJugador.php');


class Jugador13 implements iJugador
{
	//Atributos
	private $j13_nombre;
	private $j13_guerra;
	private $j13_imagen;

	//Constructor
	function Jugador13()
	{
		$this->j13_nombre="Jacob";
		$this->j13_guerra="Heisenberg";
		$this->j13_imagen="https://cdn4.iconfinder.com/data/icons/famous-faces/100/heis1-256.png";
		echo "Jugador13 creado correctamente";
	}
	//Metodos
	public function setNombreAlumno($nAlumno)
	{
		$this->j13_nombre=$nAlumno;
	} 

 	public function setNombreGuerra($nGuerra)
 	{
	 	$this->j13_guerra=$nGuerra;
 	}
 	public function setIcono($ruta_icono)
 	{
	 	$this->j13_imagen=$ruta_icono;
 	}
	public function getNombreAlumno()
  	{
   		 return $this->j13_nombre;
  	}
  	public function getNombreGuerra()
  	{
		return $this->j13_guerra;
  	}

  	public function getIcono()
  	{
  		return $this->j13_imagen;
  	}

 	//Funciones
 	function jugar($numeroAciertosAnterior)
 	{
 		$j13_resultado;
		$j13_aleatorioPos1=rand(0,1);
		$j13_aleatorioPos2=rand(0,1);
		$j13_aleatorioPos3=rand(0,1);
		$j13_aleatorioPos4=rand(0,1);
		
		$con=0;
		$con++;

 		if($numeroAciertosAnterior==-1)//Empieza el juego
 		{
 			$j13_resultado="1111";
 			return $j13_resultado;
 		}
 		else
			if($numeroAciertosAnterior==0)//En este caso invertimos el resultado
			{	
				$j13_resultado="0000";
				return $j13_resultado;	
			}
		else
			if($numeroAciertosAnterior==1)//hacemos un random que a su vez ira cambiando la posicion segun cuantas veces hayamos invocado el metodo
			{	

				if($con==0)
				{

					$j13_resultado=$j13_aleatorioPos1.$j13_aleatorioPos2.$j13_aleatorioPos3.$j13_aleatorioPos4;
				}
				else
				if($con==1)
				{

					$j13_resultado=$j13_aleatorioPos4.$j13_aleatorioPos1.$j13_aleatorioPos2.$j13_aleatorioPos3;
				}
				else
				if($con==2)
				{
					$j13_resultado=$j13_aleatorioPos4.$j13_aleatorioPos2.$j13_aleatorioPos3.$j13_aleatorioPos1;
				}
				else
				if($con==3)
				{
					$j13_resultado=$j13_aleatorioPos4.$j13_aleatorioPos3.$j13_aleatorioPos2.$j13_aleatorioPos1;
				}
				else
				if($con==4)
				{
					$j13_resultado=$j13_aleatorioPos1.$j13_aleatorioPos3.$j13_aleatorioPos4.$j13_aleatorioPos2;
				}
				
						
				return $j13_resultado;
			}
		else
			if($numeroAciertosAnterior==2)
			{
			
				if($con==0)
				{
					$j13_resultado=$j13_aleatorioPos1.$j13_aleatorioPos2.$j13_aleatorioPos3.$j13_aleatorioPos4;
				}
				else
				if($con==1)
				{

					$j13_resultado=$j13_aleatorioPos4.$j13_aleatorioPos1.$j13_aleatorioPos2.$j13_aleatorioPos3;
				}
				else
				if($con==2)
				{
					$j13_resultado=$j13_aleatorioPos4.$j13_aleatorioPos2.$j13_aleatorioPos3.$j13_aleatorioPos1;
				}
				else
				if($con==3)
				{
					$j13_resultado=$j13_aleatorioPos4.$j13_aleatorioPos3.$j13_aleatorioPos2.$j13_aleatorioPos1;
				}
				else
				if($con==4)
				{
					$j13_resultado=$j13_aleatorioPos1.$j13_aleatorioPos3.$j13_aleatorioPos4.$j13_aleatorioPos2;
				}
				
				return $j13_resultado;
			}
		else 
			if($numeroAciertosAnterior==3)
			{
				if($con==0)
				{
					$j13_resultado=$j13_aleatorioPos1.$j13_aleatorioPos2.$j13_aleatorioPos3.$j13_aleatorioPos4;
				}
				else
				if($con==1)
				{

					$j13_resultado=$j13_aleatorioPos4.$j13_aleatorioPos1.$j13_aleatorioPos2.$j13_aleatorioPos3;
				}
				else
				if($con==2)
				{
					$j13_resultado=$j13_aleatorioPos4.$j13_aleatorioPos2.$j13_aleatorioPos3.$j13_aleatorioPos1;
				}
				else
				if($con==3)
				{
					$j13_resultado=$j13_aleatorioPos4.$j13_aleatorioPos3.$j13_aleatorioPos2.$j13_aleatorioPos1;
				}
				else
				if($con==4)
				{
					$j13_resultado=$j13_aleatorioPos1.$j13_aleatorioPos3.$j13_aleatorioPos4.$j13_aleatorioPos2;
				}
				return $j13_resultado;
			}
		else
			if($numeroAciertosAnterior==4)
			{
				return $j13_resultado;//ganaste
			}

 	}
}

?>