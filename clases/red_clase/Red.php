<?php

class Red
{
  var  $nombre;
  var $nif;
  
  function Red ($n,$ni){
    $this->nombre=$n;
    $this->nif=$ni;
  }
  
  //M
  function citarPersona($nombre1,$nombre2){
    
    echo "se cita la persona".$nombre1."con".$nombre2;
    
  }
  
  function loginAlumno($nombre){
    
    echo "Se loga el alumno".$nombre;
  }
  
  
    
      
  }

