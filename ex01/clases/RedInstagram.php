<?php

class RedInstagram
{
  // Atributos
  var $nFotos;
  var $nPersonas;
  // Constructor
  function RedInstagram ($f)
  {
    $this->nFotos =$f;
    $this->nPersonas =array();
    
    echo "RedInstagram creada correctamente";
  }
  // Metodos

  function buscarPersona($a)
  {
    return array_search($a, $this->nPersonas); 
  }

  function subirImagen($i)
  {
    echo "Se sube la imagen";
  }
}
?>