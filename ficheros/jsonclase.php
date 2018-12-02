<?php
$string = file_get_contents("panes.json");
$json_a = json_decode($string, true);

//print_r ($json_a);

foreach ($json_a as $tipo => $array_pan) {
    //echo ' Del tipo '.$tipo.' hay '. $array_pan['cantidad'];
    for ($i=0;$i<$array_pan['cantidad'] ;$i++ )
    {
      //$localEDUs.addPan(new Pan ($tipo));
      echo ' mete un pan de tipo '.$tipo;
    }
}



//var_dump($json_a);
//print_r($json_a);
?>