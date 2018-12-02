<?php
$db = conectarDB();
$sql = "INSERT INTO ALUMNOS (NOMBRE, ID_CLASE) VALUES ('Manuel Costa',5)";
     $db->exec($sql);



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