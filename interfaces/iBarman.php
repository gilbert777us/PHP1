<?php
echo 'interface iBarman <br/> 
  {<br/>
  &nbsp;&nbsp;&nbsp;&nbsp;public function setNombre($nombre); <br/> 
  &nbsp;&nbsp;&nbsp;&nbsp;public function getNombre();<br/><br/>
  
  &nbsp;&nbsp;&nbsp;&nbsp;public function setBar($bar); // devuelve el nombre del bar en el que trabaja. <br/>
  &nbsp;&nbsp;&nbsp;&nbsp;public function getBar();<br/><br/>
  
 &nbsp;&nbsp;&nbsp;&nbsp;public function servirCoctel($nombreCoctel); // devuelve la formula aprendida del coctel, si el barman no conoce el coctel pedido dara una excepcion informandolo.<br/><br/>
  
  &nbsp;&nbsp;&nbsp;&nbsp;public function aprenderCoctel($nombreCoctel,$formulaCoctel);<br/><br/>
  
  &nbsp;&nbsp;&nbsp;&nbsp;public function getAllCoctels(); // devuelve todos los cocteles que sabe el barman.<br/>
  }';

?>