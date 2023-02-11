<?php
    function canton($idcanton) {
        $canton[] = array();
        switch ($idcanton){
			//Cantones Chimborazo
			case 112:	$canton = "muestras_alausi";	
						break;
			case 115: 	$canton = "muestras_chambo";	
						break;
			case 116:	$canton = "muestras_chunchi";	
						break;
			case 113:	$canton = "muestras_colta";	
						break;
			case 114:	$canton = "muestras_cumanda";	
						break;
			case 117:	$canton = "muestras_guamote";	
						break;
			case 118: 	$canton = "muestras_guano";
						break;
			case 119:	$canton = "muestras_pallatanga";	
						break;
			case 120:	$canton = "muestras_penipe";	
						break;
			case 111:	$canton = "muestras_riobamba";
						break;
			//cantones cotopaxi
			case 121:	$canton = "muestras_latacunga";
						break;
			case 122:	$canton = "muestras_lamana";
						break;
			case 123:	$canton = "muestras_pangua";
						break;
			case 124:	$canton = "muestras_pujili";
						break;
			case 125:	$canton = "muestras_salcedo";
						break;
			case 126:	$canton = "muestras_saquisili";
						break;
			case 127:	$canton = "muestras_sigchos";
						break;	
			//cantones Tungurahua
			case 128:	$canton = "muestras_baños";
						break;
			case 129:	$canton = "muestras_cevallos";
						break;
			case 130:	$canton = "muestras_mocha";
						break;
			case 131:	$canton = "muestras_patate";
						break;			
			case 132:	$canton = "muestras_quero";
						break;
			case 133:	$canton = "muestras_pelileo";
						break;
			case 134:	$canton = "muestras_pillaro";
						break;
			case 135:	$canton = "muestras_tisaleo";
						break;
			case 140:	$canton = "muestras_ambato";
						break;	
			//cantones Pastaza
			case 136:	$canton = "muestras_puyo";
						break;
			case 137:	$canton = "muestras_arajuno";
						break;
			case 138:	$canton = "muestras_mera";
						break;
			case 139:	$canton = "muestras_santaclara";
						break;
			//cantones Morona Santiago
			case 141:	$canton = "muestras_palora";
			break;
		}
		return $canton;
    }
?>
