<?php
interface iBarman 
{
  public function setNombre($nombre); 
  public function getNombre();

  public function setBar($bar); // devuelve el nombre del bar en el que trabaja. 
  public function getBar();

  public function servirCoctel($nombreCoctel); // devuelve la formula aprendida del coctel, si el barman no conoce el coctel pedido dara una excepcion informandolo.

  public function aprenderCoctel($nombreCoctel,$formulaCoctel);

  public function getAllCoctels(); // devuelve todos los cocteles que sabe el barman.
}

class Mesa implements iBarman
{
	  public function setNombre($nombre){} 
  public function getNombre(){} 

  public function setBar($bar){}  // devuelve el nombre del bar en el que trabaja. 
  public function getBar(){} 

  public function servirCoctel($nombreCoctel){}  // devuelve la formula aprendida del coctel, si el barman no conoce el coctel pedido dara una excepcion informandolo.

  public function aprenderCoctel($nombreCoctel,$formulaCoctel){} 

  public function getAllCoctels(){}  // devuelve todos los cocteles que sabe el barman.

}
?>