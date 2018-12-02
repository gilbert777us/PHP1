<?php 
$db = conectarDB();
?>

<!DOCTYPE html>
<html>
<body>    
    <form method="post" name="myform" onsubmit="return OnSubmitForm();">      
      <input type="hidden" name="cbName" value="on"></input> 
      <input type="hidden" name="cbOks" value="on"></input> 
      <input type="hidden" name="cbNMedia" value="on"></input> 
      <input type="hidden" name="cbNTarea" value="on"></input> 
      <input type="hidden" name="cbNota" value="on"></input> 
      <input type="hidden" name="cbComentario" value="on"></input> 
<fieldset>  
    <legend>CLASES</legend>
      <select name="seleccion"> 
        <?php escribirOptions();?>
      </select>  
      <input type="submit" name="botonlistar" onclick="document.pressed=this.value" value="listar alumnos"></input>
      <input type="submit" name="btnListarTareas" onclick="document.pressed=this.value" value="listar tareas"/>
   </fieldset> 
      
  <script type="text/javascript">
function OnSubmitForm()
{
  if(document.pressed == 'listar alumnos')
  {
   document.myform.action ="listado2.php";
  }
  else if(document.pressed == 'nueva tarea')
  {
    document.myform.action ="nueva_tarea.php";
  }
  else if(document.pressed == 'listar tareas')
  {
    document.myform.action ="listar_tareas.php";
  }
  else if(document.pressed == 'buscar tarea')
  {
    document.myform.action ="tarea.php";
  }
  else if(document.pressed == 'borrar tarea')
  {
    document.myform.action ="borrar_tarea.php";
  }
  return true;
}
</script>

<fieldset>  
  <legend>TAREAS</legend>
    <input type="text" name="txtNewTarea"/>
    <input type="submit" name="btnTarea" onclick="document.pressed=this.value" value="nueva tarea"/>
  <br/>
    <input type="text" name="txtNewTareaB" value="<?php if (isset($_POST['tareaNew'])) echo $_POST['tareaNew'];?>"/>
    <input type="submit" name="btnTarea" onclick="document.pressed=this.value" value="buscar tarea"/>
  <br/>
  <input type="text" name="txtBorrarTarea" />
   <input type="submit" name="btnBorrarTarea" onclick="document.pressed=this.value" value="borrar tarea"/>

 </fieldset> 
</form>


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

function escribirOptions() {
  global $db;
   $stmt = $db->query("SELECT * FROM CLASES");
  while($fila = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {
      echo '<option value="'.$fila['ID'].'">'.$fila['NOMBRE'].'</option>';
    }
}




?>