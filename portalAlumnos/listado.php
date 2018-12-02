<?php
require_once("dbUtils.php");
$dbPDO = conectarDB();
?>


<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>
<form method="post" action="inicio.php">
<table style="width:100%">
  <?php  
  try 
  {
    $stmt = $dbPDO->query("SELECT * FROM ALUMNOS WHERE ID_CLASE='".$_POST["clase"]."'");
    while($fila = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {
       echo '<tr><th>'.$fila['NOMBRE'].'</th></tr>';

    }
  } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 
?>  
</table>


      <input type="submit" name="submit" value="volver" />
    </form>
</body>
</html>
