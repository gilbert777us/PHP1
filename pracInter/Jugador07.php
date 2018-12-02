<?php

require_once("iJugador.php");

class Jugador07 implements iJugador{

	var $j07_nombre;
	var $j07_guerra;
	var $j07_icono;
  var $j07_jugar;


function Jugador07(){

$this->j07_nombre="Javier";
$this->j07_guerra="Huela";
$this->j07_icono="https://findicons.com/files/icons/1015/world_cup_flags/128/spain.png";
$this->j07_jugar="1111";

}


  public function setNombreAlumno($nAlumno)
  {

  		$this->j07_nombre=$nAlumno;
  }

  public function getNombreAlumno()
  {	

 return $this->j07_nombre;
  }

  public function setNombreGuerra($nGuerra)
  {
  		 $this->j07_guerra=$nGuerra;
  } 

  public function getNombreGuerra()
  {
  		return $this->j07_guerra;
  }

  public function setIcono($ruta_icono)
  {
  		$this->j07_icono=$ruta_icono;
  }
  public function getIcono()
  {

  		return $this->j07_icono;
  }
  



public function jugar($numeroAciertosAnterior)
  {
    $var1= rand(0,1);
    $var2= rand(0,1);
    $var3= rand(0,1);
    $var4= rand(0,1);

    
    $comodin = $var1.$var2.$var3.$var4;
    
    
      

    if($numeroAciertosAnterior==-1){




    return $this->j07_jugar;

    }if($numeroAciertosAnterior==0){

  

    return $comodin;

    }
    if($numeroAciertosAnterior==1){

  $comodin = $var1.$var2.$var3.$var4;

    return $comodin;

    }if($numeroAciertosAnterior==2){

    return $var1.$var2.$var3.$var4;

    }if($numeroAciertosAnterior==3){

    return $var1.$var2.$var3.$var4;
}

      
  }

  }



?>