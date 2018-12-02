<?php

session_start();

// Si no es la primera vez
if (isset($_SESSION["contIntentos"]))
{
  $_SESSION["contIntentos"]=$_SESSION["contIntentos"]+1;
}

// Si es la primera vez
if (!isset($_SESSION["aleatorioN"]))
{
  $_SESSION["aleatorioN"] = array (rand(0,1),rand(0,1),rand(0,1),rand(0,1));
  $_SESSION["contIntentos"]=0;
  $_SESSION["fin"]=0; 
}


//var_dump($_SESSION);
//var_dump($_POST);

?>


  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>MICRO MASTER MIND
    </title>
    <link rel="stylesheet" type="text/css" href="view.css" media="all"/>
  </head>

  <body id="main_body">
    <div id="form_container">
      <h1><a>MICRO MASTER MIND</a></h1>
      <form class="appnitro" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form_description">
          <h2>MICRO MASTER MIND</h2>
          <p>El gran juego de Micro Master Mind
          </p>
        </div>
        <ul>
          <li class="section_break">
            <h3>JUEGO</h3>
          </li>
          <li id="li_1">
            <div>
              <input name="elem_0" type="text" size="1" maxlength="1" value="" />
              <input name="elem_1" type="text" size="1" maxlength="1" value="" />
              <input name="elem_2" type="text" size="1" maxlength="1" value="" />
              <input name="elem_3" type="text" size="1" maxlength="1" value="" />
            </div>
            <p class="guidelines" id="guide_1"><small>Introduce postura...</small>
            </p>
          </li>
          <li class="section_break">
            <h3>RESULTADOS</h3>
          </li>
          <li id="li_4">
            <label class="description" for="element_4">N de aciertos 
            </label>
            <div>
              <input name="nnaciertos" class="element text small" type="text" maxlength="255" readonly value="<?php echo calcularAciertos()?>" />
            </div>
          </li>
          <li id="li_5">
            <label class="description" for="element_5">N de apuestas realizadas 
            </label>
            <div>
              <input name="nnapuestas" class="element text small" type="text" maxlength="255" readonly value="<?php echo $_SESSION["contIntentos"]?>"/>
            </div>
          </li>
          <li id="li_6">
            <label class="description" for="element_6">N de intentos que faltan 
            </label>
            <div>
              <input name="nnIFaltan" class="element text small" type="text" maxlength="255" readonly value="<?php echo (16 - $_SESSION["contIntentos"])?>"/>
            </div>
          </li>
          <li class="section_break">
            <h3>CONSOLA</h3>
          </li>
          <li id="li_7">
            <div>
              <textarea name="nnTexto" class="element textarea medium" readonly><?php echo escribirConsola() ?></textarea>
            </div>
          </li>
          <li class="section_break">
          </li>
        </ul>
        <input type="submit" name="submit" value="Apostar" <?php echo ($_SESSION["fin"]==1)?" disabled ":"";    ?> />
      </form>
    </div>
    <form method="post" action="cs.php">
      <input type="submit" name="submit" value="Salir" />
    </form>
  </body>
<?php
  
 function calcularAciertos()
{
    $cont =0;
    if (isset ($_POST["elem_0"]) && isset ($_POST["elem_1"]) 
       && isset ($_POST["elem_2"])
       && isset ($_POST["elem_3"]))
    {   
      $cont += ($_POST["elem_0"]==$_SESSION["aleatorioN"][0]) ? 1 : 0 ;
    $cont += ($_POST["elem_1"]==$_SESSION["aleatorioN"][1]) ? 1 : 0 ;
    $cont += ($_POST["elem_2"]==$_SESSION["aleatorioN"][2]) ? 1 : 0 ;
    $cont += ($_POST["elem_3"]==$_SESSION["aleatorioN"][3]) ? 1 : 0 ;
    }
  return $cont;  
}
function escribirConsola()
{
  $texto="";
  $nAci = calcularAciertos();
  if (isset ($_POST["nnTexto"]))
  {
    $texto=$_POST["nnTexto"];
    $texto.=$_POST["elem_0"].$_POST["elem_1"].$_POST["elem_2"].$_POST["elem_3"]." Aciertos:".$nAci."\n";
  }
  if ((16-$_SESSION["contIntentos"])==0)
  {
     $texto.= "GASTADOS TODOS LOS INTENTOS, HAS PERDIDO";
     $_SESSION["fin"]=1; 
  }
  
  if ($nAci==4)
  {
   $texto.= "ENHORABUENA, HAS GANADO CON N DE INTENTOS:".$_SESSION["contIntentos"];
   $_SESSION["fin"]=1; 
  }
  return $texto;
  }
  
  ?>
  </html>