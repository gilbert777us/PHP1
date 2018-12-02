<?php
$foo = new StdClass();
$foo->hello = "world";
$foo->bar = "baz";

$json = json_encode($foo);
//echo $json;
//=> {"hello":"world","bar":"baz"}
$st = json_decode($json);
//print_r($st);

//echo $st->hello;

// stdClass Object
// (
//   [hello] => world
//   [bar] => baz
// )
$json = '
{
    "type": "donut",
    "name": "Cake"
}';

$yummy = json_decode($json);

echo $yummy->type; //donut

?>