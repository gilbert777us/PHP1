<?php


require_once('iJugador.php');

class Jugador21 implements iJugador
{
  // Atributos
private $nombreAlumno;
private $nombreGuerra;
private $icono;

// Constructor
function Jugador21 ()
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
    
    if (empty($_SESSION["j18_aleatorio"])) 
    {
      
      $_SESSION["j18_aleatorio"]=rand(0,15);
      //$_SESSION["j18_aleatorio"]=0000;
      $_SESSION["j18_aleatorio"]=decbin($_SESSION["j18_aleatorio"]);

      if ($_SESSION["j18_aleatorio"]<1000) {
        $_SESSION["j18_aleatorio"]="0".$_SESSION["j18_aleatorio"];
        if ($_SESSION["j18_aleatorio"]<100)
          $_SESSION["j18_aleatorio"]="0".$_SESSION["j18_aleatorio"];
          if ($_SESSION["j18_aleatorio"]<10)
            $_SESSION["j18_aleatorio"]="0".$_SESSION["j18_aleatorio"];
      }
      
    }
    if (empty($_SESSION["j18_postura"])) $_SESSION["j18_postura"]=$_SESSION["j18_aleatorio"];
    if (empty($_SESSION["j18_contador"]) || $numeroAciertosAnterior==-1) $_SESSION["j18_contador"]=0;
    if (empty($_SESSION["j18_aciertos"])) $_SESSION["j18_aciertos"]=$numeroAciertosAnterior;
    if (empty($_SESSION["j18_A1"])) $_SESSION["j18_A1"]=separarDigitos($_SESSION["j18_postura"],1);
    if (empty($_SESSION["j18_A2"])) $_SESSION["j18_A2"]=separarDigitos($_SESSION["j18_postura"],2);
    if (empty($_SESSION["j18_A3"])) $_SESSION["j18_A3"]=separarDigitos($_SESSION["j18_postura"],3);
    if (empty($_SESSION["j18_A4"])) $_SESSION["j18_A4"]=separarDigitos($_SESSION["j18_postura"],4);
    

    switch ($_SESSION["j18_contador"]) {
        case '0':
          $_SESSION["j18_contador"]++;
          return $_SESSION["j18_postura"];
          break;

        case '1':
          $_SESSION["j18_contador"]++;
          $_SESSION["j18_aciertos"]=$numeroAciertosAnterior;

          if ($numeroAciertosAnterior==0) {
            return $_SESSION["j18_postura"]=invertirNumero();
          }else{
            $_SESSION["j18_A1"]=cambiarCifra($_SESSION["j18_A1"]);
            return $_SESSION["j18_postura"]=unirDigitos();
          }
          break;

        case '2':
          $_SESSION["j18_contador"]++;
          if ($numeroAciertosAnterior==0) {
            return $_SESSION["j18_postura"]=invertirNumero();
          }elseif ($_SESSION["j18_aciertos"]>$numeroAciertosAnterior) {
            $_SESSION["j18_A1"]=cambiarCifra($_SESSION["j18_A1"]);
            $_SESSION["j18_A2"]=cambiarCifra($_SESSION["j18_A2"]);
            return $_SESSION["j18_postura"]=unirDigitos();
          }else{
            $_SESSION["j18_A2"]=cambiarCifra($_SESSION["j18_A2"]);
            $_SESSION["j18_aciertos"]=$numeroAciertosAnterior;
            return $_SESSION["j18_postura"]=unirDigitos();
          }
          break;

        case '3':
          $_SESSION["j18_contador"]++;
          if ($numeroAciertosAnterior==0) {
            return $_SESSION["j18_postura"]=invertirNumero();
          }elseif ($_SESSION["j18_aciertos"]>=$numeroAciertosAnterior) {
            $_SESSION["j18_A2"]=cambiarCifra($_SESSION["j18_A2"]);
            $_SESSION["j18_A3"]=cambiarCifra($_SESSION["j18_A3"]);
            return $_SESSION["j18_postura"]=unirDigitos();
          }else{
            $_SESSION["j18_A3"]=cambiarCifra($_SESSION["j18_A3"]);
            $_SESSION["j18_aciertos"]=$numeroAciertosAnterior;
            return $_SESSION["j18_postura"]=unirDigitos();
          }
          
          break;

        case '4':
          $_SESSION["j18_contador"]++;
          if ($numeroAciertosAnterior==0) {
            return $_SESSION["j18_postura"]=invertirNumero();
          }elseif ($_SESSION["j18_aciertos"]>$numeroAciertosAnterior) {
            $_SESSION["j18_A3"]=cambiarCifra($_SESSION["j18_A3"]);
            $_SESSION["j18_A4"]=cambiarCifra($_SESSION["j18_A4"]);
            return $_SESSION["j18_postura"]=unirDigitos();
          }else{
            $_SESSION["j18_A4"]=cambiarCifra($_SESSION["j18_A4"]);
            $_SESSION["j18_aciertos"]=$numeroAciertosAnterior;
            return $_SESSION["j18_postura"]=unirDigitos();
          }
          break;
      }  
  }
}  

  function separarDigitos($n,$d){
      switch ($d) {
        case '1':
          $n%=10;
          break;
        case '2':
          $n=intval($n/10);
          $n%=10;
          break;
        case '3':
          $n=intval($n/100);
          $n%=10;
          break;
        case '4':
          $n=intval($n/1000);
          $n%=10;
          break;
      }
      return $n;
  }

  function cambiarCifra($c){
      if($c==0) return $c=1;
      elseif($c==1) return $c=0;
  }

  function unirDigitos(){
    return $_SESSION["j18_A4"]."".$_SESSION["j18_A3"]."".$_SESSION["j18_A2"]."".$_SESSION["j18_A1"];
  }

  function invertirNumero(){
      $_SESSION["j18_A1"]=cambiarCifra($_SESSION["j18_A1"]);
      $_SESSION["j18_A2"]=cambiarCifra($_SESSION["j18_A2"]);
      $_SESSION["j18_A3"]=cambiarCifra($_SESSION["j18_A3"]);
      $_SESSION["j18_A4"]=cambiarCifra($_SESSION["j18_A4"]);
      return unirDigitos();
  }


?>