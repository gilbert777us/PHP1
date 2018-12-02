<?php
require_once('Jugador00.php');
require_once('Jugador02.php');
require_once('Jugador03.php');
require_once('Jugador04.php');
require_once('Jugador05.php');
require_once('Jugador07.php');
require_once('Jugador08.php');
require_once('Jugador09.php');
require_once('Jugador10.php');
require_once('Jugador12.php');
require_once('Jugador13.php');
require_once('Jugador14.php');
require_once('Jugador16.php');
require_once('Jugador17.php');
require_once('Jugador18.php');
require_once('Jugador19.php');
require_once('Jugador20.php');
require_once('Jugador21.php');
require_once('Jugador30.php');
require_once('Jugador31.php');
require_once('Jugador32.php');
require_once('Jugador33.php');
session_start();
//var_dump ($_POST);
set_error_handler (
    function($errno, $errstr, $errfile, $errline) {
        throw new ErrorException($errstr, $errno, 0, $errfile, $errline);     
    }
);

/*if (isset($_GET["a"]))
{
   $_SESSION["M0999_jaa"]=$_GET["a"];
} 
else if (!isset($_SESSION["M0999_jaa"]))
{
  $_SESSION["M0999_jaa"]=30;
}

if (isset($_GET["b"]))
{
   $_SESSION["M0999_jbb"]=$_GET["b"];
}
else if (!isset($_SESSION["M0999_jbb"]))
{
  $_SESSION["M0999_jbb"]=32;
}

var_dump ($_GET);
//$_SESSION["M0999_jaa"]=30;
//$_SESSION["M0999_jbb"]=31;
var_dump($_SESSION);
*/

// CONSTANTES
define("LIMITE_VARIABLES",4);

// VARIABLES
$gana1=false;
$gana2=false;
$jugando=false;
if (isset($_POST["bJReset"]))
{
  $noShowPosOK=1;
  session_unset();  
  session_destroy();
  iniEstSession();
}
else
{
  $noShowPosOK=0;
  iniEstSession();
  if (isset($_POST["bJIni"]))
  {
    posturar(-1,-1);
    $jugando=true;
  }

  if (isset($_POST["bJugar"]))
  {
    posturar($_SESSION["M0999_nAciertos1"],$_SESSION["M0999_nAciertos2"]);
    $jugando=true;
  }
}


?>



<!DOCTYPE HTML>
<html> 
<head>
  <title>DUELOS MICROMASTERMIND</title>
</head>
<body onload="sonido()">

<form name="form1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  
  
    <table style="width:100%">
  <tr>
    
    <th>
      <fieldset>  
    <legend>JUGADOR 1</legend>
  <table style="width:100%">
  <tr>
    <td> <select name="select1">
