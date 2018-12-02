<?php

print "\ncon fgets (de linea en linea) con feof(todas hasta final de fichero) :\n";
$myfile = fopen("webtxt.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}
fclose($myfile);

?>