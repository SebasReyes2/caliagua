<?php
function es_palabra($cadena)
{
    $expresion = '^{a-zñáéíóúüA-ZÑÁÉÍÓÚÜ}+$';
    return ereg($expresion, $cadena);
}

function es_entero($cadena) {
    $expresion = '^(\+|-)?([[:digit:]]+)$';
    if (ereg($expresion, $cadena, $coincidencias))
    {
        if(substr($coincidencias[2],0,1) == 0 && strlen($coincidencias[2] != 1))
            return false;
        else 
            return true;
    }
    else 
        return false;
    
}

function es_real($cadena) {
    $formato = '^(\+|-)?([[:digit:]]+)\.[[:digit]]+)$';
    if(ereg($formato, $cadena, $coincidencias))
    {
        if(substr($coincidencias[2],0,1) == 0 &&
                strlen($coincidencias[2]) != 1)
            return FALSE;
        else           
            return TRUE;
    }
    else        
        return FALSE;
    
}

function es_entero_real($cadena) {
    return (es_entero($cadena) || es_real($cadena));
    
}

function es_bisiesto($anio)
{
	if (($anio % 4 == 0 && $anio % 100 != 0) || $anio % 400 == 0)
			return true;
	else
			return false;
}

function bisiesto($anio) {
    return (($anio % 4 == 0 && $anio % 100 != 0) ||
            $anio % 400 == 0);
}

function es_fecha($cadena) {
    $expresion = '^([[:digit:]]{1,2})/([[:digit:]]{1,2})/([[:digit:]]{4})$';
    if (ereg($expresion, $cadena,$concidencias))
    {
        if ($concidencias[2] < 1 || $concidencias[2] > 12)
            return false;
        if(($concidencias[1] < 1 || $concidencias[1] > 31) ||
           ($concidencias[2] == 4 && $concidencias[1] > 30) ||
           ($concidencias[2] == 6 && $concidencias[1] > 30) ||
           ($concidencias[2] == 9 && $concidencias[1] > 30) ||
           ($concidencias[2] == 11 && $concidencias[1] > 30) ||
           ($concidencias[2] == 2 && bisiesto($concidencias[3])
           && $concidencias[1] > 29) ||
           ($concidencias[2] == 2 && !bisiesto($concidencias[3])
           && $concidencias[1] > 28))
       return false;
   return true;
            
    }
    else        
        return false;
}

?>