<option value="0" <?php if((isset($_POST["select1"] ) ) && ($_POST["select1"]=="0")) echo 'selected'; ?> >Rober Alonso</option>
<option value="1" <?php if((isset($_POST["select1"] ) ) && ($_POST["select1"]=="1")) echo 'selected'; ?> >Jesus Burrueco</option>
<option value="2" <?php if((isset($_POST["select1"] ) ) && ($_POST["select1"]=="2")) echo 'selected'; ?> >Miguel Campos</option>
<option value="3" <?php if((isset($_POST["select1"] ) ) && ($_POST["select1"]=="3")) echo 'selected'; ?> >Manuel Costafreda</option>
<option value="4" <?php if((isset($_POST["select1"] ) ) && ($_POST["select1"]=="4")) echo 'selected'; ?> >Gregory Gomez</option>
<option value="5" <?php if((isset($_POST["select1"] ) ) && ($_POST["select1"]=="5")) echo 'selected'; ?> >Rafael Gutierrez</option>
<option value="6" <?php if((isset($_POST["select1"] ) ) && ($_POST["select1"]=="6")) echo 'selected'; ?> >Eduardo Manzanera</option>
<option value="7" <?php if((isset($_POST["select1"] ) ) && ($_POST["select1"]=="7")) echo 'selected'; ?> >javier Martinez Huelamo</option>
<option value="8" <?php if((isset($_POST["select1"] ) ) && ($_POST["select1"]=="8")) echo 'selected'; ?> >Luis Andres Martinez</option>
<option value="9" <?php if((isset($_POST["select1"] ) ) && ($_POST["select1"]=="9")) echo 'selected'; ?> >Alvaro Mendivil</option>
<option value="10" <?php if((isset($_POST["select1"] ) ) && ($_POST["select1"]=="10")) echo 'selected'; ?> >Javier Millo</option>
<option value="11" <?php if((isset($_POST["select1"] ) ) && ($_POST["select1"]=="11")) echo 'selected'; ?> >Rafa Nuno</option>
<option value="12" <?php if((isset($_POST["select1"] ) ) && ($_POST["select1"]=="12")) echo 'selected'; ?> >niko onate</option>
<option value="13" <?php if((isset($_POST["select1"] ) ) && ($_POST["select1"]=="13")) echo 'selected'; ?> >Jacob Pareja Llurba</option>
<option value="14" <?php if((isset($_POST["select1"] ) ) && ($_POST["select1"]=="14")) echo 'selected'; ?> >alvaro pastor</option>
<option value="15" <?php if((isset($_POST["select1"] ) ) && ($_POST["select1"]=="15")) echo 'selected'; ?> >Juan Recio Sanchez</option>
<option value="16" <?php if((isset($_POST["select1"] ) ) && ($_POST["select1"]=="16")) echo 'selected'; ?> >Carlos Rios Alcantara</option>
<option value="17" <?php if((isset($_POST["select1"] ) ) && ($_POST["select1"]=="17")) echo 'selected'; ?> >Alberto Rivas Ramos</option>
<option value="18" <?php if((isset($_POST["select1"] ) ) && ($_POST["select1"]=="18")) echo 'selected'; ?> >Daniel Romero</option>
<option value="21" <?php if((isset($_POST["select1"] ) ) && ($_POST["select1"]=="21")) echo 'selected'; ?> >Daniel Romero j18</option>
<option value="19" <?php if((isset($_POST["select1"] ) ) && ($_POST["select1"]=="19")) echo 'selected'; ?> >Emilian Toma</option>
<option value="20" <?php if((isset($_POST["select1"] ) ) && ($_POST["select1"]=="20")) echo 'selected'; ?> >Pablo Zafra</option>
<option value="30" <?php if((isset($_POST["select1"] ) ) && ($_POST["select1"]=="30")) echo 'selected'; ?> >Alberto Fdez 1</option>
<option value="31" <?php if((isset($_POST["select1"] ) ) && ($_POST["select1"]=="31")) echo 'selected'; ?> >Alberto Fdez 2</option>
<option value="32" <?php if((isset($_POST["select1"] ) ) && ($_POST["select1"]=="32")) echo 'selected'; ?> >Alberto Fdez 3</option>
<option value="33" <?php if((isset($_POST["select1"] ) ) && ($_POST["select1"]=="33")) echo 'selected'; ?> >Alberto Fdez 4</option>
</select> </td>
  </tr>
  </table>  
  </fieldset>
    </th>
    <th>
      <fieldset>  
    <legend>JUGADOR 2</legend>
  <table style="width:100%">
  <tr>
    <td> <select name="select2">
