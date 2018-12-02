<?php 
//var_dump($_POST);
require_once('dbutils2.php');
$db = conectarDB();

  if (isset($_POST['valor0']) && isset($_POST['valor1']))
  {
    if ($_POST['valor0']=='0')
    {
      $carta= $_POST['valor1'];
    }
    else
    {
      $carta= $_POST['valor0'] . $_POST['valor1'];
    }
    //print ('carta:'.$carta);
    actualizarCarta($db,$carta);
  }
  else
  {
    actualizarCarta($db,"53");   
  }
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
  <form method="post" id="myForm" action="front_.php">
        
    <img  width="707" height="1013"  src="cards/<?php echo getCartaMagoX(getCarta($db))?>.png" onclick="myFunction()" >
  </form>
  <?php
  function getCartaMagoX ($carta)
  {
    //print ('cartaaaa:'.$carta);
    if ($carta=='53')
    {
      return '53';
    }
    else if ($carta=='1')
    {
      return '52';
    }
    else
    {
      return (($carta+0)-1).'';
    }
    
  }
  ?>
</body>
</html>