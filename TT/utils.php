<?php
$cartas = array();
$utilizadasCombos = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);

function buscarCombo($c1,$c2,$c3,$c4)
{
  global $utilizadasCombos;
  global $cartas;
  //var_dump ($utilizadasCombos);
  ////var_dump ($cartas);
  $encontradoCombo=0;
  $cont1=-1;
  $cont2=-1;
  $cont3=-1;
  $cont4=-1;
  for($i = 0; $i < Count($utilizadasCombos); $i++) 
  {
    
    if ($utilizadasCombos[$i]==0)
    {
      //echo ' comprobamos '.$cartas[$i];
      switch ($cartas[$i]) {
        case $c1:
          $cont1=$i;
          //echo 'ok:'.$i;
          break;
        case $c2:
          $cont2=$i;
          //echo 'ok:'.$i;
          break;
        case $c3:
          $cont3=$i;
          //echo 'ok:'.$i;
          break;
        case $c4:
          $cont4=$i;
          //echo 'ok:'.$i;
          break;
      } 
      
    }
  }
  if ($cont1!=-1 && $cont2!=-1 && $cont3!=-1 && $cont4!=-1)
  {
    $utilizadasCombos[$cont1]=1;
    $utilizadasCombos[$cont2]=1;
    $utilizadasCombos[$cont3]=1;
    $utilizadasCombos[$cont4]=1;   
    $encontradoCombo=1;
  }
  return $encontradoCombo;
}

function buscarCinco($c1,$c2,$c3,$c4,$c5)
{
    global $utilizadasCombos;
    global $cartas;
  $encontradoCinco=0;
    $cont1=-1;
    $cont2=-1;
    $cont3=-1;
    $cont4=-1;
    $cont5=-1;
  for($i = 0; $i < Count($utilizadasCombos); $i++) 
  {
    
    if ($utilizadasCombos[$i]==0)
    {
      switch ($cartas[$i]) {
        case $c1:
          $cont1=$i;
          break;
        case $c2:
          $cont2=$i;
          break;
        case $c3:
          $cont3=$i;
          break;
        case $c4:
          $cont4=$i;
          break;
        case $c5:
          $cont5=$i;
          break;
      } 
    }
  }
  if ($cont1!=-1 && $cont2!=-1 && $cont3!=-1 && $cont4!=-1&& $cont5!=-1)
  {
    $utilizadasCombos[$cont1]=1;
    $utilizadasCombos[$cont2]=1;
    $utilizadasCombos[$cont3]=1;
    $utilizadasCombos[$cont4]=1;   
    $utilizadasCombos[$cont5]=1;   
    $encontradoCinco=1;
  }
  return $encontradoCinco;
}




