<?php
interface iBarman { 
  public function setNombre($nombre);  
  public function getNombre();
  
  public function setBar($bar); 
  public function getBar();// devuelve el nombre del bar en el que trabaja.
  
  public function servirCoctel($nombreCoctel); // devuelve la fórmula aprendida del coctel, si el barman no conoce el coctel pedido dará una excepción informándolo.
  
  public function aprenderCoctel($nombreCoctel,$formulaCoctel); // el barman aprende la fórmula de un coctel.
  
  public function getAllCoctels(); // devuelve todos los cócteles que sabe el barman.
}
?>