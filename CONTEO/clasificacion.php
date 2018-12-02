<?php 
require_once('dbutils.php');
require_once('utils.php');


$db = conectarDB();
  ////var_dump($_POST);
  if (isset($_POST['adminBorrarJugador']) && isset($_POST['checks']))
  {
    $aJug = $_POST['checks'];
    foreach($aJug as $nJug => $on) 
    {
        borrarManoJugador($_POST['seleccionPar'],$nJug,$db);
    } 
  }
  $vJugCartas = getJugadoresCartas($_POST['seleccionPar'],$db);

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
    
      <form method="post" name="myform" onsubmit="return OnSubmitForm();">      
    <input type="hidden" name="seleccionPar" value="<?php echo $_POST['seleccionPar']?>"/>
    <h1>
      Clasificacion de la partida <?php echo getNombrePartida($_POST['seleccionPar'],$db).' ('.    Count($vJugCartas).' jugadores)';?>
    </h1>
    
      <?php escribirClasificacion($vJugCartas); ?>
      <input type="submit"  onclick="document.pressed=this.value" name="adminBorrarJugador" value="Borrar Jugador"></input>
      <input type="submit"  onclick="document.pressed=this.value" name="adminDetalleMano" value="Detalle Mano"></input>
      <input type="submit"  onclick="document.pressed=this.value" name="adminRefrescar" value="Refrescar"></input>

  <script type="text/javascript">
function OnSubmitForm()
{
  
  if(document.pressed == 'Detalle Mano')
  {
   document.myform.action ="detalleMano.php";
  }
  else
  {
    document.myform.action ="clasificacion.php";
  }
  return true;
}
</script>


  </form>
  <form method="post" action="admin.php">
     <input type="submit" name="adminVolver" value="Volver"></input>
  </form>
</body>
</html>

<?php 
function escribirClasificacion($vJugCartas)
{
  if (Count($vJugCartas)>0)
  {
  ////var_dump($vJugCartas);
  $vJugadores=array();
  foreach($vJugCartas as $nombre => $vCartas) 
  {
    $vJugadores[$nombre]=contarCartas($vCartas);
  }
  $tabla = "<table>";
  $tabla.="<tr><th></th><th>Nombre</th><th>Puntos</th><th></th></tr>";
  ////var_dump($vJugadores);
  
  foreach ($vJugadores as $k => $v) {
    $groups[$v][] = $k;
  }
  krsort($groups);
  foreach ($groups as $value => $group) {
    foreach ($group as $key) {
        $sorted[$key] = $value;
      }
  }
    $cont=1;
  foreach ($sorted as $nombre => $puntos) {
    $tabla.='<tr><td>'.$cont.'</td><td>'.$nombre.'</td><td>'.$puntos.'</td><td><input type="checkbox" name="checks['.$nombre.']"></td></tr>';
    $cont++;
  }
  
  $tabla.= "</table>";
  echo $tabla;
  }
  else
  {
    echo "No hay jugadores...<br/>";
  }
}
function contarCartas($vCartas)
{
  global $cartas;
  global $utilizadasCombos;
  $utilizadasCombos = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
  $cartas=$vCartas;
  ////var_dump($cartas);
  return contar('p');
}


?>