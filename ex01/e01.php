<?php


   if (!isset ($_POST["tablero"]))
   {
     $_POST["tablero"]="********O********";
   }
   else
   {
    $tab = $_POST["tablero"];
    $fin = false;
    if (strpos($tab, '*') !== false)
    {
      $fin = true;
    }
   }
   
   if (isset ($_POST["bIz"]))
   {
     $_POST["tablero"] = moverIz($_POST["tablero"]);
   }
   else if (isset ($_POST["bDe"]))
   {
     $_POST["tablero"] = moverDe($_POST["tablero"]);
   }
   else if (isset ($_POST["bUp"]))
   {
     $_POST["tablero"] = transformar($_POST["tablero"]);
   }
   else if (isset ($_POST["bIni"]))
   {
     $fin = true;
     $_POST["tablero"] = "********O********";
   }


  ?>




<!DOCTYPE HTML>
<html>  
<body>
  
<form name="form1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  
  <fieldset>  
    <legend>MICRO COMECOCOS</legend>
    <input name="tablero" type="text" maxlength="10" size="10" value="<?php if (isset ($fin) && $fin=='') echo "FIN!!"; else echo $_POST["tablero"]?>"></input>
    <input type="submit" name="bIni" value="iniciar" />
  </fieldset>
   <fieldset>  
    <legend>Controles</legend>
    <input type="submit" name="bIz" value="<" />
    <input type="submit" name="bUp" value="^" />
    <input type="submit" name="bDe" value=">" />
  </fieldset>
  
</form>

<?php
  function moverIz($est)
  {
    for ($i = 0; $i < strlen($est); $i++)
    {
       if ($est[$i]=='O')
       {     
         if ($i>0)
         {
          $est[$i]=' ';
          $est[$i-1]='O';
         } 
         break;
       }
    }
  return $est;
  }
  function moverDe($est)
  {
    for ($i = 0; $i < strlen($est); $i++)
    {
       if ($est[$i]=='O')
       {
         
         if ($i<(strlen($est))-1)
         { 
          $est[$i]=' ';
          $est[$i+1]='O';
         } 
         break;
       }
    }
  return $est;
  }
  function transformar($est)
  {
    for ($i = 0; $i < strlen($est); $i++)
    {
       if ($est[$i]=='O')
       {
          $est[$i]='o';break;
       } else if ($est[$i]=='o')
       {
         $est[$i]='O';
         break;
       }
    }
  return $est;
  }
           
  ?>

</body>
</html>