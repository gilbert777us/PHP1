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

  <input type="submit" name="volver" value="volver"></input>
  



<?php 
$db = conectarDB();

try {
borrarTareasAlumnos($_POST["txtBorrarTarea"]);
borrarTarea($_POST["txtBorrarTarea"]);
}
  catch(PDOException $e)
  {
    echo $sql . "<br>" . $e->getMessage();
  }

  
function borrarTarea($nombre){
 global $db;
 try {
    // use exec() because no results are returned
    $sql = "DELETE FROM TAREAS WHERE NOMBRE='".$nombre."'";
   //echo '$sql1:'.$sql;
    $db->exec($sql);
         echo "<h1>Tarea ".$nombre." borrada correctamente!</h1>";
  }
  catch(PDOException $e)
  {
    echo $sql . "<br>" . $e->getMessage();
  }
}

function borrarTareasAlumnos($nombreTarea){
 global $db;
 try {
   $sql = "DELETE FROM TAREASALUMNOS WHERE ID_TAREA=".getIdTarea($nombreTarea);
      //echo '$sql:'.$sql;
    $db->exec($sql);
  }
  catch(PDOException $e)
  {
    echo $sql . "<br>" . $e->getMessage();
  }
}

function getIdTarea($nombreTarea) {
   global $db;
   $stmt = $db->query("SELECT ID FROM TAREAS WHERE NOMBRE ='" . $nombreTarea."'");
   $fila = $stmt->fetch(PDO::FETCH_ASSOC);
   return $fila['ID'];
}


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

?>


  </form>
</body>
</html>