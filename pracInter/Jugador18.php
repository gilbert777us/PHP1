<?php
// Start the session
//session_start();

require_once('iJugador.php');

class Jugador18 implements iJugador
{
  // Atributos
private $nombreAlumno;
private $nombreGuerra;
private $icono;

// Constructor
function jugador18 ()
{
  $this->nombreAlumno= "jugador18";
  $this->nombreGuerra= "DaniKitkat";
  $this->icono= "https://findicons.com/files/icons/354/circus/128/bird.png";
}

// Metodos
  public function setNombreAlumno($nAlumno)
  {
    $this->nombreAlumno= $nAlumno;
  }
  public function getNombreAlumno()
  {
    return $this->nombreAlumno;
  }

  public function setNombreGuerra($nGuerra)
  {
    $this->nombreGuerra= $nGuerra;
  }
  public function getNombreGuerra()
  {
    return $this->nombreGuerra;
  }

  public function setIcono($ruta_icono)
  {
    $this->icono= $ruta_icono;
  }
  public function getIcono()
  {
    return $this->icono;
  }



  public function jugar($numeroAciertosAnterior){
    if (empty($_SESSION["j18_con"])) $_SESSION["j18_con"]=0;
    if (empty($_SESSION["j18_postura"])) $_SESSION["j18_postura"]="0000";
    if (empty($_SESSION["j18_A0"])) $_SESSION["j18_A0"]=-1;
    if (empty($_SESSION["j18_A1"])) $_SESSION["j18_A1"]=-1;
    if (empty($_SESSION["j18_A2"])) $_SESSION["j18_A2"]=-1;
    if (empty($_SESSION["j18_A3"])) $_SESSION["j18_A3"]=-1;
    if (empty($_SESSION["j18_A4"])) $_SESSION["j18_A4"]=-1;

    switch ($_SESSION["j18_con"]) {
      case '0':
        $_SESSION["j18_A0"]=$numeroAciertosAnterior;
        $_SESSION["j18_con"]++;
        break;
      case '1':
        $_SESSION["j18_A1"]=$numeroAciertosAnterior;
        $_SESSION["j18_con"]++;
        break;
      case '2':
        $_SESSION["j18_A2"]=$numeroAciertosAnterior;
        $_SESSION["j18_con"]++;
        break;
      case '3':
        $_SESSION["j18_A3"]=$numeroAciertosAnterior;
        $_SESSION["j18_con"]++;
        break;
    case '4':
        $_SESSION["j18_A4"]=$numeroAciertosAnterior;
        $_SESSION["j18_con"]++;
        break;
    }


    if ($numeroAciertosAnterior==0 && $_SESSION["j18_A0"]==-1 && $_SESSION["j18_A1"]==0  && $_SESSION["j18_A2"]==-1  && $_SESSION["j18_A3"]==-1  && $_SESSION["j18_A4"]==-1 ) 
    {
      $_SESSION["j18_postura"]="1111";
    }
    elseif (($numeroAciertosAnterior==1 || $numeroAciertosAnterior==2 || $numeroAciertosAnterior==3) && $_SESSION["j18_A0"]==-1  && ($_SESSION["j18_A1"]==1 || $_SESSION["j18_A1"]==2 || $_SESSION["j18_A1"]==3)  && $_SESSION["j18_A2"]==-1  && $_SESSION["j18_A3"]==-1  && $_SESSION["j18_A4"]==-1 ) 
    {
      $_SESSION["j18_postura"]="0001";
    }
    elseif ($numeroAciertosAnterior==0  && $_SESSION["j18_A0"]==-1 && $_SESSION["j18_A1"]==1  && $_SESSION["j18_A2"]==0  && $_SESSION["j18_A3"]==-1  && $_SESSION["j18_A4"]==-1 ) 
    {
      $_SESSION["j18_postura"]="1110";
    }
    elseif (($numeroAciertosAnterior==2  && $_SESSION["j18_A0"]==-1 && $_SESSION["j18_A1"]==1  && $_SESSION["j18_A2"]==2  && $_SESSION["j18_A3"]==-1  && $_SESSION["j18_A4"]==-1 ) ||
      ($numeroAciertosAnterior==1  && $_SESSION["j18_A0"]==-1 && $_SESSION["j18_A1"]==2  && $_SESSION["j18_A2"]==1  && $_SESSION["j18_A3"]==-1  && $_SESSION["j18_A4"]==-1 ) ||
      ($numeroAciertosAnterior==3  && $_SESSION["j18_A0"]==-1 && $_SESSION["j18_A1"]==2  && $_SESSION["j18_A2"]==3  && $_SESSION["j18_A3"]==-1  && $_SESSION["j18_A4"]==-1 ) ||
      ($numeroAciertosAnterior==2  && $_SESSION["j18_A0"]==-1 && $_SESSION["j18_A1"]==3  && $_SESSION["j18_A2"]==2  && $_SESSION["j18_A3"]==-1  && $_SESSION["j18_A4"]==-1 )) 
    {
      $_SESSION["j18_postura"]="0011";
    }
    elseif ($numeroAciertosAnterior==1  && $_SESSION["j18_A0"]==-1 && $_SESSION["j18_A1"]==1  && $_SESSION["j18_A2"]==2  && $_SESSION["j18_A3"]==1  && $_SESSION["j18_A4"]==-1 ) 
    {
      $_SESSION["j18_postura"]="1101";
    }
    elseif (($numeroAciertosAnterior==3  && $_SESSION["j18_A0"]==-1 && $_SESSION["j18_A1"]==1  && $_SESSION["j18_A2"]==2  && $_SESSION["j18_A3"]==3  && $_SESSION["j18_A4"]==-1 ) ||
      ($numeroAciertosAnterior==2  && $_SESSION["j18_A0"]==-1 && $_SESSION["j18_A1"]==2  && $_SESSION["j18_A2"]==1  && $_SESSION["j18_A3"]==2  && $_SESSION["j18_A4"]==-1 ) ||
      ($numeroAciertosAnterior==2  && $_SESSION["j18_A0"]==-1 && $_SESSION["j18_A1"]==2  && $_SESSION["j18_A2"]==3  && $_SESSION["j18_A3"]==2  && $_SESSION["j18_A4"]==-1 ) ||
      ($numeroAciertosAnterior==1  && $_SESSION["j18_A0"]==-1 && $_SESSION["j18_A1"]==3  && $_SESSION["j18_A2"]==2  && $_SESSION["j18_A3"]==1  && $_SESSION["j18_A4"]==-1 ))
    {
      $_SESSION["j18_postura"]="0111";
    }
    elseif ($numeroAciertosAnterior==2  && $_SESSION["j18_A0"]==-1 && $_SESSION["j18_A1"]==1  && $_SESSION["j18_A2"]==2  && $_SESSION["j18_A3"]==3  && $_SESSION["j18_A4"]==2 ) 
    {
      $_SESSION["j18_postura"]="1011";
    }
    elseif ($numeroAciertosAnterior==0  && $_SESSION["j18_A0"]==-1 && $_SESSION["j18_A1"]==2  && $_SESSION["j18_A2"]==1  && $_SESSION["j18_A3"]==0  && $_SESSION["j18_A4"]==-1 ) 
    {
      $_SESSION["j18_postura"]="1100";
    }
    elseif ($numeroAciertosAnterior==1  && $_SESSION["j18_A0"]==-1 && $_SESSION["j18_A1"]==2  && $_SESSION["j18_A2"]==1  && $_SESSION["j18_A3"]==2  && $_SESSION["j18_A4"]==1 ) 
    {
      $_SESSION["j18_postura"]="1010";
    }
    elseif ($numeroAciertosAnterior==3  && $_SESSION["j18_A0"]==-1 && $_SESSION["j18_A1"]==2  && $_SESSION["j18_A2"]==1  && $_SESSION["j18_A3"]==3  && $_SESSION["j18_A4"]==3 ) 
    {
      $_SESSION["j18_postura"]="0110";
    }
    elseif ($numeroAciertosAnterior==1  && $_SESSION["j18_A0"]==-1 && $_SESSION["j18_A1"]==2  && $_SESSION["j18_A2"]==3  && $_SESSION["j18_A3"]==2  && $_SESSION["j18_A4"]==1 ) 
    {
      $_SESSION["j18_postura"]="1001";
    }
    elseif ($numeroAciertosAnterior==3  && $_SESSION["j18_A0"]==-1 && $_SESSION["j18_A1"]==2  && $_SESSION["j18_A2"]==3  && $_SESSION["j18_A3"]==2  && $_SESSION["j18_A4"]==3 ) 
    {
      $_SESSION["j18_postura"]="0101";
    }
    elseif ($numeroAciertosAnterior==0  && $_SESSION["j18_A0"]==-1 && $_SESSION["j18_A1"]==3  && $_SESSION["j18_A2"]==2  && $_SESSION["j18_A3"]==1  && $_SESSION["j18_A4"]==0 ) 
    {
      $_SESSION["j18_postura"]="1000";
    }
    elseif ($numeroAciertosAnterior==2  && $_SESSION["j18_A0"]==-1 && $_SESSION["j18_A1"]==3  && $_SESSION["j18_A2"]==2  && $_SESSION["j18_A3"]==1  && $_SESSION["j18_A4"]==2 ) 
    {
      $_SESSION["j18_postura"]="0100";
    }
    elseif ($numeroAciertosAnterior==3  && $_SESSION["j18_A0"]==-1 && $_SESSION["j18_A1"]==3  && $_SESSION["j18_A2"]==2  && $_SESSION["j18_A3"]==3  && $_SESSION["j18_A4"]==3 ) 
    {
      $_SESSION["j18_postura"]="0010";
    }

    return $_SESSION["j18_postura"];
  }
}  










  $_SESSION["j18"] = new jugador18();
 // print_r($_SESSION["j18"]);

?>