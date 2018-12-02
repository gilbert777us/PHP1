<?php
require_once('Barman.php');
try {
  $string = file_get_contents("barmans.json");
  $json_a = json_decode($string);
  //print_r($json_a);
  
  foreach ($json_a as $n_barman => $g_barman) {
    $barman1 = new Barman($n_barman,$g_barman->bar);
    foreach ($g_barman->cocteles as $nc => $fc) {
      $barman1->aprenderCoctel($nc,$fc);
    }
    print_r($barman1);
  
}

  
// Prueba Excepcion
$barman1->aprenderCoctel("siberiano","H2O+GIN+3HIELOS");
$barman1->aprenderCoctel("makula","MALIBU+WIKI+GRANADINA+2HIELOS");
echo $barman1->servirCoctel ("siberianos");

}

//catch exception
catch(Exception $e) {
  echo 'Se ha producido una EXCEPCION: ' .$e->getMessage();
}

//var_dump ($barman1->getAllCoctels());
?>
