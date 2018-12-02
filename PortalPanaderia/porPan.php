<?php 
require_once('panaderiaSimple/Local.php');


session_start();

//if (isset($_POST["volver"]))
//{
//	session_unset();  
//	session_destroy();
//}

// Si es la primera vez
if (!isset($_SESSION["local"]))
{
	$localEdus = new Local("*** LA PANADERIA DE EDUs ***");
	$localEdus->getPanes(); //cargar panes del txt
	/*
	$localEdus->addPan(new Pan ("Redondo"));
	$localEdus->addPan(new Pan ("Redondo"));
	$localEdus->addPan(new Pan ("Redondo"));
	$localEdus->addPan(new Pan ("Fino"));
	$localEdus->addPan(new Pan ("Fino"));
	$localEdus->addPan(new Pan ("Payes"));
	*/

	$_SESSION["local"]=$localEdus;	
	
	$_SESSION["cliente"] = new Cliente (100,"Luis");
}

$hayPanesSuficientes=false;
if (isset($_POST["numpanes"]))
{
	$hayPanesSuficientes=$_SESSION["local"]->cuantosPanes($_POST["tipo_pan"])>= $_POST["numpanes"];
}

//echo '$hayPanesSuficientes:'.$hayPanesSuficientes;

var_dump ($_SESSION);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>PORTAL DE LA PANADERIA DE EDUs</title>
<!-- <link rel="stylesheet" type="text/css" href="view.css" media="all"> -->
</head>
<body id="main_body" >
	
	<div id="form_container">
	
		<h1><a>PORTAL DE LA PANADERIA DE EDUs</a></h1>
	<form id="form_56701" class="appnitro"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div class="form_description">
			<h2>PORTAL DE LA PANADERIA DE EDUs</h2>
			<p>La gran panaderia de EDUs y Cia</p>
		</div>
    <b>Tipo de pan</b>
    <select name="tipo_pan">
      <option value="Redondo" <?php if (isset($_POST["tipo_pan"])&& $_POST["tipo_pan"]=='Redondo') echo 'selected'?> >Redondo</option>      
			<option value="Fino" <?php if (isset($_POST["tipo_pan"])&& $_POST["tipo_pan"]=='Fino') echo 'selected'?> >Fino</option>
      <option value="Payes" <?php if (isset($_POST["tipo_pan"])&& $_POST["tipo_pan"]=='Payes') echo 'selected'?> >Payes</option>
    </select>
    <b>Nº</b>
    <input type="text" name="numpanes" size="10" value="<?php if (isset($_POST["numpanes"])) echo $_POST["numpanes"]; else echo ''; ?>" >
    <b>precio</b>
    <input type="text" name="precio" size="10" readonly value="<?php if (isset($_POST["numpanes"])) echo (($_SESSION["local"]->cogerPrecio($_POST["tipo_pan"]))*$_POST["numpanes"]); ?>">
    
		<input id="actualizar" class="button_text" type="submit" name="actualizar" value="actualizar" />

		</form>
    <form id="form2" action="cesta.php" method="POST">
			<?php 
			if (!$hayPanesSuficientes && isset($_POST["numpanes"]) && $_POST["numpanes"]>0)
			{
				echo '<br/><b>NO HAY PANES SUFICIENTES</b><br/>';
			}
			?>
      <input type="submit" name="comprar" value="comprar" <?php if ((!$hayPanesSuficientes && isset($_POST["numpanes"]) && $_POST["numpanes"]>0)||(!isset($_POST["numpanes"])||$_POST["numpanes"]==0||$_POST["numpanes"]=='')) echo 'disabled';?> > 
      <input type="hidden" name="numPan" value="<?php if (isset($_POST["numpanes"])) echo $_POST["numpanes"]; ?>">  
      <input type="hidden" name="tipoPan" value="<?php if (isset($_POST["tipo_pan"])) echo $_POST["tipo_pan"] ?>"> 
      <input type="hidden" name="precioPan" value="<?php if (isset($_POST["tipo_pan"]) && isset($_POST["numpanes"]) && isset($_SESSION["local"])) echo (($_SESSION["local"]->cogerPrecio($_POST["tipo_pan"]))*$_POST["numpanes"]) ?>">     
    </form>
	</div>
	</body>
</html>