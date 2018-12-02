 <?php 
require_once('dbutils.php');
  $db = conectarDB();
?>
<!DOCTYPE html>
<html>
<body>
<form method="post" action="nueva_partida.php">
  <?php
      insertarPartida($_POST["nombre"],$_POST["ncartas"],$db);
      escribirCarta();
  ?>
  <input type="submit" name="volver" value="volver"></input>

 </form>
</body>
</html>

<?php 

function insertarPartida($nombre,$nCartas,$db) 
{
  try
  {
    $db->query("INSERT INTO `partidas`(`nombre`, `ncartas`) VALUES ('".$nombre."','".$nCartas."');");
  } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 
}


function escribirCarta() 
{
  echo "La partida ".$_POST["nombre"]." con numero de cartas ".$_POST["ncartas"]." se ha insertado correctamente";

}



?>