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

 
//var_dump($_POST);  

try {
insertarTarea($_POST["txtNewTarea"],$_POST["seleccion"]);
insertarTareasAlumnos($_POST["txtNewTarea"],$_POST["seleccion"]);
}
  catch(PDOException $e)
  {
    echo $sql . "<br>" . $e->getMessage();
  }

  
function insertarTarea($nombre,$id_clase){
 global $db;
 try {
    $sql = "INSERT INTO TAREAS (NOMBRE, ID_CLASE) VALUES ('".$nombre."',".$id_clase.")";
    // use exec() because no results are returned
    $db->exec($sql);
  }
  catch(PDOException $e)
  {
    echo $sql . "<br>" . $e->getMessage();
  }
}

function insertarTareasAlumnos($nombreTarea,$id_clase){
 global $db;
 try {
     $stmt = $db->query("SELECT ID FROM ALUMNOS WHERE ID_CLASE=" .$id_clase);
     while($fila = $stmt->fetch(PDO::FETCH_ASSOC)) 
     {
       $sql = "INSERT INTO  TAREASALUMNOS (ID_TAREA ,  ID_ALUMNO ,  OK ,  NOTA ,  COMENTARIO ) VALUES (".getIdTarea($nombreTarea).",".$fila['ID'].",0 ,'' , '')";
      // use exec() because no results are returned
      $db->exec($sql);
     }
      echo "<h1>Tarea ".$nombreTarea." creada correctamente!</h1>";
     echo '<input type="hidden" name="tareaNew" value="'.$nombreTarea.'"></input>';
     
    
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