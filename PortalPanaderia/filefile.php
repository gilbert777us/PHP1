<?php
print "con fread (lee todo el fichero):\n";
$myfile = fopen("data/pandata.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("data/pandata.txt"));
fclose($myfile);


print "\ncon fgets (de linea en linea):\n";
$myfile = fopen("data/pandata.txt", "r") or die("Unable to open file!");
echo fgets($myfile);
fclose($myfile);

print "\ncon fgets (de linea en linea) con feof(todas hasta final de fichero) :\n";
$myfile = fopen("data/pandata.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}
fclose($myfile);

print "\ncon fgetc (caracter a caracter) con feof(todas hasta final de fichero) :\n";
$myfile = fopen("data/pandata.txt", "r") or die("Unable to open file!");
// Output one character until end-of-file
while(!feof($myfile)) {
  echo fgetc($myfile);
}
fclose($myfile);



?>