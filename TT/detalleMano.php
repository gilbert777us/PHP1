<?php 
require_once('dbutils.php');
require_once('utils.php');
  $db = conectarDB();
 // var_dump($_POST);
if (isset($_POST['checks']))
{
$aJug = $_POST['checks'];
$jugSelect="";
    foreach($aJug as $nJug => $on) 
    {
        $jugSelect=$nJug;
    }
}
else
{
  $jugSelect="";
}
?>
<!DOCTYPE html>

<html>
  <head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>
  <form method="post" action="claTT.php">
    
  <input type="hidden" name="seleccionPar" value="<?php echo $_POST['seleccionPar']?>"/>

    <h1>
      Mano de <?php echo $jugSelect?>:
    </h1>
    <?php escribirCartasJugador($_POST['seleccionPar'],$jugSelect)?>
    <?php escribirPuntuacion()?>
    <input type="submit" name="adminVolver" value="Volver"></input>
  </form>
</body>
</html>

<?php 

$vCartasJugador= array();
  
function escribirCartasJugador($idPar,$nombreJug)
{
  global $db;
  global $vCartasJugador;
  try
  {
   $stmt = $db->query("SELECT * FROM manos WHERE PAR_ID=" .$idPar." AND NOMBREJU='".$nombreJug."'");
  echo "<h3>CARTAS</h3>";
  while($fila = $stmt->fetch(PDO::FETCH_ASSOC)) 
  {
    $vCartasJugador[]=$fila['CARTA_ID'];
    $cv= getNombreCarta($fila['CARTA_ID'],$db);
    if (trim($cv)!='-')
    {
      echo $cv.'<br/>';
    }
    
  }
    } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 
}
function escribirPuntuacion()
{
  global $vCartasJugador;
  global $cartas;
  $cartas=$vCartasJugador;
  echo "<h3>PUNTUACION (".contar('p')." puntos)</h3>";
  echo contar('t');
}

?>