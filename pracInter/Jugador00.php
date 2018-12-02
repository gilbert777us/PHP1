<?php

require_once("iJugador.php");

class Jugador00 implements iJugador{

	var $j00_nombre;
	var $j00_guerra;
	var $j00_icono;
  var $j00_jugar;


function Jugador00(){

$this->j00_nombre="Rober";
$this->j00_guerra="Rob";
$this->j00_icono="https://findicons.com/files/icons/2736/halloween_theme/128/grim_reaper.png";
$this->j00_jugar="1111";

}


  public function setNombreAlumno($nAlumno)
  {

  		$this->j00_nombre=$nAlumno;
  }

  public function getNombreAlumno()
  {	
 return $this->j00_nombre;
  }

  public function setNombreGuerra($nGuerra)
  {
  		 $this->j00_guerra=$nGuerra;
  } 

  public function getNombreGuerra()
  {
  		return $this->j00_guerra;
  }

  public function setIcono($ruta_icono)
  {
  		$this->j00_icono=$ruta_icono;
  }
  public function getIcono()
  {
  		return $this->j00_icono;
  }  

  public function jugar($numeroAciertosAnterior)
  {

        $var1=rand(0,1);
        $var2=rand(0,1);
        $var3=rand(0,1);
        $var4=rand(0,1);

      if ($numeroAciertosAnterior==0) {
        return $var1.$var2.$var3.$var4;
      }

      elseif ($numeroAciertosAnterior==1) {
       return $var1.$var2.$var3.$var4;
      }
       elseif ($numeroAciertosAnterior==2) {
        return $var1.$var2.$var3.$var4;
      }
       elseif ($numeroAciertosAnterior==3) {
         return $var1.$var2.$var3.$var4;
      }
      
  }
 
}

?>