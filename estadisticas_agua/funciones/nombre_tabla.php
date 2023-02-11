<?php

     function canton($idcanton) {
         $canton[] = array();
        switch ($idcanton){
			case 100:	$canton = "muestras_alausi";	
						break;
			case 101: 	$canton = "muestras_chambo";	
						break;
			case 102:	$canton = "muestras_chunchi";	
						break;
			case 103:	$canton = "muestras_colta";	
						break;
			case 104:	$canton = "muestras_cumanda";	
						break;
			case 105:	$canton = "muestras_guamote";	
						break;
			case 106: 	$canton = "muestras_guano";
						break;
			case 107:	$canton = "muestras_pallatanga";	
						break;
			case 108:	$canton = "muestras_penipe";	
						break;
			case 109:	$canton = "muestras_riobamba";
						break;
		}
                return $canton;
    }

?>