<option value="0" <?php if((isset($_POST["select2"])) && ($_POST["select2"]=="0")) echo 'selected'; ?> >Rober Alonso</option>
<option value="1" <?php if((isset($_POST["select2"])) && ($_POST["select2"]=="1")) echo 'selected'; ?> >Jesus Burrueco</option>
<option value="2" <?php if((isset($_POST["select2"])) && ($_POST["select2"]=="2")) echo 'selected'; ?> >Miguel Campos</option>
<option value="3" <?php if((isset($_POST["select2"])) && ($_POST["select2"]=="3")) echo 'selected'; ?> >Manuel Costafreda</option>
<option value="4" <?php if((isset($_POST["select2"])) && ($_POST["select2"]=="4")) echo 'selected'; ?> >Gregory Gomez</option>
<option value="5" <?php if((isset($_POST["select2"])) && ($_POST["select2"]=="5")) echo 'selected'; ?> >Rafael Gutierrez</option>
<option value="6" <?php if((isset($_POST["select2"])) && ($_POST["select2"]=="6")) echo 'selected'; ?> >Eduardo Manzanera</option>
<option value="7" <?php if((isset($_POST["select2"])) && ($_POST["select2"]=="7")) echo 'selected'; ?> >javier Martinez Huelamo</option>
<option value="8" <?php if((isset($_POST["select2"])) && ($_POST["select2"]=="8")) echo 'selected'; ?> >Luis Andres Martinez</option>
<option value="9" <?php if((isset($_POST["select2"])) && ($_POST["select2"]=="9")) echo 'selected'; ?> >Alvaro Mendivil</option>
<option value="10" <?php if((isset($_POST["select2"])) && ($_POST["select2"]=="10")) echo 'selected'; ?> >Javier Millo</option>
<option value="11" <?php if((isset($_POST["select2"])) && ($_POST["select2"]=="11")) echo 'selected'; ?> >Rafa Nuno</option>
<option value="12" <?php if((isset($_POST["select2"])) && ($_POST["select2"]=="12")) echo 'selected'; ?> >niko onate</option>
<option value="13" <?php if((isset($_POST["select2"])) && ($_POST["select2"]=="13")) echo 'selected'; ?> >Jacob Pareja Llurba</option>
<option value="14" <?php if((isset($_POST["select2"])) && ($_POST["select2"]=="14")) echo 'selected'; ?> >alvaro pastor</option>
<option value="15" <?php if((isset($_POST["select2"])) && ($_POST["select2"]=="15")) echo 'selected'; ?> >Juan Recio Sanchez</option>
<option value="16" <?php if((isset($_POST["select2"])) && ($_POST["select2"]=="16")) echo 'selected'; ?> >Carlos Rios Alcantara</option>
<option value="17" <?php if((isset($_POST["select2"])) && ($_POST["select2"]=="17")) echo 'selected'; ?> >Alberto Rivas Ramos</option>
<option value="18" <?php if((isset($_POST["select2"])) && ($_POST["select2"]=="18")) echo 'selected'; ?> >Daniel Romero</option>
<option value="21" <?php if((isset($_POST["select2"])) && ($_POST["select2"]=="21")) echo 'selected'; ?> >Daniel Romero j18</option>
<option value="19" <?php if((isset($_POST["select2"])) && ($_POST["select2"]=="19")) echo 'selected'; ?> >Emilian Toma</option>
<option value="20" <?php if((isset($_POST["select2"])) && ($_POST["select2"]=="20")) echo 'selected'; ?> >Pablo Zafra</option>
<option value="30" <?php if((isset($_POST["select2"])) && ($_POST["select2"]=="30")) echo 'selected'; ?> >Alberto Fdez 1</option>
<option value="31" <?php if((isset($_POST["select2"])) && ($_POST["select2"]=="31")) echo 'selected'; ?> >Alberto Fdez 2</option>
<option value="32" <?php if((isset($_POST["select2"])) && ($_POST["select2"]=="32")) echo 'selected'; ?> >Alberto Fdez 3</option>
<option value="33" <?php if((isset($_POST["select2"])) && ($_POST["select2"]=="33")) echo 'selected'; ?> >Alberto Fdez 4</option>
      
      </select> </td>
  </tr>
  </table>  
  </fieldset>
</th> 
  </tr>
</table>
  
  
  
  
 <table style="width:100%">
  <tr>
    <th><fieldset>  
    <legend>POSTURA GANADORA</legend>
     <?php if (isset($_SESSION["M0999_POK"]) && ($noShowPosOK==0)) echo substr($_SESSION["M0999_POK"], 0, 4); ?>
  </fieldset></th>
  </tr>
</table>
  <table style="width:100%">
  <tr>
    
    <th><fieldset <?php manageColor(1); ?>>  
    <legend><?php echo $_SESSION["M0999_JA"]->getNombreGuerra()?></legend>
  <table style="width:100%">
  <tr>
    <td><img src="<?php echo $_SESSION["M0999_JA"]->getIcono()?>" height="200" width="200"></td>
    <td><?php if ((isset($_SESSION["M0999_array_posturas1"]))&&(isset($_SESSION["M0999_array_aciertos1"]))) pintarArraysJug($_SESSION["M0999_array_posturas1"],$_SESSION["M0999_array_aciertos1"]);?></td>
  </tr>
  </table>  
  </fieldset></th>
    <th><fieldset  <?php manageColor(2); ?>>  
    <legend><?php echo $_SESSION["M0999_JB"]->getNombreGuerra()?></legend>
      <table style="width:100%">
  <tr>
    <td><img src="<?php echo $_SESSION["M0999_JB"]->getIcono()?>" height="200" width="200"></td>
    <td><?php  if ((isset($_SESSION["M0999_array_posturas2"]))&&(isset($_SESSION["M0999_array_aciertos2"]))) pintarArraysJug($_SESSION["M0999_array_posturas2"],$_SESSION["M0999_array_aciertos2"]);?></td>
  </tr>
  </table>  

  </fieldset></th> 
  </tr>
