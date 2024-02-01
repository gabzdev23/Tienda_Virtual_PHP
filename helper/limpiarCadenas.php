<?php
    
    function escaparCadena($cadena) {
        $cadena = escapeshellcmd($cadena);
        $buscar = array('^', 'delete', 'drop', 'truncate', 'exec', 'system');
        $remplazar = array('-', 'de*le*te', 'dr*p', 'tru*ncat*e', 'e*x*ec', 's*ys*te*m');

        $cadena = str_replace($buscar, $remplazar, $cadena);
        return trim($cadena);
    }