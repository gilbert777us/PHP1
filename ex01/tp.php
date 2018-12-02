<?php
$avances=rand(0,2);

if(isset($_POST["bAV1"]) && $_POST["ta"] > 0){
	$t1 = jugada(); // siguiente simbolo (debería ser el siguiente en el orden)
	$t2 = $_POST["t2"];
	$t3 = $_POST["t3"];
	$_POST["ta"] = $_POST["ta"] - 1;
}
else if(isset($_POST["bAV2"]) && $_POST["ta"] > 0){
	$t2 = jugada(); // siguiente simbolo (debería ser el siguiente en el orden)
	$t1 = $_POST["t1"];
	$t3 = $_POST["t3"];
	$_POST["ta"] = $_POST["ta"] - 1;
} 
else if(isset($_POST["bAV3"]) && $_POST["ta"] > 0){
	$t3 = jugada(); // siguiente simbolo (debería ser el siguiente en el orden)
	$t1 = $_POST["t1"];
	$t2 = $_POST["t2"];
	$_POST["ta"] = $_POST["ta"] - 1;
} else {
	$t1 = jugada();
	$t2 = jugada();
	$t3 = jugada();
}
 $bancaRota=0;
function avances()
{

	global $avances;	
	if(isset($_POST["ta"]) && $_POST["ta"]>0) return $_POST["ta"];	
	if($avances == 2){
		$numAvances = rand(1,4);
	}
		else{
			$numAvances =0;
		}
	
	return $numAvances;
	}

function credito()
{
	global $bancaRota;
	global $t1;
	global $t2;
	global $t3;
	
	if(!isset($_POST["tc"]))
		$dinero=100;
	else if(isset($_POST["bIni"]))
		$dinero= $_POST["tc"]-5;
	
	else
	{
	$dinero = $_POST["tc"];	
	}
	
	if(isset($t1) && isset($t2) && isset($t3))
	{
		if($t1=="$" && $t2=="$" && $t3=="$"){
			$dinero+=10;
		}
		else if($t1=="#" && $t2=="#" && $t3=="#"){
				$dinero+=25;
		}
		else if($t1=="@" && $t2=="@" && $t3=="@"){
				$dinero+=50;
		}
		else if($t1=="$" && $t2=="#" && $t3=="@"){
				$dinero+=100;
		}
	}
	if($dinero<=0)
		$bancaRota=1;
		
	return $dinero;
}
function jugada()
{
$aleatorio=rand(0,2);
	if($aleatorio==0)
	{
		$valor="@";
	}
	else if($aleatorio==1)
	{
		$valor="#";
	}
	else if($aleatorio==2)
	{
		$valor="$";
	}
	return $valor;
}

function consola()
{
	global $bancaRota;
	global $t1;
	global $t2;
	global $t3;
	if(isset($t1) && isset($t2) && isset($t3))
	{
		if($t1=="$" && $t2=="$" && $t3=="$"){
			$imprimir="premio! 10 euros";
		}
		else if($t1=="#" && $t2=="#" && $t3=="#"){
				$imprimir="premio! 25 euros";
		}
		else if($t1=="@" && $t2=="@" && $t3=="@"){
				$imprimir="premio! 50 euros";
		}
		else if($t1=="$" && $t2=="#" && $t3=="@"){
				$imprimir="premio! 100 euros";
		}
		else if($bancaRota==1)
			$imprimir="Esta en bancarota";
		else
			$imprimir="no hay premio, siga jugando";
	}
	else
		$imprimir="empieza a gastar";
	
return $imprimir;
	
}
function noAvances(){
 if (isset($_POST["ta"]) && ($_POST["ta"]==0))
	 return " disabled ";
	else
		return "";
}


?>
<!DOCTYPE HTML>
<html>  
<body>
  
<form name="form1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <h2>TRAGAPERRAS</h2>
  <fieldset>  
    <legend>CREDITO</legend>
    <input name="tc" type="text" maxlength="1" size="1" value="<?php echo credito();  ?>"  align="right" ></input>
  </fieldset>
  <fieldset>  
  <legend>JUGADA (5 euros)</legend>
		
  <table>
<tbody>
<tr>
<div>
    <input name="t1" type="text" maxlength="1" size="1" value="<?php echo $t1; ?>"></input>
    <input name="t2" type="text" maxlength="1" size="1" value="<?php echo $t2; ?>"></input>
    <input name="t3" type="text" maxlength="1" size="1" value="<?php echo $t3; ?>"></input>
    <input type="submit" name="bIni" value="jugar" />
    </div>

</tr>
<tr>
  <div>
<label>&nbsp;</label>
</div>
</tr>
<tr>
  <div>
<label>AVANCES </label><input name="ta" type="text" maxlength="1" size="1" value="<?php echo avances(); ?>"></input>
</div>
</tr>
</tbody>
</table>


  </fieldset>
   <fieldset>  
    <legend>AVANCES</legend>
    <input type="submit" name="bAV1" value="AV1" <?php echo noAvances()?>/>
    <input type="submit" name="bAV2" value="AV2" <?php echo noAvances()?> />
    <input type="submit" name="bAV3" value="AV3" <?php echo noAvances()?> />
  </fieldset>
   <fieldset>  
    <legend>CONSOLA</legend>
    <div>
			<textarea   rows="5" cols="10" name="nnTexto" readonly><?php echo consola(); ?> </textarea> 
		</div> 
  </fieldset>
   <fieldset>  
    <legend>PREMIOS</legend>
    <div>
<table border="1">
<tbody>
<tr>
<td>$</td>
<td>$</td>
<td>$</td>
<td>10</td>
</tr>
<tr>
<td>#</td>
<td>#</td>
<td>#</td>
<td>25</td>
</tr>
<tr>
<td>@</td>
<td>@</td>
<td>@</td>
<td>50</td>
</tr>
<tr>
<td>$</td>
<td>#</td>
<td>@</td>
<td>100</td>
</tr>
</tbody>
</table>
		</div> 
  </fieldset>
  
</form>

</body>
</html>