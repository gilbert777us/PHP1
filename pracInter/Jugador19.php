<?php
require_once('iJugador.php');

  class Jugador19 implements iJugador
  {
    private $j19_Nombre="W";
    private $j19_NombreDeGuerra="w";
    private $j19_Ruta="https://vignette.wikia.nocookie.net/destiny/images/7/7d/Juicio_de_Marte_icono.png/revision/latest?cb=20160806164120&path-prefix=es";


  public function setNombreAlumno($nAlumno){
    $this->j19_Nombre=$nAlumno;
  }
  public function getNombreAlumno(){
    echo $this->$j19_Nombre;
  }
  public function setIcono($ruta_icono){
    $this->j19_Ruta = $ruta_icono;
  }
  public function getIcono(){
    echo $this->j19_Ruta;
  }
  public function setNombreGuerra($nGuerra){
    $this->j19_NombreDeGuerra=$nGuerra;
  }
  public function getNombreGuerra(){
    echo $this->j19_NombreDeGuerra;
  }

  public function jugar($numero){
      $r1=rand(0,1);
      $r2=rand(0,1);
      $r3=rand(0,1);
      $r4=rand(0,1);

    return "".$r1 . $r2 . $r3 . $r4 ;

  } 
}
 

 ?>
