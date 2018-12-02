<?php 
require_once('panaderiaSimple/Cliente.php');
require_once('panaderiaSimple/Pan.php');

session_start();
for ($i=0;$i<$_POST["numPan"];$i++)
{
	$_SESSION["panDevuelto"] = $_SESSION["cliente"]->preguntar($_SESSION["local"],$_POST["tipoPan"]);
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>PORTAL DE LA PANADERIA DE EDUs</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
</head>
<body id="main_body" >
	
	<div id="form_container">
	
		<h1><a>PORTAL DE LA PANADERIA DE EDUs</a></h1>
	<form id="form_56701" class="appnitro"  method="post" action="porPan.php">
		<div class="form_description">
			<h2>PAGADO</h2>
			<p>La gran panaderia de EDUs y Cia</p>
		</div>	
		
    <b><?php echo $_POST["numPan"]. " panes de tipo ". $_SESSION["panDevuelto"]->entregar()->tipo . " entregados." ?></b>
		<br/>
		<br/>
    <input type="submit" name="volver" value="volver a comprar">
		</form>

	</div>
	</body>
</html>