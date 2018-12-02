<html>
<head>
	<meta charset="utf-8">
	<style type="text/css">
		
		input {
			font-size: 12pt
		}

	</style>
</head>
<body bgcolor="#5EAAFB" style="font-size: 20px">	
	<div style="font-size: 14px; font-family: Verdana; color: #00000; width: 550px; font-weight: bold;">
		<form action="" method="post">

			 <fieldset>
	    		<legend>Inicial</legend>	
	    			<?php
					if(isset($_POST["inicial"])) {
						echo "<textarea name='inicial' cols='80' rows='5' value='" . $_POST["inicial"] . "'></textarea>";
					} else {
						echo "<textarea name='inicial' cols='80' rows='5' placeholder='Introduce un texto!'></textarea>";
					}

	    			?>	
			</fieldset>
			<p>

			<fieldset>
	    		<legend>Encriptado</legend>
	    		<textarea cols="80" rows="5">
<?php
	if(isset($_POST["inicial"])) {
		$inicial = $_POST["inicial"];
		if($inicial != "") {
			practica($inicial);
		}
	}
?>
				</textarea>	
			</fieldset>

			<input type="submit" value="Encriptar">

		</form>
		</div>
</body>
</html>

<?php

function practica($cadena) {

	$cadena = strrev($cadena);


	/* Opción strstr */ 

	$transformar = array(
		"a" => "e",
		"e" => "i",
		"i" => "o",
		"o" => "u",
		"u" => "a",
		"A" => "E",
		"E" => "I",
		"I" => "O",
		"O" => "U",
		"U" => "A"
		);

	echo strtr($cadena, $transformar);


	/* Opción regplace
	
	$vocales = array();
	$vocales[0] = '/u/';
	$vocales[1] = '/o/';
	$vocales[2] = '/i/';
	$vocales[3] = '/e/';
	$vocales[4] = '/a/';
	$vocales[5] = '/U/';
	$vocales[6] = '/O/';
	$vocales[7] = '/I/';
	$vocales[8] = '/E/';
	$vocales[9] = '/A/';

	$vocales_desplz = array();
	$vocales_desplz[0] = '_P_';
	$vocales_desplz[1] = 'u';
	$vocales_desplz[2] = 'o';
	$vocales_desplz[3] = 'i';
	$vocales_desplz[4] = 'e';
	$vocales_desplz[5] = '_M_';
	$vocales_desplz[6] = 'U';
	$vocales_desplz[7] = 'O';
	$vocales_desplz[8] = 'I';
	$vocales_desplz[9] = 'E';

	$cadena = preg_replace($vocales, $vocales_desplz, $cadena);

	$vocales = array();
	$vocales[0] = '/_P_/';
	$vocales[1] = '/_M_/';

	$vocales_desplz = array();
	$vocales_desplz[0] = 'a';
	$vocales_desplz[1] = 'A';

	echo preg_replace($vocales, $vocales_desplz, $cadena);

	*/

}

?>