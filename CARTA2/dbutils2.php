<?php
function conectarDB()
{
 try 
  {
      $db = new PDO('mysql:host=localhost;dbname=CARTA;charset=utf8mb4', 'root', '');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
      return $db;
  } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 
}

function getCarta($db)
{
  $fila=array();
 try 
  {
  $stmt = $db->query("SELECT C FROM C");
  $fila = $stmt->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 
  return $fila["C"];
}
function getCartaMago($db)
{
  $fila=array();
 try 
  {
  $stmt = $db->query("SELECT OTRO FROM C");
  $fila = $stmt->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 
  return $fila["OTRO"];
}

function actualizarCarta($db,$nCarta)
{
    $sql = "UPDATE C SET C='".$nCarta."'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}
function actualizarCartaMago($db,$nCarta)
{
    $sql = "UPDATE C SET OTRO='".$nCarta."'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}

/*
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
*/
?>
