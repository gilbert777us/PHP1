<?php
require_once('iJugador.php');

class Par
{
  public $p;
  public $a;
}

class Jugador32 implements iJugador
{
    private $J03_nombreAlumno = "Papin Tapera";
    private $J03_nombreGuerra = "AVERNOX2";
    private $J03_ruta_icono = "https://findicons.com/files/icons/175/halloween_avatar/128/frankenstein.png";
  function Jugador32()
  {
    $_SESSION["J03_array_total"] = array();
    $_SESSION["J03_IZ"] = "".rand (0,1);

  }
  public function setNombreAlumno($nAlumno) 
  {
    $this->J03_nombreAlumno=$nAlumno;
  }
  public function getNombreAlumno()
  {
    return $this->J03_nombreAlumno;
  }
  public function setNombreGuerra($nGuerra)
  {
    $this->J03_nombreGuerra=$nGuerra;
  }
  public function getNombreGuerra()
  {
    return $this->J03_nombreGuerra;
  }
  public function setIcono($ruta_icono)  
  {
    $this->J03_ruta_icono=$ruta_icono;
  }
  public function getIcono()
  {
    return $this->J03_ruta_icono;
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
  
    public function cogerUltimaPosDe($nAci)
  {
    $aux=-1;
    for ( $i=count($_SESSION["J03_array_total"])-1;$i>=0;$i--)
    {
      $pp = $_SESSION["J03_array_total"][$i];
      if ($pp->a === $nAci)
      {
        return $i;
      }
    } 
    return $aux;
  }

  private function estaYa($postura)
  {
    for ( $i=count($_SESSION["J03_array_total"])-1;$i>=0;$i--)
    {
      $pp =$_SESSION["J03_array_total"][$i];
      if ($pp->p === $postura)
      {
        return true;
      }
    } 
    return false;
  }
  
  public function addPost($post)
  {
     $pp = new Par();
     $pp->p=$post;
     $_SESSION["J03_array_total"][]=$pp;
  }
  
  public function hay3()
  {
    $aux=-1;
    for ( $i=count($_SESSION["J03_array_total"])-1;$i>=0;$i--)
    {
      $pp=$_SESSION["J03_array_total"][$i];
      if ($pp->a===3)
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
    if ($numeroAciertosAnterior===-1)
    {
      $post="".rand (0,1).rand (0,1).rand (0,1).rand (0,1);
      $this->addPost($post);
      return $post;
    }
    else
    {
      $pp = $_SESSION["J03_array_total"][count($_SESSION["J03_array_total"])-1];
      $pp->a=$numeroAciertosAnterior;
      $_SESSION["J03_array_total"][count($_SESSION["J03_array_total"])-1]=$pp;       
    }
    
    //var_dump ($_SESSION["J03_array_total"]);
    
    if ($numeroAciertosAnterior===0)
    {
          $post0 = $this->cogerUltimaPosDe(0);
          $pp = $_SESSION["J03_array_total"][$post0];        
          $post = $this->invertir($pp->p);
          $this->addPost($post);
          return $post;
    }
    else
    {
        $postOK=count($_SESSION["J03_array_total"])-1;
        if ($numeroAciertosAnterior===1)
        {
          $pp = $_SESSION["J03_array_total"][count($_SESSION["J03_array_total"])-1];  
          $pp->a=3;
          $pp->p=$this->invertir($pp->p);
          $_SESSION["J03_array_total"][]=$pp;
        }
        else if ($numeroAciertosAnterior===2)
        {
          $pos3 = $this->hay3();
          if ($pos3!==-1)
          {
            $postOK=$pos3;
          }      
        }
        $pp = $_SESSION["J03_array_total"][$postOK];  
        $posturAnt = $pp->p;
        if ($_SESSION["J03_IZ"]==="1")
        {
          for ( $i=0;$i<4;$i++)
          {
              $po = ($posturAnt[$i]==='0')?'1':'0';
              $postura = $posturAnt;
              $postura[$i]=$po;

              if (!$this->estaYa($postura))
              {
                $this->addPost($postura);
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

              if (!$this->estaYa($postura))
              {
                $this->addPost($postura);
                return $postura;
              }
           }         
        }  

    }
    
    
  }
}

?>