<?php

function conectarDB()
{
 try 
  {
      $db = new PDO('mysql:host=localhost;dbname=CONTAJUEGOS;charset=utf8mb4', 'root', '');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
      return $db;
  } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 
}
function borrarPreguntas($db) 
{
  try
  {
    $db->query("DELETE FROM PREGUNTAS");
  } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 
}

 $db = conectarDB();
borrarPreguntas($db) ;

?>