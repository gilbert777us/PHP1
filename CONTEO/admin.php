<?php 
require_once('dbutils.php');
$db = conectarDB();
?>

<!DOCTYPE html>
<html>
<body>
  <form method="post" action="nueva_partida.php">
     <input type="submit" name="nueva_partida" value="Nueva partida"></input>
  </form>
  <form method="post" action="clasificacion.php">
     <select name="seleccionPar"> 
        <?php 
       escribirOptions();
        ?>
       </select> 
     <input type="submit" name="clasi" value="clasificacion"></input>
  </form>
</body>
</html>

<?php 
function escribirOptions() {
  global $db;
  try{
    
   $stmt = $db->query("SELECT * FROM partidas");
  while($fila = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {
      echo '<option value="'.$fila['id'].'">'.$fila['nombre'].'</option>';
    }
  } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 
  
}
?>