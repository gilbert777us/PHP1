<?php
class Twitter{
    
    var $numTwit;
    var $perfil;
    
  function Twitter($numTwit,$perfil){
      
      $this ->numTwit =$numTwit;
    $this->perfil = $perfil;
  }
  
  function buscarPersona($perfil){
    
    echo "Buscamos por el perfil ".$perfil;
  }

    function citarPersona($perfil){
      echo "Citamos persona ".$perfil;
    }

}
?>