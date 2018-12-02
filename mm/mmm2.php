<?php 

session_start();
if (isset($_SESSION["contIntentos"]))
{
	$_SESSION["contIntentos"]=$_SESSION["contIntentos"]+1;
}
if (empty($_SESSION["aleatorioN"]))
{
  $numA = array();
  for ($i=0;$i<$_POST["incognitas"];$i++)
  {
    $numA[]=rand(0,1);
  }
  $_SESSION["aleatorioN"] = $numA; 
	$_SESSION["IntentosTotal"]= pow(2, $_POST["incognitas"]);
	$_SESSION["contIntentos"]=0;
	$_SESSION["fin"]=0;
}

//$_SESSION["aleatorio"]= rand(1,10);

//var_dump($_SESSION);
//var_dump($_POST);


//session_unset();
  
//session_destroy();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>MICRO MASTER MIND</title>
	<link rel="stylesheet" type="text/css" href="view.css" media="all">
	<!--<link rel="stylesheet" type="text/css" href="view.css" media="all">-->
	

</head>
<body id="main_body" >

	<div id="form_container">
	
		<h1><a>MICRO MASTER MIND</a></h1>
		<form class="appnitro"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<div class="form_description">
			<h2>MICRO MASTER MIND</h2>
			<p>El gran juego de Micro Master Mind</p>
		</div>						
			<ul >
			
					<li class="section_break">
			<h3>JUEGO</h3>
			<p></p>
		</li>		<li id="li_1" >

		<div>
			<?php
			$numA= $_SESSION["aleatorioN"]; 
			for ($i=0;$i<count($numA);$i++)
  		{	
				echo '<input name="elem_'.$i.'" type="text" size="1" maxlength="1" value="'.putElem("elem_".$i).'"/> ';
			}		
			?>
		</div><p class="guidelines" id="guide_1"><small>Introduce postura...</small></p> 
		</li>		<li class="section_break">
			<h3>RESULTADOS</h3>
			<p></p>
		</li>		
		<li id="li_4" >
		<label class="description" for="element_4">Nº de aciertos </label>
		<div>
			<input name="nnaciertos" class="element text small" type="text" maxlength="255" readonly value="<?php echo calcNAciertos()?>"/> 
		</div> 
		</li>		
		<li id="li_5" >
		<label class="description" for="element_5">Nº de apuestas realizadas </label>
		<div>
			<input name="nnapuestas" class="element text small" type="text" maxlength="255" readonly value="<?php echo $_SESSION["contIntentos"]?>"/> 
		</div> 
		</li>		
		<li id="li_6" >
		<label class="description" for="element_6">Nº de intentos que faltan </label>
		<div>
			<input name="nnIFaltan" class="element text small" type="text" maxlength="255" readonly value="<?php echo ($_SESSION["IntentosTotal"]-$_SESSION["contIntentos"])?>"/> 
		</div> 
		</li>
				
				<li class="section_break">
			<h3>CONSOLA</h3>
			<p></p>
		</li>		<li id="li_7" >
		<label class="description" for="element_7"> </label>
		<div>
			<textarea name="nnTexto" class="element textarea medium" readonly><?php echo escribirTemas()?></textarea> 
		</div> 
		</li>		<li class="section_break">
			<h3></h3>
			<p></p>
		</li>
			</ul>
			<input type="submit" name="submit" value="Apostar" <?php  if ($_SESSION["fin"]==1) echo 'disabled'; ?>/>
		</form>	
	</div>		
		<form method="post" action="./mmm.php">
			<input type="submit" name="submit" value="Salir" />
		</form>
	<?php 	
	function putElem($elemi)
	{
		if (isset($_POST[$elemi]))
		{
			return $_POST[$elemi];
		}
		else
		{
			return "";	
		}
	}
	function calcNAciertos()
	{				
		$numA= $_SESSION["aleatorioN"] ; 
		$cont = 0;
		for ($i=0;$i<count($numA);$i++)
		{					
			if (isset($_POST['elem_'.$i])&&($_POST['elem_'.$i]!=""))
			{
				if ($_POST['elem_'.$i]==$numA[$i])
				{
					$cont++;
				}	
			}
		}
		return $cont;
	}
						 
						 
	function escribirTemas()
	{
		$texto="";
		if (isset($_POST["nnTexto"]))
		{
			$texto=$_POST["nnTexto"]."\n";
			$nAci=calcNAciertos();
		if ($nAci==count($_SESSION["aleatorioN"] ))
		{
				$texto.= "ENHORABUENA! RETO CONSEGUIDO EN ".$_SESSION["contIntentos"]." INTENTOS";
				$_SESSION["fin"]=1;
		}
		else
		{
			$numA= $_SESSION["aleatorioN"]; 
			for ($i=0;$i<count($numA);$i++)
  		{					
				$texto.=$_POST['elem_'.$i];
			}
			$texto.=" aciertos: ".$nAci;
			if ($_SESSION["contIntentos"]==$_SESSION["IntentosTotal"])
			{
				$texto.="\nAgotado número de intentos";
				$_SESSION["fin"]=1;
			}
		}
		}
		return $texto;
	}
	?>	

	</body>
</html>