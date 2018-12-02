<?php 
require_once('dbutils.php');
$db = conectarDB();
//var_dump($_POST);
?>
<!DOCTYPE html>
<html>
<head>
<script> 
function validateForm()
{

  var su = document.getElementById("nSuerte").value;
  var itIsNumber = /^[0-9]{3}$/.test(su); // true if it is what you want

  if (!itIsNumber)
  {
    alert("El numero de la suerte debe ser un numero de 3 cifras");
    return false;
  }
  return true;
}
  
 </script>
</head> 
  
<body>
  <form method="post" action="mano.php" onsubmit="return validateForm();">
  <input type="hidden"name="seleccionn" value="<?php echo $_POST['seleccionn']?>"/>
    <label>PARTIDA:</label>
    <input type="text" name="nombrePartida" readonly value="<?php echo getNombrePartida($_POST['seleccionn'],$db)?>"/>
    <br/>
    <label>NOMBRE JUGADOR:</label>
    <input type="text" name="nombreJugador" required value="<?php if (isset($_POST['nombreJugador'])) echo $_POST['nombreJugador'];?>"/>
    <label>NUMERO SUERTE:</label>
  <input type="text" name="nSuerte" id="nSuerte" size="1" required value="<?php if (isset($_POST['nSuerte'])) echo $_POST['nSuerte'];?>"/>

    <br/>
    <label>MANO</label>
    <br/>
  <?php escribir();?>
  <input type="submit" name="enviar" value="enviar"></input>
  
  
  
  </form>
  
    <form method="post" action="jugar.php">
      <input type="submit" name="volver" value="volver"></input>
    </form>
</body>
</html>

<?php 
function escribir() {
  global $db;
  try
  {
   $stmt = $db->query("SELECT * FROM partidas WHERE id=" .$_POST["seleccionn"]);
  while($fila = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {
      for ($i=0; $i < $fila['ncartas']; $i++) { 
         echo "<select name='scartas[]'>".escribirOptions($i,$_POST['seleccionn'])."</select><br>";
      }
     
    }
    } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 

}

function escribirOptions($index,$idPartida) 
{
  global $db;
  $string ="";
  try
  {
   $stmt = $db->query("SELECT * FROM cartas where id in (SELECT ID_CARTA FROM cartas_partidas WHERE ID_PARTIDA=".$idPartida.")");
  $string.='<option value="11">-</option>'; 
  while($fila = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {
       $string.='<option '.isSelected($index,$fila['ID']).' value="'.$fila['ID'].'">'.$fila['VALOR']." ".$fila['PALO'].'</option>';
    }
  } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 

    return $string;
}

function isSelected($index,$idCarta)
{
  if (isset($_POST["scartas"]))
  {
    $aCartas = $_POST["scartas"];
    if ($aCartas[$index]==$idCarta)
    {
      return ' selected ';
    }
  }
}
?>