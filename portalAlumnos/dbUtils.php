<?php
function conectarDB()
{
 try 
  {
    return  new PDO('mysql:host=localhost;dbname=TAREASCLASE;charset=utf8mb4', 'root', '');
  } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 
}
function getNombreClase($db,$idClase){
  $stmt = $db->query("SELECT NOMBRE FROM CLASES WHERE ID =".$idClase);
  $fila = $stmt->fetch(PDO::FETCH_ASSOC);
  return $fila['NOMBRE'];
}
?>