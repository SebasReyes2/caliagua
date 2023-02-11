<?php
     function provincia($idprovincia) {
        $provincia[] = array();
        switch ($idprovincia){
            //Provincias
			case 1:	$provincia = "Chimborazo";	
						break;
			case 2: $provincia = "Cotopaxi";	
						break;
			case 3:	$provincia = "Tungurahua";	
						break;
			case 4:	$provincia = "Pastaza";	
						break;
			case 5:	$provincia = "Morona Santiago";
			break;
        }
        return $provincia;
    }

?>
