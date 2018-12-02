<?php 
$db = conectarDB();
//var_dump($_POST);
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
    <?php if(isset($_POST["seleccion"])){ echo getNombreClase($_POST["seleccion"]).': '.contarTareas($_POST["seleccion"]) .' tareas'; }?>
  </h1>
 
  <form method="post" name="myform" onsubmit="return OnSubmitForm();">
    
    <input type="hidden" name="seleccion" value="<?php echo $_POST['seleccion']?>"></input> 
  
    <fieldset>  
    <legend>FILTRO</legend>
      <label>Nombre<input type="checkbox" name="cbName" <?php if(isset($_POST["cbName"])) echo ' checked '?>/></label>
      <label>Oks<input type="checkbox" name="cbOks" <?php if(isset($_POST["cbOks"])) echo ' checked '?>/></label>
      <label>Nota Media<input type="checkbox" name="cbNMedia" <?php if(isset($_POST["cbNMedia"])) echo ' checked '?>/></label>
      <label>Nombre Tarea<input type="checkbox" name="cbNTarea" <?php if(isset($_POST["cbNTarea"])) echo ' checked '?>/></label>
      <label>Nota<input type="checkbox" name="cbNota" <?php if(isset($_POST["cbNota"])) echo ' checked '?>/></label>
      <label>Comentario<input type="checkbox" name="cbComentario" <?php if(isset($_POST["cbComentario"])) echo ' checked '?>/></label>
   </fieldset>
    <input type="submit" name="actualizar" onclick="document.pressed=this.value" value="actualizar"></input>
<table>
 <?php 
   escribirTr();
  ?>
</table>
  <input type="submit" name="actualizar" onclick="document.pressed=this.value" value="actualizar"></input>
  <input type="submit" name="volver" onclick="document.pressed=this.value" value="volver"></input>
  
  </form>
  
<script type="text/javascript">
function OnSubmitForm()
{
  if(document.pressed == 'actualizar')
  {
   document.myform.action ="listar_tareas.php";
  }
  else if(document.pressed == 'volver')
  {
    document.myform.action ="inicio.php";
  }
  return true;
}
</script>
</body>


</html>

<?php 
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

function escribirTr() {
  global $db;
   $stmt = $db->query("SELECT ID,NOMBRE FROM ALUMNOS WHERE ID_CLASE=" .$_POST["seleccion"]." order by NOMBRE");
  $cabeceraOk=0;
  while($fila = $stmt->fetch(PDO::FETCH_ASSOC)) 
  {
      if ($cabeceraOk==0)
      {
        echo escribirCabecera($fila['ID']);
      }
      $cabeceraOk=1;
      echo escribirFila($fila['ID'],$fila['NOMBRE']);
  }
}

function escribirCabecera($idAlumno)
{
  global $db;
  $nombre="";
  if(isset($_POST["cbName"]))
  {
    $nombre="<tr><th>Nombre</th>";
  }
  $oks="";
  if(isset($_POST["cbOks"]))
  {
    $oks="<th>Oks</th>";
  }
  $nMedia="";
  if(isset($_POST["cbNMedia"]))
  {
    $nMedia='<th>Nota Media</th>';
  }

  $cabecera= $nombre.$oks.$nMedia;  
  $stmt = $db->query("SELECT ID_TAREA FROM TAREASALUMNOS WHERE ID_ALUMNO =" .$idAlumno);
  while($fila = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {
      $nTarea="";
      if(isset($_POST["cbNTarea"]))
      {
        $nTarea='<th>'.getNombreTarea($fila['ID_TAREA']).'</th>';
      }
      $nNota="";
      if(isset($_POST["cbNota"]))
      {
        $nNota='<th>Nota</th>';
      }
      $nComentario="";
      if(isset($_POST["cbComentario"]))
      {
        $nComentario='<th>Comentario</th>';
      }

      $cabecera .=$nTarea.$nNota.$nComentario;
    }      
  $cabecera.='</tr>';
  return $cabecera;
}

function getNombreTarea($idTarea){
  global $db;
  $stmt = $db->query("SELECT NOMBRE FROM TAREAS WHERE ID =".$idTarea);
  $fila = $stmt->fetch(PDO::FETCH_ASSOC);
  return $fila['NOMBRE'];
}

function getNombreClase($idClase){
  global $db;
  $stmt = $db->query("SELECT NOMBRE FROM CLASES WHERE ID =".$idClase);
  $fila = $stmt->fetch(PDO::FETCH_ASSOC);
  return $fila['NOMBRE'];
}

function escribirFila($idAlumno,$nombreAlumno)
{
  global $db;
  $linea = '';
   $stmt = $db->query("SELECT OK , NOTA , COMENTARIO FROM TAREASALUMNOS WHERE ID_ALUMNO =" .$idAlumno);
  $oks=0;
  $notaM=0;
  $cont=0;
  
  

  
  while($fila = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {
      $nTarea="";
      if(isset($_POST["cbNTarea"]))
      {
        $nTarea='<td>'.$fila['OK'].'</td>';
      }
      $nNota="";
      if(isset($_POST["cbNota"]))
      {
        $nNota='<td>'.$fila['NOTA'].'</td>';
      }
      $nComentario="";
      if(isset($_POST["cbComentario"]))
      {
        $nComentario='<td>'.$fila['COMENTARIO'].'</td>';
      }

      $linea .= $nTarea.$nNota.$nComentario;
      $oks+=$fila['OK'];
      $notaM+=$fila['NOTA'];
      $cont++;
    }  
  $nombre="";
  if(isset($_POST["cbName"]))
  {
    $nombre='<td>'.$nombreAlumno.'</td>';
  }
  $oksT="";
  if(isset($_POST["cbOks"]))
  {
    $oksT='<td>'.$oks.'</td>';
  }
   $nMedia="";
  if(isset($_POST["cbNMedia"]))
  {
    $nm=0;
    if ($cont!=0)
    {
      $nm = $notaM/$cont;
    }    
    $nMedia='<td>'.$nm.'</td>';
  }
 
    $linea = '<tr>'.$nombre.$oksT.$nMedia.$linea.'</tr>';
  return $linea;
    
}

function contarTareas($idClase)
{
  global $db;
  $sql= 'SELECT COUNT( DISTINCT ID_TAREA ) AS NUM 
FROM TAREASALUMNOS
WHERE ID_ALUMNO = (
SELECT ID
FROM ALUMNOS
WHERE ID_CLASE ='.$idClase.'
LIMIT 1 ) ';
  $stmt = $db->query($sql);
  $fila = $stmt->fetch(PDO::FETCH_ASSOC);
  return $fila['NUM'];
    
}

?>