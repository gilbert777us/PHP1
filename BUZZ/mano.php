 <?php 
require_once('dbutils2.php');
  $db = conectarDB();
  
//var_dump($_POST);
?>
<!DOCTYPE html>
<html>
<body>
<form method="post" action="buzz.php">
  <input type="hidden"name="nombreJugador" value="<?php echo $_POST['nombreJugador']?>"/>
  <input type="hidden"name="nSuerte" value="<?php echo $_POST['nSuerte']?>"/>
  
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
    if (Count(existeJugador($nickPlayer,$db))>0)
    {
      borrarManoJugador($nickPlayer,$db);
    }
    $sql = "INSERT INTO PARTIDA (NOMBRE,TIME,OTRO) VALUES ('".$nickPlayer."','".date("Y-m-d H:i:s.u")."','')";
    $db->exec($sql);
    echo "SUERTE!!!";
  }
  catch(PDOException $e)
  {
    echo $sql . "<br>" . $e->getMessage();
  }
}
?>