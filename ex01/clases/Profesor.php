<?php

class Profesor
{
// Atributos
var $nNombre;
var $dni;
var $nAsignaturas;
// Constructor
function Profesor ($n,$d,$na)
{
  $this->nNombre= $n;
  $this->dni= $d;
  $this->nAsignaturas=$na;
  echo "Profesor creado correctamente.";
}
// Metodos

 function buscarAlumno($a,$redtamar)
{
  return $redtamar->buscarAlumno($a); 
}

function buscarProfesor($p,$redtamar)
{
  return $redtamar->buscarProfesor($p); 
}

function citarPersona($p,$a)
{
  $redtamar->citarPersona($p,$a); 
}
}
?>