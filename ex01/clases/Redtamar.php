<?php

class Redtamar
{
  // Atributos
  var $nAlumnos;
  var $nProfesores;
  var $nCitas;
  var $aRRSS;
  // Constructor
  function Redtamar ()
  {
    $this->nAlumnos = array();
    $this->nProfesores= array();
    $this->nCitas= array();
    $this->aRRSS= array();
    echo "Red Redtamar creada correctamente";
  }
  // Metodos

  function buscarAlumno($a)
  {
    return array_search($a, $this->nAlumnos); 
  }

  function buscarProfesor($p)
  {
    return array_search($p, $this->nProfesores); 
  }

  function citarPersona($p,$a)
  {
    $this->nCitas[$p] = $a;
  }
}
?>