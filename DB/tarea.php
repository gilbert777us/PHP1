<?php 
$db = conectarDB();

 //var_dump($_POST);

if (isset($_POST['BotonActualizar'])&& !empty($_POST['txtNewTareaB']))
{
    actualizarTabla();
}

//echo getNombreClase(6);
//escribirOptions();
//echo escribirTr();
$id_tarea = getIdTarea($_POST['txtNewTareaB']);
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
    <?php if(isset($_POST['txtNewTareaB'])) echo 'TAREA: '.$_POST['txtNewTareaB']; ?>
  </h1>
  <form method="post" action="tarea.php">
     <input type="submit" name="BotonActualizar" value="actualizar"></input> 
<table>  
 <?php 
   escribirTr($id_tarea);
  ?>
</table>
    <input type="submit" name="BotonActualizar" value="actualizar"></input> 
  <input type="hidden" name=" txtNewTareaB" value="<?php echo $_POST['txtNewTareaB']?>"></input> 
  
  <script type="text/javascript">  
    
//This is done to make the following JavaScript code compatible to XHTML. <![CDATA[     
function setHiddenCCOK(idd,iddH)     
{     
  if(document.getElementById(idd).checked) 
  {
    document.getElementById(iddH).value = 1;
  }
  else
  {
    document.getElementById(iddH).value = 0;
  }
  //alert(document.getElementById(iddH).value);
}  
</script> 
  
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

function escribirTr($id_tarea) {
  global $db;
  try 
  {
    $stmt = $db->query("SELECT * FROM TAREASALUMNOS WHERE ID_TAREA=" .$id_tarea);
    echo  '<tr><th>Nombre</th><th>Ok</th><th>Nota</th><th>Comentario</th></tr>';
    $i=0;
    while($fila = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {
      echo '<input type="hidden" name="ids[]" value="'. $fila['ID'].'"></input>';
      echo  '<tr> <td>'.getNombreAlumno($fila['ID_ALUMNO']).'</td> <td>'.getCheckBox($fila['OK'],$i).'</td><td>'.getInputNota($fila['NOTA']).'</td><td>'.getInputComentario($fila['COMENTARIO']).'</td> </tr>';
      $i++;
    }
  }
  catch(PDOException $ex) 
  {    
       echo  '<tr> <td> no datos</td> </tr>';
  } 
}

function getCheckBox($ok,$i)
{
  $okAux='';
  if ($ok==1)
  {
    $okAux='checked';
  }
  
  return '<input type="hidden" id="ccOK'.$i.'" name="ccOK[]" value="'. $ok .'"></input><input  id="cOK'.$i.'" onclick="setHiddenCCOK(\'cOK'.$i.'\',\'ccOK'.$i.'\')" type="checkbox" name="cOK[]" '.$okAux. ' />';
}


function getInputNota($nota)
{
  return '<input type="text" name="nota[]" value="'.$nota.'" size="1"/>';
}

function getInputComentario($com)
{
  return '<input type="text" name="com[]" value="'.$com.'"/>';
}

function getIdTarea($nombreClase) {
   global $db;
   $stmt = $db->query("SELECT ID FROM TAREAS WHERE NOMBRE ='" . $nombreClase."'");
   $fila = $stmt->fetch(PDO::FETCH_ASSOC);
   return $fila['ID'];
}

function getNombreClase($idClase){
  global $db;
  $stmt = $db->query("SELECT NOMBRE FROM CLASES WHERE ID =".$idClase);
  $fila = $stmt->fetch(PDO::FETCH_ASSOC);
  return $fila['NOMBRE'];
}
function getNombreAlumno($idAlumno){
  global $db;
  $stmt = $db->query("SELECT NOMBRE FROM ALUMNOS WHERE ID =".$idAlumno);
  $fila = $stmt->fetch(PDO::FETCH_ASSOC);
  return '<input type="text"  size="10" name="nomb[]" value="'.$fila['NOMBRE'].'"/>';
    
    
    ;
}

function actualizarTabla()
{
  //var_dump ($_POST);
  for ($i=0;$i< count($_POST['ids']);$i++)
  {
    actualizarFila($i);
  }
}
         
function actualizarFila($i)
{
  global $db;
  $sql = 'UPDATE TAREASALUMNOS SET NOTA='.$_POST['nota'][$i].',COMENTARIO="'.$_POST['com'][$i].'",OK='.$_POST['ccOK'][$i].' WHERE ID='.$_POST['ids'][$i];
    // Prepare statement
    $stmt = $db->prepare($sql);

    // execute the query
    $stmt->execute();
  
  //echo $stmt->rowCount() . " records UPDATED successfully";
}

?>