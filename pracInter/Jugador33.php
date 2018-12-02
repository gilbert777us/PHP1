<?php
require_once('iJugador.php');

class Jugador33 implements iJugador
{
    private $J04_nombreAlumno = "Papin Tapera";
    private $J04_nombreGuerra = "AVERNOX";
    private $J04_ruta_icono = "https://findicons.com/files/icons/175/halloween_avatar/128/frankenstein.png";
  function Jugador33()
  {
    $_SESSION["J04_ultima_postura"] = "NULO";
    $_SESSION["J04_IZ"] = "".rand (0,1);
    $_SESSION["J04_array_aciertos"] = array();
    $_SESSION["J04_array_posturas"] = array();
  }
  public function setNombreAlumno($nAlumno) 
  {
    $this->J04_nombreAlumno=$nAlumno;
  }
  public function getNombreAlumno()
  {
    return $this->J04_nombreAlumno;
  }
  public function setNombreGuerra($nGuerra)
  {
    $this->J04_nombreGuerra=$nGuerra;
  }
  public function getNombreGuerra()
  {
    return $this->J04_nombreGuerra;
  }
  public function setIcono($ruta_icono)  
  {
    $this->J04_ruta_icono=$ruta_icono;
  }
  public function getIcono()
  {
    return $this->J04_ruta_icono;
  }

  
  public function invertir($pos)
  {
    $posturaAux="0000";
    for ( $i=0;$i<4;$i++)
    {
      $posturaAux[$i] = ($pos[$i]==='0')?'1':'0';
    } 
    return $posturaAux;
  }
  public function hayMayores($nAci)
  {
    $aux=-1;
    for ( $i=count($_SESSION["J04_array_aciertos"])-1;$i>=0;$i--)
    {
      if ($_SESSION["J04_array_aciertos"][$i]>$nAci)
      {
        return $i;
      }
    } 
    return $aux;
  }
  
  // función que recibe el número de aciertos de la ronda anterior o si es 
  // la primera ronda recibirá el valor -1.
  // devuelve la postura siguiente del jugador como un string ej: "0010".
  public function jugar($numeroAciertosAnterior)
  {
    $postI = $this->hayMayores($numeroAciertosAnterior);
    if (($numeroAciertosAnterior===2)&&($postI!==-1))
    {
      $numeroAciertosAnterior=$_SESSION["J04_array_aciertos"][$postI];
      $_SESSION["J04_ultima_postura"]=$_SESSION["J04_array_posturas"][$postI];
    }  
      
    if ($numeroAciertosAnterior===-1)
    {
           $_SESSION["J04_ultima_postura"]="".rand (0,1).rand (0,1).rand (0,1).rand (0,1);;
            $_SESSION["J04_array_posturas"][] = $_SESSION["J04_ultima_postura"];
            //$_SESSION["J04_array_aciertos"][] = -1;
      return $_SESSION["J04_ultima_postura"];
    }
    else if ($numeroAciertosAnterior===0)
    {
          $post = $this->invertir($_SESSION["J04_ultima_postura"]);
          $_SESSION["J04_ultima_postura"]=$post;
          $_SESSION["J04_array_posturas"][] = $post;
          $_SESSION["J04_array_aciertos"][] = $numeroAciertosAnterior;
          return $post;
    }
    else
    {
      if  ($numeroAciertosAnterior===1)
      {
        $_SESSION["J04_ultima_postura"]=$this->invertir($_SESSION["J04_ultima_postura"]);
        //$numeroAciertosAnterior=3;
        $_SESSION["J04_array_posturas"][] = $_SESSION["J04_ultima_postura"];
        $_SESSION["J04_array_aciertos"][] = 3;
      }
      
      $posturAnt=$_SESSION["J04_ultima_postura"]; 
      
      
      if ($_SESSION["J04_IZ"]==="1")
      {      
        for ( $i=0;$i<4;$i++)
        {
            $po = ($posturAnt[$i]==='0')?'1':'0';
            $postura = $posturAnt;
            $postura[$i]=$po;

            if (!in_array($postura,$_SESSION["J04_array_posturas"])) 
            {
              $_SESSION["J04_ultima_postura"]=$postura;
              $_SESSION["J04_array_posturas"][] = $postura;
              $_SESSION["J04_array_aciertos"][] = $numeroAciertosAnterior;
              return $postura;
            }
         }
      }
      else
      {
        for ( $i=3;$i>-1;$i--)
        {
            $po = ($posturAnt[$i]==='0')?'1':'0';
            $postura = $posturAnt;
            $postura[$i]=$po;

            if (!in_array($postura,$_SESSION["J04_array_posturas"])) 
            {
              $_SESSION["J04_ultima_postura"]=$postura;
              $_SESSION["J04_array_posturas"][] = $postura;
              $_SESSION["J04_array_aciertos"][] = $numeroAciertosAnterior;
              return $postura;
            }
         }
       
      }
   }
   //$_SESSION["J04_array_aciertos"][] = $numeroAciertosAnterior;
   
}
}

?>