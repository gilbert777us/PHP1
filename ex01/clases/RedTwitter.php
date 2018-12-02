<?php

class RedTwitter
{
  // Atributos
  var $nTweet;
  var $nPersonas;
  // Constructor
  function RedTwitter ($t)
  {
    $this->nTweet =$t;
    $this->nPersonas =array();
    
    echo "RedTwitter creada correctamente";
  }
  // Metodos

  function buscarPersona($a)
  {
    return array_search($a, $this->nPersonas); 
  }

  function ponerTweet($p)
  {
    echo "Se tweetea";
  }
}
?>