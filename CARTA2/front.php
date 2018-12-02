<?php 
require_once('dbutils2.php');
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

function myFunction() {
    document.getElementById("myForm").submit();
}

 </script>
     <style>
img {
   position: absolute;
   top: 50%;
   left: 50%;
   width: 707px;
   height: 1013px;
   margin-top: -506px; /* Half the height */
   margin-left: -353px; /* Half the width */
}
  </style>
</head> 
  
<body>
  <form method="post" id="myForm" action="front.php">
   <img  width="707" height="1013"  src="cards/<?php echo getCarta($db)?>.png" onclick="myFunction()">
    <?php actualizarCarta($db,"53")?>
  </form>

  
</body>
</html>