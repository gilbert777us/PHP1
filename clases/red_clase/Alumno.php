<?php

class Alumno
{
    var $DNI;
  var  $nombre;
  var $idAlumno;
  
  function Alumno ($Dni, $n,$idAlumn){
    $this->DNI=$Dni;
    $this->nombre=$n;
    $this->idAlumno=$idAlumn;
  }
  
  //M
  function citarPersona($nombre1){
    
    echo "se cita la persona".$nombre1."con".$this->nombre;
    
  }
  
  function buscarPersona($DNI){
    
    echo "Se busca la persona".$DNI;
  }
        
  }

