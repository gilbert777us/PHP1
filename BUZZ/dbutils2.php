<?php
function conectarDB()
{
 try 
  {
      $db = new PDO('mysql:host=localhost;dbname=BUZZ;charset=utf8mb4', 'root', '');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
      return $db;
  } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 
}

function getJugadoresCartas($db)
{
  $vectorTotal = array();
  try
  {
   $stmt = $db->query("SELECT * FROM PARTIDA");
  while($fila = $stmt->fetch(PDO::FETCH_ASSOC)) 
  {
    $nombre= $fila['NOMBRE'];
    $carta= $fila['ID'];
    if(!isset($vectorTotal[$nombre])) {
        $vectorTotal[$nombre] = array();
    }
    $vectorTotal[$nombre][] = $carta;
  }
    } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 
  return $vectorTotal;
}


function existeJugador($nombreJugador,$db)
{
  $fila=array();
 try 
  {
  $stmt = $db->query("SELECT * FROM PARTIDA WHERE nombre='" .$nombreJugador."'");
  $fila = $stmt->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 
  return $fila;
}



function borrarPartida($db)
{
 try 
  {
   $sql = "DELETE FROM PARTIDA";
   $db->exec($sql);
  } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 
}



function borrarManoJugador($nombreJugador,$db)
{
 try 
  {
   $sql = "DELETE FROM PARTIDA WHERE nombre='" .$nombreJugador."'";
   $db->exec($sql);
  } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 
}

?>
