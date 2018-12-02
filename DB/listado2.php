<?php 
$db = conectarDB();
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
  <form method="post" action="inicio.php">
<table>
 <?php 
   escribirTr();
  ?>
</table>
  <input type="submit" name="volver" value="volver"></input>
  
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

function escribirTr() {
  global $db;
   $stmt = $db->query("SELECT NOMBRE FROM ALUMNOS WHERE ID_CLASE=" .$_POST["seleccion"]);
  while($fila = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {
      echo  '<tr> <td>'.$fila['NOMBRE'].'</td> </tr>';
    }
}

function getNombreClase($db,$idClase){
  $stmt = $db->query("SELECT NOMBRE FROM CLASES WHERE ID =".$idClase);
  $fila = $stmt->fetch(PDO::FETCH_ASSOC);
  return $fila['NOMBRE'];
}


?>