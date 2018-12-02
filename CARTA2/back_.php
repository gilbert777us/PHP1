<?php 

require_once('dbutils2.php');
$db = conectarDB();

if (isset($_GET["ini"]))
{
  $_POST = array();
}

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
function getNum(palo,val) {
    // PICAS
    var picas = new Array(13);
    picas[0]=5;// ap ->kd
    picas[1]=13;// 2p ->ad
    picas[2]=8;// 3p ->8t
    picas[3]=52;// 4p ->7t
    picas[4]=44;// 5p ->6t
    picas[5]=36;// 6p ->5t
    picas[6]=28;// 7p ->7d
    picas[7]=20;// 8p ->3t
    picas[8]=17;// 9p ->5d
    picas[9]=25;// 10p ->qp
    picas[10]=33;// jp ->3d
    picas[11]=26;// qp->ac
    picas[12]=49;// kp ->qd
  
  var num=0;
  if (palo==0)
  {
    num=Math.trunc(picas[val]/10);
  }
  //CORAZONES
  alert("valor0:"+valor0);
  return num;
}

function myFunction(val) {
  
  var num = getNum(palo,val);

  document.getElementById("valor0").value=Math.trunc(num/10);  
  document.getElementById("valor1").value=num%10;
  
  alert ("palo:"+palo+", valor:"+val);
 // document.getElementById("myForm").submit();
  

}

function displayNextImage() {
    x = (x === images.length - 1) ? 0 : x + 1;
    document.getElementById("img").src = images[x];
    palo=x;
    //alert ("palo:"+palo);
}

function startTimer() {
    setInterval(displayNextImage, 3000);
}

var images = [], x = -1;
images[0] = "cards/brb11.png";
images[1] = "cards/brb12.png";
images[2] = "cards/brb13.png";
images[3] = "cards/brb14.png";
var palo=0;
  
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
  
<body onload = "startTimer()">
  <form method="post" id="myForm" action="from_.php">
    <input type="hidden" id="valor0" name="valor0" value="<?php if (isset($_POST["valor0"])) echo $_POST['valor0']?>"/>
    <input type="hidden" id="valor1" name="valor1" value="<?php if (isset($_POST["valor1"])) echo $_POST['valor1']?>"/>
    <input type="hidden" id="estado" name="estado" value="<?php if (isset($_POST["estado"])) echo $_POST['estado']?>"/>
<img width="707" id="img" height="1013"  src="cards/brb.png" usemap="#myMap">
<map name="myMap">
  <area shape="rect" coords="270,0,413,175" onclick="myFunction(0)" >

  <area shape="rect" coords="181,185,297,401" onclick="myFunction(1)" >
  <area shape="rect" coords="297,185,414,401" onclick="myFunction(2)" >
  <area shape="rect" coords="414,185,531,401" onclick="myFunction(3)" >

  <area shape="rect" coords="181,401,297,622" onclick="myFunction(4)" >
  <area shape="rect" coords="297,401,414,622" onclick="myFunction(5)" >
  <area shape="rect" coords="414,401,513,622" onclick="myFunction(6)" >

   <area shape="rect" coords="181,622,297,843" onclick="myFunction(7)" >
   <area shape="rect" coords="297,622,414,843" onclick="myFunction(8)" >
   <area shape="rect" coords="414,622,513,843" onclick="myFunction(9)" >
</map> 
  </form>
  

  
</body>
</html>