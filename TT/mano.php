 <?php 
require_once('dbutils.php');
  $db = conectarDB();
  
//var_dump($_POST);
?>
<!DOCTYPE html>
<html>
<body>
<form method="post" action="TT.php">
  <input type="hidden"name="seleccionn" value="<?php echo $_POST['seleccionn']?>"/>
  <input type="hidden"name="nombreJugador" value="<?php echo $_POST['nombreJugador']?>"/>
  <input type="hidden"name="nSuerte" value="<?php echo $_POST['nSuerte']?>"/>
    <input type="hidden"name="nombreCli" value="<?php echo $_POST['nombreCli']?>"/>

  <?php
      insertarMano();
  ?>
  <br/>
  <input type="submit" name="volver" value="volver"></input>

 </form>
</body>
</html>

<?php 



function insertarMano() 
{
  global $db;
  try {
    
    $nickPlayer=$_POST["nombreJugador"].'-'.$_POST["nSuerte"];   
    if (Count(existeJugador($_POST["seleccionn"],$nickPlayer,$db))>0)
    {
      borrarManoJugador($_POST["seleccionn"],$nickPlayer,$db);
    }
    $arrayCartas= $_POST["scartas"];
    $cont=0;
    $sCartas="";
    for ($i=0;$i<Count($arrayCartas);$i++)
    {
      echo '<input type="hidden" name="scartas[]" value="'. $arrayCartas[$i]. '">';  
        $sCartas.=getNombreCarta($arrayCartas[$i],$db).'<br/>';
        $sql = "INSERT INTO manos (PAR_ID,NOMBREJU, CARTA_ID) VALUES (".$_POST["seleccionn"].",'".$nickPlayer."',".$arrayCartas[$i].")";
        $db->exec($sql);
        $cont++;
    }
    echo 'Mano insertada correctamente<br/>';
    echo 'Partida:'.$_POST["nombrePartida"].'<br/>';
    echo 'Jugador:'.$nickPlayer.'<br/>';
    echo 'Cartas:<br/>';
    echo $sCartas;
  }
  catch(PDOException $e)
  {
    echo $sql . "<br>" . $e->getMessage();
  }
}
?>