</table>
<!--<table style="width:100%">
  <tr>
    <th><fieldset>  
    <legend>CONSOLA</legend>
     <?php //escribirGanadores(); ?>
  </fieldset></th>
  </tr>
</table> 
-->
     <input type="submit" name="bJReset" value="reset" />      
     <input type="submit" name="bJIni" value="iniciar" <?php managebotonIniciar(); ?>/>  
     <input type="submit" name="bJugar" value="jugar" <?php managebotonJugar(); ?>/>
  
</form>

<?php
  function escribirGanadores()
  {
    global $gana1,$gana2,$jugando;
    //echo "  gana1:".$gana1. "gana2:".$gana2;
    if ($gana2 && $gana1)
    {
      echo "EMPATE, gran duelo!";
      $jugando=false;
    }
    else if ($gana1)
    {
      echo "Jugador 1 .... CAMPE0N!";
      $jugando=false;
    }
    else if ($gana2)
    {
      echo "Jugador 2 .... CAMPEON!";
      $jugando=false;
    }
  }
  function pintarArraysJug($arrPost,$arrAciertos)
  {
    if (isset($arrPost)&& (count($arrPost)>0))
    {
      echo '<table><tr><td></td><td>POST</td><td>OKs</td></tr>';
      for ( $i=0;$i<count($arrPost);$i++)
      {
        echo '<tr><td>'.($i+1).'</td><td>'.$arrPost[$i].'</td><td>'.$arrAciertos[$i].'</td></tr>';
      }
      echo '</table>';
     } 
  }
  
  
 function calcularNAciertos($postura)
 {
    
    $cont =0;
    $cont += ($postura[0]==$_SESSION["M0999_POK"][0]) ? 1 : 0 ;
    $cont += ($postura[1]==$_SESSION["M0999_POK"][1]) ? 1 : 0 ;
    $cont += ($postura[2]==$_SESSION["M0999_POK"][2]) ? 1 : 0 ;
    $cont += ($postura[3]==$_SESSION["M0999_POK"][3]) ? 1 : 0 ;
   //echo  "<br/>post:".$postura." POK:".$_SESSION["M0999_POK"]. " aciertos:".$cont;
   return $cont; 
 }
  
 function posturar($postura1,$postura2)
 {
  global $gana1,$gana2;
   
   try {  
   $pos1 = $_SESSION["M0999_JA"]->jugar($postura1);
  }
  catch(Exception $e) {
   $pos1 ="0000";
  }
   
   
 
  $_SESSION["M0999_nAciertos1"]=calcularNAciertos($pos1);
  $_SESSION["M0999_array_aciertos1"][]= $_SESSION["M0999_nAciertos1"];
  $_SESSION["M0999_array_posturas1"][]= $pos1;
  if ($_SESSION["M0999_nAciertos1"]==LIMITE_VARIABLES)
  {
    $gana1=true;
  } 
   try {
  $pos2 = $_SESSION["M0999_JB"]->jugar($postura2);
  }
  catch(Exception $e) {
   $pos2 ="0000";
  } 
   
  $_SESSION["M0999_nAciertos2"]=calcularNAciertos($pos2);
  $_SESSION["M0999_array_aciertos2"][]= $_SESSION["M0999_nAciertos2"];
  $_SESSION["M0999_array_posturas2"][]= $pos2;
  if ($_SESSION["M0999_nAciertos2"]==LIMITE_VARIABLES)
  {
    $gana2=true;
  }
 }
  function manageColor($j1)
  {
    global $gana1,$gana2,$jugando;
   if ($j1===1)
   {
      if ($gana2 && $gana1)
      {
       echo "style='background-color:#ffcc66;'";
      }
      else if ($gana1)
      {
        echo "style='background-color:#99ff99;'";
      }
      else if ($gana2)
      {
       echo "style='background-color:#ff0000;'";    
      }
   }
    else
    {
      if ($gana2 && $gana1)
      {
       echo "style='background-color:#ffcc66;'";
      }
      else if ($gana1)
      {
        echo "style='background-color:#ff0000;'";  
      }
      else if ($gana2)
      {
         echo "style='background-color:#99ff99;'";   
      }
     
    }

      
     // echo "style='background-color:#00ff00;'";
  }
  
  function managebotonJugar()
  {
    global $jugando;
    if (!$jugando)
    {
      echo 'disabled';
    }
  }
  function managebotonIniciar()
  {
    global $jugando,$gana1,$gana2;
    if (($jugando)||($gana2 )||($gana1))
    {
      echo 'disabled';
    }
  }
  
  function iniEstSession()
  {
  if (!isset($_SESSION["M0999_POK"]))
  {
    $_SESSION["M0999_POK"] = "".rand (0,1).rand (0,1).rand (0,1).rand (0,1).'_';
   }
  if (!isset($_SESSION["M0999_array_posturas1"]))
  {
    $_SESSION["M0999_array_posturas1"] = array();
  }
  if (!isset($_SESSION["M0999_array_posturas2"]))
  {
    $_SESSION["M0999_array_posturas2"] = array();
  }
  if (!isset($_SESSION["M0999_array_aciertos1"]))
  {
    $_SESSION["M0999_array_aciertos1"] = array();
  }
  if (!isset($_SESSION["M0999_array_aciertos2"]))
  {
    $_SESSION["M0999_array_aciertos2"] = array();
  } 
    
  if (!isset($_SESSION["M0999_JA"]) && isset($_POST["select1"]))
  {  
    $_SESSION["M0999_JA"] = devolverJugador($_POST["select1"]);
  }
  else if (!isset($_POST["select1"]))
  {
      $_SESSION["M0999_JA"] = devolverJugador(30);
  }
  if (!isset($_SESSION["M0999_JB"]) && isset($_POST["select2"]))
  {
    $_SESSION["M0999_JB"] = devolverJugador($_POST["select2"]);
  }
    else if (!isset($_POST["select2"]))
      {
      $_SESSION["M0999_JB"] = devolverJugador(31);
    }

  }
  
  function devolverJugador($jj)
  {
    $jjj= new Jugador30();
    switch ($jj) {
    case 0:
        $jjj= new Jugador00();
        break;
    case 1:
        $jjj= new Jugador01();
        break;
    case 2:
        $jjj= new Jugador02();
        break;
    case 3:
        $jjj= new Jugador03();
        break;
    case 4:
        $jjj= new Jugador04();
        break;
    case 5:
        $jjj= new Jugador05();
        break;
    case 6:
        $jjj= new Jugador06();
        break;
    case 7:
        $jjj= new Jugador07();
        break;
    case 8:
        $jjj= new Jugador08();
        break;
    case 9:
        $jjj= new Jugador09();
        break;
    case 10:
        $jjj= new Jugador10();
        break;
    case 11:
        $jjj= new Jugador11();
        break;
    case 12:
        $jjj= new Jugador12();
        break;
    case 13:
        $jjj= new Jugador13();
        break;
    case 14:
        $jjj= new Jugador14();
        break;
    case 15:
        $jjj= new Jugador15();
        break;
    case 16:
        $jjj= new Jugador16();
        break;
    case 17:
        $jjj= new Jugador17();
        break;
    case 18:
        $jjj= new Jugador18();
        break;
    case 19:
        $jjj= new Jugador19();
        break;
    case 20:
        $jjj= new Jugador20();
        break;
    case 21:
        $jjj= new Jugador21();
        break;
    case 30:
        $jjj= new Jugador30();
        break;
    case 31:
        $jjj= new Jugador31();
        break;
    case 32:
        $jjj= new Jugador32();
        break;
    case 33:
        $jjj= new Jugador33();
        break;
    case 34:
        $jjj= new Jugador34();
        break;
    case 35:
        $jjj= new Jugador35();
        break;
      }

    
    
    return $jjj;
  }  
  
  function getAudio()
  {
    global $gana1,$gana2;
    if (($gana1)&&($gana2))
      return "ae.mp3";
    if ($gana1)
      return "a1.mp3";
    else if ($gana2)
      return "a2.mp3";
  }
  
  ?>

<script>
function sonido() 
{
  <?php
  if ($gana2 || $gana1)
  {
    echo "document.getElementById('my_audio').play();";
  }
  ?>
}
</script>
<audio id="my_audio" src="audios/<?php echo getAudio()?>"></audio>  
</body>
</html>