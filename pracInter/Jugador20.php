<?php


require_once("iJugador.php");



class Jugador20 implements iJugador {

    var $j20_Alumno;
    var $j20_Guerra;
    var $j20_Icono;

    var $j20_Apuestas = array();

    function Jugador20() {

        $this->j20_Alumno = "Pablo Zafra";
        $this->j20_Guerra = "Raplhi";
        $this->j20_Icono = "https://pbs.twimg.com/profile_images/25964132/ralph_nose.gif";

    }


    public function setNombreAlumno($nAlumno)
    {
        $this->j20_Alumno = $nAlumno;
    }

    public function getNombreAlumno()
    {
        return $this->j20_Alumno;
    }

    public function setNombreGuerra($nGuerra)
    {
        $this->j20_Guerra = $nGuerra;
    }

    public function getNombreGuerra()
    {
        return $this->j20_Guerra;
    }

    public function setIcono($ruta_icono)
    {
        $this->j20_Icono = $ruta_icono;
    }

    public function getIcono()
    {
        return $this->j20_Icono;
    }

    public function jugar($numeroAciertosAnterior)
    {
        return $this->numero();
    }

    private function esNumeroValido($numero) {

        if(strlen($numero) == 4) { // 4 digitos
            if (preg_match('/^[0-1]*$/', $numero)) { // solo contiene 0 o 1
                return true;
            }
        }
        return false;

    }

    private function numero() {

        foreach($_SESSION as $clave => $valor) {


            $valor = str_replace(' ', '-', $valor);
            $valor = preg_replace('/[a-zA-Z]/', '', $valor);

            //$valor = limpiar($valor);
            if(strlen($valor) == 4) { // 4 dígitos
                if($this->esNumeroValido($valor)) return $valor; // los 4 cumplen el criterio 1-0
            }
            
        }

        return "0000"; // No hay valor válido en sesión

    }

    function limpiar($string) {
        $string = str_replace(' ', '-', $string); // quitar espacios y letras
        return preg_replace('/[a-zA-Z]/', '', $string); // devovler solo números
        //return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // quitar caracteres especiales.
    }

}

?>