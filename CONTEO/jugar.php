<?php 
require_once('dbutils.php');
$db = conectarDB();
?>

<!DOCTYPE html>
<html>
<body>
  <form method="post" action="inicioJugar.php">
<b>partida</b>
<select name="seleccionn"> 
  <?php 
    escribirOptions();
  ?>
</select> 
    <br/>
     <input type="submit" name="botonlistar" value="iniciar"></input>
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