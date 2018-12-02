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


function getNombrePartida($idPartida,$db) 
{
  $nombre="";
  try
  {
    $stmt = $db->query("SELECT nombre FROM partidas where id=".$idPartida);
    $fila = $stmt->fetch(PDO::FETCH_ASSOC);
    $nombre=$fila['nombre'];
   } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 
    return $nombre;
}

function getJugadoresCartas($idPar,$db)
{
  $vectorTotal = array();
  try
  {
   $stmt = $db->query("SELECT * FROM manos WHERE PAR_ID=" .$idPar);
  while($fila = $stmt->fetch(PDO::FETCH_ASSOC)) 
  {
    $nombre= $fila['NOMBREJU'];
    $carta= $fila['CARTA_ID'];
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


function getNombreCarta($idCarta,$db) 
{
  $nombre="";
  try
  {
    $stmt = $db->query("SELECT * FROM cartas where id=".$idCarta);
    $fila = $stmt->fetch(PDO::FETCH_ASSOC);
    $nombre=$fila['VALOR'].' '.$fila['PALO'].' '.$fila['COLOR'];
   } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 
    return $nombre;
}

function existeJugador($idPar,$nombreJugador,$db)
{
  $fila=array();
 try 
  {
  $stmt = $db->query("SELECT * FROM manos WHERE nombreju='" .$nombreJugador."' AND id=" .$idPar);
  $fila = $stmt->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 
  return $fila;
}



function borrarManoJugador($idPar,$nombreJugador,$db)
{
 try 
  {
   $sql = "DELETE FROM manos WHERE nombreju='" .$nombreJugador."' AND par_id=" .$idPar;
   $db->exec($sql);
  } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 
}

?>
