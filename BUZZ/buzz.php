<?php 
require_once('dbutils2.php');
$db = conectarDB();
//var_dump($_POST);
?>
<!DOCTYPE html>
<html>
<head>
<script> 
function validateForm()
{

  var su = document.getElementById("nSuerte").value;
  var itIsNumber = /^[0-9]{3}$/.test(su); // true if it is what you want

  if (!itIsNumber)
  {
    alert("El numero de la suerte debe ser un numero de 3 cifras");
    return false;
  }
  return true;
}
  
 </script>
</head> 
  
<body>
  <form method="post" action="mano.php" onsubmit="return validateForm();">
    <label>PARTIDA:</label>
    <input type="text" name="nombrePartida" readonly value="<?php echo 'BUZZ'?>"/>
    <br/>
    <label>NOMBRE JUGADOR:</label>
    <input type="text" name="nombreJugador" required value="<?php if (isset($_POST['nombreJugador'])) echo $_POST['nombreJugador'];?>"/>
    <label>NUMERO SUERTE:</label>
  <input type="text" name="nSuerte" id="nSuerte" size="1" required value="<?php if (isset($_POST['nSuerte'])) echo $_POST['nSuerte'];?>"/>
<br/>
<br/>
  <input type="submit" name="enviar" value="GO!" style=" border-width: 10px; border-style: dashed; background-color: #<?php echo random_color();?>; font-size : 200px; width: 100%; height: 1000px;"></input>
  </form>
<?php
  function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}
 ?>
  
</body>
</html>