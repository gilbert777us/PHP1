<?php

// ver la estructura json: https://www.w3schools.com/js/js_json_datatypes.asp
// validar y formatear json: https://jsonlint.com/

// Leer un fichero json
$string = file_get_contents("test.json");
$json_a = json_decode($string, true);

//var_dump($json_a);
print_r($json_a);

 //echo 'po:'.$json_a['Jennifer']['status'];

foreach ($json_a as $person_name => $person_a) {
    echo $person_a['status'];
}

// Convertir un objeto PHP en json (ver tambien Casino.php)

class PPP
{
// Atributos
var $name;
var $age;
var $city;
}

$myObj= new PPP();

$myObj->name = "John";
$myObj->age = 30;
$myObj->city = "New York";

$myJSON = json_encode($myObj);

echo 'objeto json:'.$myJSON;


$myJSON2 = json_decode($myJSON, true);
print_r($myJSON2);

echo ('la edad del dos es:'.$myJSON2->age);

// Convertir un array PHP en json

$myArr = array("John", "Mary", "Peter", "Sally");

$myJSON = json_encode($myArr);

echo 'array json:'.$myJSON;



?>