function contar($texto)
{
 global $utilizadasCombos;
 global $cartas;
$utilizadasCombos = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$textoPremios="";
$puntos = 0;
//  31,32,33,34 Combo XaaS 
$nCombosXaaS=0;
while (buscarCombo(31,32,33,34)!=0)
{
  $nCombosXaaS++;
}

//  35,36,37,38 Combo Fog Computing
$nCombosFogC=0;
while (buscarCombo(35,36,37,38)!=0)
{
  $nCombosFogC++;
}
//  39,40,41,42 Combo Realidades Digitales
$nCombosRealidadesD=0;
while (buscarCombo(39,40,41,42)!=0)
{
  $nCombosRealidadesD++;
}
// 43,44,45,46 Combo Deep Learning
$nCombosDeepL=0;
while (buscarCombo(43,44,45,46)!=0)
{
  $nCombosDeepL++;
}
// 47,48,49,50 Combo Blockchain
$nCombosBlockchain=0;
while (buscarCombo(47,48,49,50)!=0)
{
  $nCombosBlockchain++;
}


$nTotalCombos=$nCombosXaaS+$nCombosFogC+$nCombosRealidadesD+$nCombosDeepL+$nCombosBlockchain;
  
  // Regla: Si se tienen más de 3 combos ningún combo puntua indivialmente
if ($nTotalCombos < 4)
{
  // 2 XaaS 
  $puntos = $puntos + (2 * $nCombosXaaS);
  // 2 Fog Computing
  $puntos = $puntos + (2 * $nCombosFogC);
  // 3 Realidades Digitales
  $puntos = $puntos + (3 * $nCombosRealidadesD);
  // 3 Deep Learning
  $puntos = $puntos + (3 * $nCombosDeepL);
  // 5 Blockchain
  $puntos = $puntos + (5 * $nCombosBlockchain);
  
  if ($nCombosXaaS>0)
  {
      $textoPremios.=(2 * $nCombosXaaS)." puntos en combos de XaaS<br/>";
  }
  if ($nCombosFogC>0)
  {
      $textoPremios.=(2 * $nCombosFogC)." puntos en combos de Fog Computing<br/>";
    
  }
  if ($nCombosRealidadesD>0)
  {
      $textoPremios.=(3 * $nCombosRealidadesD)." puntos en combos de Realidades Digitales<br/>";
  }
  if ($nCombosDeepL>0)
  {
      $textoPremios.=(3 * $nCombosDeepL)." puntos en combos de Deep Learning<br/>";
  }
  if ($nCombosBlockchain>0)
  {
      $textoPremios.=(5 * $nCombosBlockchain)." puntos en combos de Blockchain<br/>";
  }    
}
else
{
  $textoPremios.=" ningun combo puntua por tener mas de 3 combos<br/>";
}


//Oportunidades fuera de combo
//1 "Smart Grid"
$nSmartGrid = numeroOcurrenciasCarta(36);
$puntos = $puntos + $nSmartGrid;
if ($nSmartGrid>0)
{
  $textoPremios.=$nSmartGrid." puntos por tener 'Smart Grid' fuera de combo<br/>";
}    
//1 "Seguridad"
$nSeguridad = numeroOcurrenciasCarta(38);
$puntos = $puntos + $nSeguridad;
if ($nSeguridad>0)
{
  $textoPremios.=$nSeguridad." puntos por tener 'Seguridad' fuera de combo<br/>";
}    
//1 "Fintech"
$nFintech = numeroOcurrenciasCarta(48);
$puntos = $puntos + $nFintech;
if ($nFintech>0)
{
  $textoPremios.=$nFintech." puntos por tener 'Fintech' fuera de combo<br/>";
}    
//-1 Cloud Computing
$nO1_XaaS = numeroOcurrenciasCarta(32);
$puntos = $puntos - $nO1_XaaS;
if ($nO1_XaaS>0)
{
  $textoPremios.="-".$nO1_XaaS." puntos por tener 'Cloud Computing' fuera de combo<br/>";
}    


//-1 Robot-as-a-Service
$nO2_XaaS = numeroOcurrenciasCarta(33);
$puntos = $puntos - $nO2_XaaS;
if ($nO2_XaaS>0)
{
  $textoPremios.="-".$nO2_XaaS." puntos por tener 'Robot-as-a-Service' fuera de combo<br/>";
}    
//-1 Transportation-as-a-Service
$nO3_XaaS = numeroOcurrenciasCarta(34);
$puntos = $puntos - $nO3_XaaS;
if ($nO3_XaaS>0)
{
  $textoPremios.="-".$nO3_XaaS." puntos por tener 'Transportation-as-a-Service' fuera de combo<br/>";
}    
 
  
// Regla: Dos o más combos de "XaaS" +10 PID sobre la puntuación final
if ($nCombosXaaS>1)
{
  $puntos = $puntos + 10;
  $textoPremios.="10 puntos por tener 2 o mas combos XaaS<br/>";
}
// Regla: Tener los dos combos ("Realidades Digitales" y "Fog Computing") +5 PID sobre la puntuación final
if ($nCombosRealidadesD>0 && $nCombosFogC>0)
{
  $puntos = $puntos + 5;
  $textoPremios.="+15 puntos Tener los dos combos (Realidades Digitales y Fog Computing)<br/>";
}

// Regla: Cinco cartas de tecnologías diferentes vale 5 PID
$utilizadasCombos = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$nCincos=0;
while (buscarCinco(31,35,39,43,47)!=0)
{
  $nCincos++;
}  
$puntos = $puntos + (5 * $nCincos);
if ($nCincos>0)
{
   $textoPremios.=(5 * $nCincos)." puntos en grupos de 5 tecnologias<br/>";
}


if ($texto=='t')
{
  return $textoPremios;
}
  else
  {
    return $puntos;
  }
  


}


function numeroOcurrenciasCarta($carta)
{
  global $utilizadasCombos;
  global $cartas;
  $nOcurrencias=0;
  for($i = 0; $i < Count($utilizadasCombos); $i++) 
  {
    if (($utilizadasCombos[$i]==0) && ($cartas[$i]==$carta))
    {
      $nOcurrencias++;
    }
  }
  return $nOcurrencias;
}

/*

Combos:
2 XaaS 
2 Fog Computing
3 Realidades Digitales
3 Deep Learning
5 Blockchain

Oportunidades fuera de combo
1 "Smart Grid"
1 "Seguridad"
1 "Fintech"
-1 O1_XaaS
-1 O2_XaaS
-1 O3_XaaS







Cinco cartas de tecnologías diferentes vale 5 PID

*/
?>



