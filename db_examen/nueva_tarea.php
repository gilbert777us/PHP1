<?php 
$db = conectarDB();
insertarTarea($_POST["txtNombreTarea"],$_POST["seleccion"]);

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

function insertarTarea($nombreTarea,$id_Clase) 
{
  global $db;
  try {   
   $sql="INSERT INTO TAREAS ( NOMBRE, ID_CLASE) VALUES ('".$nombreTarea."',".$id_Clase.")";  
   $db->exec($sql);
    echo "Inserccion realizada";
  } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 

  }
  

  
  
?>

<!DOCTYPE html>
<html>
<body>
  
 <form method="post" action = "inicio.php">
    <input type="submit" name="btnVolver" value="Volver_Inicio"/>
 </form>
 
</body>
</html>






