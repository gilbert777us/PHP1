<?php
require_once('J04_Jugador.php');

$miJugador4 = new J04_Jugador();
print ('<br/>nombre guerra: '.$miJugador4->getNombreGuerra());
print ('<br/>nombre alumno: '.$miJugador4->getNombreAlumno());
print ('<br/>icono: '.$miJugador4->getIcono());

// JUGAR


print ('<br/>Mi primera jugada es: '.$miJugador4->jugar(-1));

print ('<br/>Mi jugada con 0 aciertos anteriores es: '.$miJugador4->jugar(0));

print ('<br/>Mi jugada con 1 acierto anterior es: '.$miJugador4->jugar(1));

print ('<br/>Mi jugada con 2 aciertos anteriores es: '.$miJugador4->jugar(2));

print ('<br/>Mi jugada con 3 aciertos anteriores es: '.$miJugador4->jugar(3));



?>