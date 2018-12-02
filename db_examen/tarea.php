<?php 
$db = conectarDB();


//echo getNombreClase(6);
//escribirOptions();
//echo escribirTr();
$id_tarea = getIdClase($_POST['txtTarea']); 
//echo  "el id de la tarea es: ".$id_tarea; 
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
  <h1>
    <?php if(isset($_POST['btnTarea'])) echo 'TAREA: '.$_POST['txtTarea']; ?>
  </h1>
  <form method="post" action="tarea.php">
<table>  
 <?php 
   escribirTr($id_tarea);
  ?>
</table>
  </form>
  <form method="post" action="inicio.php">
    <input type="submit" name="volver" value="volver"></input> 
  </form>
</body>
</html>

<?php 
function conectarDB()
{
 try 
  {
      $db = new PDO('mysql:host=localhost;dbname=TAREASCLASE;charset=utf8mb4', 'root', '');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
      return $db;
  } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 
}
function ponercheck($num) {
  
$check="";
  if($num ==1){
    $check ="checked";
  }
    return '<input type="checkbox" name="check" '.$check.'/>';
  }

function escribirTr($id_tarea) {
  global $db;
   try 
  {
   $stmt = $db->query("SELECT * FROM TAREASALUMNOS WHERE ID_TAREA = ".$id_tarea);
     if  ($stmt->rowCount()>0)
     {  
       echo '<tr><th>NOMBRE</th><th>OK</th><th>NOTA</th><th>COMENTARIO</th></tr>' ;
       while($fila = $stmt->fetch(PDO::FETCH_ASSOC)) 
        {
            echo  '<tr><td>'.getNombreAlumno($fila['ID_ALUMNO']).'</td><td>'.ponercheck($fila['OK']).'</td><td>'.$fila['NOTA'].'</td><td>'.$fila['COMENTARIO'].'</td></tr>';
        }
     }
     else
     {
       echo "La tarea no existe";
     }
   }
  catch(PDOException $ex) 
  {    
    echo "Exception:".$ex->getMessage();
  }   
}


function getIdClase($nombreClase) {
   global $db;
  
  $id="";
   $stmt = $db->query("SELECT ID FROM TAREAS WHERE NOMBRE ='" . $nombreClase."'");
  if ($stmt->rowCount()>0)
  {
    $fila = $stmt->fetch(PDO::FETCH_ASSOC);
    $id= $fila['ID'];
  }
  else
  {
    $id=-1;
  }
   return $id;
}
function getNombreAlumno($id_Alumno) {
   global $db;
   $stmt = $db->query("SELECT NOMBRE FROM ALUMNOS WHERE ID = ".$id_Alumno);
   $fila = $stmt->fetch(PDO::FETCH_ASSOC);
   return $fila['NOMBRE'];
}



?>