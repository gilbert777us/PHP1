<!DOCTYPE HTML>
<html>

<body>



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
function insertarNum($num,$db) 
{
  try
  {
    $db->query("INSERT INTO PREGUNTAS (`NUM`, `OTRO`) VALUES ('".$num."','');");
  } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 
}
function existeNum($num,$db)
{
  $fila=array();
 try 
  {
  $stmt = $db->query("SELECT COUNT(*) FROM PREGUNTAS WHERE NUM=" .$num);
  $fila = $stmt->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 
    
    if ($fila["COUNT(*)"]>0)
    {
       return 1;
    }
    else
    {
      return 0;
    }
}  

function contarPreguntas($db)
{
  $fila=array();
 try 
  {
  $stmt = $db->query("SELECT COUNT(*) FROM PREGUNTAS");
  $fila = $stmt->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $ex) 
  {    
   echo "An Error occured! ".$ex->getMessage();
  } 
  return $fila["COUNT(*)"];
}  

  
  
$totalPreguntas = array();
$totalPreguntas[] = array("Cuales de estas operaciones pertenecen al procesamiento de datos?","Suma, resta, multiplicacion, division","Descentramiento, brincar,ocultamiento, omision","Validacion, clasificacion, recapitulacion, analisis","Ninguna de las anteriores","Validacion, clasificacion, recapitulacion, analisis");
$totalPreguntas[] = array("Cuales son las formas de operar de un CPD?","Agrupado, desagrupado, mixto","Centralizada, descentralizada, mixta","Conjunto, solitario, mediopensionista","Si","Centralizada, descentralizada, mixta");
$totalPreguntas[] = array("Segun estas listas, que componentes pertenecen a los servidores de un CPD?","Luz, fuego, destruccion","Chasis, motor, palanca de cambios, frenos","Bastidores y racks, SAI, NAS, servidor de archivos","Ninguna de las anteriores","Bastidores y racks, SAI, NAS, servidor de archivos");
$totalPreguntas[] = array("Que elementos hay que tener en cuenta a la hora de planificar la seguridad en un CPD?","Cerramientos, instalaciones electricas, revestimientos","Refrigeracion, estructura de seguridad, apagado de incendios","Ninguna de las anteriores","Ambas","Ambas");
$totalPreguntas[] = array("Que tipos de CPD existen?","Tier I,II,III,IV); Servicio a empresas, alquiler, hosting","Tier A,B,C,D); Servicio a proveedores, alquiler, computo","ambas","Ninguna","Tier I,II,III,IV); Servicio a empresas, alquiler, hosting");
$totalPreguntas[] = array(" Cual de estos dispositivos es optico?","Pc Cards","Las dos son correctas","flash cards","Ninguna es correcta","Las dos son correctas");
$totalPreguntas[] = array("Que diferencia hay ente un CD-R y un CD-RW?","Que el R es mas pequeño","El R es optico y el RW magnetico","Que en uno se puede modificar su contenido","Ninguna de las anteriores","Que en uno se puede modificar su contenido");
$totalPreguntas[] = array("Cual de estos no es un tipo de dispositivo de almacenamiento?","optico","magnetico","binario","extraible","binario");
$totalPreguntas[] = array("Que tiene mayor capacidad?","Disco duro","CD-R","Disco flexible","Tambor magnetio","Disco duro");
$totalPreguntas[] = array("Cual de estos dispositivos no es magnetico?","Disco duro","Disco flexible","Todos lo son","Pendrive","Pendrive");
$totalPreguntas[] = array("Porque no se puede ejecutar un programa de 64 bits en un x86 ?","Porque las cadenas de instrucciones son demasiado grandes","Porque las cadenas de instrucciones son demasiado cortas","Porque se cortocircuita","Porque son corresponde a otra familia","Porque las cadenas de instrucciones son demasiado grandes");
$totalPreguntas[] = array("Que significan las siglas de ARM?.","Advanced Regular Machine","Advanced Risc Machine","Advantaged Regular Machine","Advanced Rsci Machine","Advanced Risc Machine");
$totalPreguntas[] = array("Que conjunto de instrucciones usa cadenas  mas largas?","x86","-64","","","-64");
$totalPreguntas[] = array("Que conjunto consta de un set mas complejo?.","RISC","CISC","","","CISC");
$totalPreguntas[] = array("Que arquitectura es mas comunmente usada en dispositivos moviles?.","CISC","x86","RISC","ARM","ARM");
$totalPreguntas[] = array("QUe ES UN PERIFeRICO?","Dispositivos de hacking","Dispositivo auxiliar que no pertenece directamente a un PC","Dispositivos de almacenamiento","Dispositivos de comunicacion","Dispositivo auxiliar que no pertenece directamente a un PC");
$totalPreguntas[] = array("Los perifericos de dividen en...","Salida, entrada y regreso","Entrada, arriba y abajo","Entrada, salida y entrada/salida","Entrada, izquierda, entrada/salida","Entrada, salida y entrada/salida");
$totalPreguntas[] = array("Que tres tipos de perifericos de salida hay?","Auditivos, tactiles y visuales","Fisicos, logicos y auditivos","Las dos anteriores son correctas","Ninguna de las anteriores es correcta","Auditivos, tactiles y visuales");
$totalPreguntas[] = array("Cual de estos dispositivos es un tipo de periferico hacking?","Lan-turtle","Spectre","WannaCry","Ninguno de los anteriores","Lan-turtle");
$totalPreguntas[] = array("Que es un Rubber Ducky?","Un USB","Un patito de goma","Dispositivo que funciona como una tarjeta de red","Es un dispositivo que funciona como teclado progamado","Es un dispositivo que funciona como teclado progamado");
$totalPreguntas[] = array("Una fuente de alimentacion...","Convierte la corriente alterna en una/s corrientes continuas","Se divide en fuentes lineales y fuentes transformadas","la 1 y la 2 son ciertas","ninguna de las anteriores","la 1 y la 2 son ciertas");
$totalPreguntas[] = array("Cual es el formato de fuente mas comun?","ATX","SFX","Pico PSU","Las fuentes de alimentacion externas","ATX");
$totalPreguntas[] = array("La funcion de una fuente de alimentacion es...","convertir la tension continua en alterna","convertir la tension continua en alterna de forma estable","convertir la tension alterna en continua","convertir la tension alterna en continua de forma estable","convertir la tension alterna en continua de forma estable");
$totalPreguntas[] = array("En los componentes de una fuente de alimentacion...","el transformador de entrada reduce la tension de red","el rectificador de diodos transforma la corriente","el regulador lineal proporciona una tension de salida","todas son ciertas","todas son ciertas");
$totalPreguntas[] = array("La tension final que se obtiene de un rectificador es en forma de...","Diodos","Voltios","Pulsos","Ninguna es cierta","Pulsos");
$totalPreguntas[] = array("Como se llama la aplicacion mencionada para Windows?","Comodo Backup","EaseUs Data Backup","BackUp My Files","EaseUs Todo Backup","EaseUs Todo Backup");
$totalPreguntas[] = array("En un sistema NAS de QNAP, Que dos metodos de configuracion existen para windows 10","Imagen de sistema e historial de archivo","Carpetas de archivos y archivos de programas","Imagen de sistema y carpetas de archivos","","Imagen de sistema e historial de archivo");
$totalPreguntas[] = array("Que es una herramienta de respaldo?","Backup de archivos y documentos imprescindibles","Restauracion de archivos y documentos imprescindibles","un programa para backup/restaurar archivos","","un programa para backup/restaurar archivos");
$totalPreguntas[] = array("Segun lo explicado, en la nube de google que beneficio tiene Google empresarial vs persona?","Google para una persona es gratis","Google empresarial hace streaming de los archivos","Google personal solo te da 15GB de almacenamiento online","Google Empresarial es mas seguro","Google empresarial hace streaming de los archivos");
$totalPreguntas[] = array("Como funciona Time Machine en mac","Haciendo una copia de todos los archivos","Time Machine es un app de Windows no de mac","Comprobando las fechas de modificacion","Es un app de video","Comprobando las fechas de modificacion");
$totalPreguntas[] = array("Que es un array","una copia de seguridad","utilizado por los programadores para revirsar informacion","en un metodo de reparacion de discos","sirve para sobre escribir en la memoria donde poder ejecutar","utilizado por los programadores para revirsar informacion");
$totalPreguntas[] = array("Para que se utiliza una gran torre?","se utiliza para ordenadores de uso cotidiano","para servidores de empresas","cpds","para el servicio de mineria y de utilizacion de memoria","para el servicio de mineria y de utilizacion de memoria");
$totalPreguntas[] = array("De que tipo de aceite se utiliza en la refrigeracion liquida","aceite virgen extra","aceite de girasol","aceite mineral","ninguna respuesta anterior","aceite mineral");
$totalPreguntas[] = array(" Que compone la refrigeracion del ordenador?","ventilador, masilla termica y disipador","ventilacion liquida y disipador","ventilador y disipador","ventilacion liquida, disipador y masilla termica","ventilador, masilla termica y disipador");
$totalPreguntas[] = array("Que es el chasis?","una rueda","la parte metalica o plastica que protege los componentes","la caja del ordenador donde contiene dentro los componentes","ninguna de las anteriores","la parte metalica o plastica que protege los componentes");
$totalPreguntas[] = array("Cual es el programa que se usa en Windows para acceder a la creacion de imagenes?","SDBLT","SDCLT","SBCLT","SBTLT","SDCLT");
$totalPreguntas[] = array("Una copia de seguridad te permite seleccionar lo que quieres copiar?","Si","Solo a Carlitos","No","Ni a Carlitos","Si, Ni a Carlitos");
$totalPreguntas[] = array("Ventajas de una copias de seguridad","Precio, tamaño","Velocidad, tamaño","Velocidad, precio","Tamaño","Velocidad, tamaño");
$totalPreguntas[] = array("Con que extension se guarda una imagen del sistema?",".iso",".aso",".paso",".oso",".iso");
$totalPreguntas[] = array("Una copia de seguridad ocupa mas que el disco original?","Si","No","Depende de la zona horaria","Depende del disco","No");
$totalPreguntas[] = array("Que es un RAID","conjunto de discos rigidos que funcionan como uno solo.","Sistema que distribuye o replica los datos.","Sistema de copias de seguridad.","Conjunto de discos que realizan copias de seguridad.","Sistema que distribuye o replica los datos.");
$totalPreguntas[] = array("TIPOS DE RAID","BASADO EN SOFTWARE Y HARDWARE","CON DISCOS MECaNICOS Y DISCOS SoLIDOS","EN SERVIDOR Y EN PC","BASADO EN IMAGENES","BASADO EN SOFTWARE Y HARDWARE");
$totalPreguntas[] = array("EN QUE CONSISTE UN RAID 3?","TIENE MINIMO 3 DISCOS MAS OTRO PARA PARIDAD","TIENE MINIMO 3 DISCOS USANDO UNO PARA PARIDAD","TIENE 2 DISCOS Y OTRO MAS PARA PARIDAD","TIENE 3 DISCOS Y OTROS 3 EN ESPEJO","TIENE MINIMO 3 DISCOS USANDO UNO PARA PARIDAD");
$totalPreguntas[] = array("COMO FUNCIONA UN RAID 5","CON 5 DISCOS","CON 4 DISCOS Y 1 EXTRA PARA PARIDAD","CON 5 DISCOS EN ESPEJO","TODOS LOS DISCOS TIENEN PARIDAD","TODOS LOS DISCOS TIENEN PARIDAD");
$totalPreguntas[] = array("COMO FUNCIONA UN RAID 0","LOS DATOS SON DISTRIBUIDOS ENTRE LOS DISCOS.","LA MITAD DE LOS DISCOS SON DE DATOS Y LOS DEMaS ESPEJOS.","TODO EL ALMACENAMIENTO VA A UN uNICO DISCO.","SI UN DISCO SE CAE HAY OTRO PARA RECUPERAR LA INFORMACIoN.","LOS DATOS SON DISTRIBUIDOS ENTRE LOS DISCOS.");
$totalPreguntas[] = array("Que tipo de deteccion existe:","firma de virus","heuristica","las dos anteriores son ciertas","ninguna es cierta","las dos anteriores son ciertas");
$totalPreguntas[] = array("Un antivirus en linea:","no proporciona proteccion","esta instalado en el ordenador","protege de forma permanente","analiza el sistema en busca de virus","analiza el sistema en busca de virus");
$totalPreguntas[] = array("Formas de proteccion de un cortafuegos:","bloqueo por programa","puertos de comunicacion","las dos anteriores son ciertas","todas son falsas","las dos anteriores son ciertas");
$totalPreguntas[] = array("los cortafuegos pueden ser implementados en:","hardware","software","ambas","ninguna","ambas");
$totalPreguntas[] = array("los cortafuegos a nivel de red o filtrado de paquetes:","trabajan a nivel de red","trabajan a nivel de transporte","trabajan a nivel de enlace de datos","todas son ciertas","todas son ciertas");
$totalPreguntas[] = array("Cual de estos tipos de ficheros pertenece a Microsoft?","NTFS","FAX","ext3","NTFC","NTFS");
$totalPreguntas[] = array("El sistema FAT fue diseñado originalmente para:","Discos Duros","Disquetes","memorias usb","discos de estado solido","Disquetes");
$totalPreguntas[] = array("cual de estos sistemas de archivos es nativo de MAC?","F2FS","HFS","XFS","ZFS","HFS");
$totalPreguntas[] = array("el archivo de configuracion de samba es:","smb.inf","samba.conf","smb.conf","samba.inf","smb.conf");
$totalPreguntas[] = array("cuantos tipos de permisos existen en linux y cuales son?","3 Lectura (R)– Escritura (W)– Ejecucion (X)","3 Acceso (A)– Proceso (P)– Exportacion (X)","2 Lectura (R)– Escritura (W)","1 Ejecucion (X)","3 Lectura (R)– Escritura (W)– Ejecucion (X)");
$totalPreguntas[] = array("-","-","-","-","-","-");

 $db = conectarDB();
  if (contarPreguntas($db) < Count($totalPreguntas)-1)
  {
  
  $nu = rand(0,Count($totalPreguntas)-2);
   while (existeNum($nu,$db)==1)
  {
    $nu = rand(0,Count($totalPreguntas)-2);
  }
  insertarNum($nu,$db);  
  }
  else
  {
    echo 'NO HAY MAS PREGUNTAS';
    $nu = Count($totalPreguntas)-1;
  }
  $pregunta =$totalPreguntas[$nu];
  
 ?>
    <form name="form1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <h1>
        <?php echo 'PREGUNTAS ('. contarPreguntas($db).'/'.(Count($totalPreguntas)-1).')'?>
      </h1>
      <fieldset>
        <legend>PREGUNTA</legend>
        <h3>
          <?php echo $pregunta[0]?>
        </h3>
      </fieldset>
      <fieldset>
        <legend>PICAS</legend>
        <h3>
          <?php echo $pregunta[1]?>
        </h3>
      </fieldset>
      <fieldset>
        <legend>CORAZONES</legend>
        <h3>
          <?php echo $pregunta[2]?>
        </h3>
      </fieldset>
      <fieldset>
        <legend>TREBOLES</legend>
        <h3>
          <?php echo $pregunta[3]?>
        </h3>
      </fieldset>
      <fieldset>
        <legend>DIAMANTES</legend>
        <h3>
          <?php echo $pregunta[4]?>
        </h3>
      </fieldset>
      <input type="submit" name="pregunta" value="otra pregunta"></th>
      
    </form>
<table style="width:100%">
  <tr>
    <th>
     <th></th>
     <th></th>
     <th></th>
     <th></th>
    <th></input><button onclick="verRespuesta()">Ver respuesta</button></th> 
  </tr>

</table>      

<script>
function verRespuesta() {
  alert ('<?php echo $pregunta[5]?>');
}
</script>
</body>

</html>