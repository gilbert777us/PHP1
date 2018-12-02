<?php
require_once("dbUtils.php");
$dbPDO = conectarDB();
?>


<!DOCTYPE html>
<html>
<body>
<form method="post" action="listado.php">
<select name="clase">
<?php  
  try 
  {
$stmt = $dbPDO->query("SELECT * FROM CLASES");
while($fila = $stmt->fetch(PDO::FETCH_ASSOC)) 
{
  echo '<option value="'.$fila['ID'].'">'.$fila['NOMBRE'].'</option>';
}
    } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 
?>  
</select>  
      <input type="submit" name="submit" value="listado" />
    </form>
</body>
</html>


