<?php 
require_once('dbutils2.php');


$db = conectarDB();
  ////var_dump($_POST);
  if (isset($_POST['adminBorrarPartida']))
  {
      borrarPartida($db);
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
    
      <form method="post" name="myform" onsubmit="return OnSubmitForm();">      
    <h1>
      Clasificacion BUZZ
    </h1>
    
      <?php escribirClasificacion(); ?>
      <input type="submit"  onclick="document.pressed=this.value" name="adminRefrescar" value="Refrescar"></input>
      <input type="submit"  onclick="document.pressed=this.value" name="adminBorrarPartida" value="Iniciar Partida"></input>

  <script type="text/javascript">
function OnSubmitForm()
{
    document.myform.action ="clasificacion.php";
  return true;
}
</script>


  </form>
</body>
</html>

<?php 
function escribirClasificacion()
{
  global $db;
  $vJugadores = getJugadoresCartas($db);
  if (Count($vJugadores)>0)
  {
  $tabla = "<table>";
  $tabla.="<tr><th>Posicion</th><th>Nombre</th></tr>";
  //var_dump($vJugadores);
  
  foreach ($vJugadores as $k => $v) {
    $groups[$v[0]][] = $k;
  }
  //echo 'ANTES: ';
  //var_dump($groups);
  krsort($groups);
    $groups= array_reverse($groups);
   //echo 'DESPUES: ';
    //var_dump($groups);
  $cont=1;
  foreach ($groups as $nombre => $puntos) {
    $tabla.='<tr><td>'.$cont.'</td><td>'.$puntos[0].'</td></tr>';
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

?>