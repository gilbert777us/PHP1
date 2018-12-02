<?php 
$db = conectarDB();
?>

<!DOCTYPE html>
<html>
<body>
  <form method="post" action="nueva_tarea.php">
    <input type="text" name="txtNombreTarea"/>
    <input type="submit" name="btnTareaN" value="Crear_Tarea"/>
<b>CLASES</b>
<select name="seleccion"> 
  
  <?php 
  
 escribirOptions();

  ?>
</select>  
  </form>
    
  <form method="post" action = "tarea.php">
    <input type="text" name="txtTarea"/>
    <input type="submit" name="btnTarea" value="Tarea"/>
   
 </form>
 
</body>
</html>

<?php 
function conectarDB()
{
 try 
  {
    return new PDO('mysql:host=localhost;dbname=TAREASCLASE;charset=utf8mb4', 'root', '');
  } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 
}

function escribirOptions() {
  global $db;
   $stmt = $db->query("SELECT * FROM CLASES");
  while($fila = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {
      echo '<option value="'.$fila['ID'].'">'.$fila['NOMBRE'].'</option>';
    }
  
  
}




?>