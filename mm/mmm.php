<?php 
session_start();
session_unset();  
session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>MICRO MASTER MIND</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
</head>
<body id="main_body" >
	
	<div id="form_container">
	
		<h1><a>MICRO MASTER MIND</a></h1>
	<form id="form_56701" class="appnitro"  method="post" action="./mmm2.php">
		<div class="form_description">
			<h2>MICRO MASTER MIND</h2>
			<p>El gran juego de Micro Master Mind</p>
		</div>						
			<ul >
			<li class="section_break">
			<h3>¿Cuantas incógnitas quieres?</h3>
			<p></p>
		</li>		<li id="li_1" >
		<label class="description" for="element_1"> </label>
		<div>
			<input id="element_1" name="incognitas" class="element text small" type="text" maxlength="255" value="4"/> 
		</div><p class="guidelines" id="guide_1"><small>Introduce dificultad [2-8]</small></p> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="56701" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Jugar" />
		</li>
			</ul>
		</form>	
	</div>
	</body>
</html>