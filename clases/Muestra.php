<?php
include_once ("../conexion/Conexion.php");
include_once "nombre_canton.php";
include_once "nombre_provincia.php";
class Muestra
{
	private $muestras;
        
	public function __contruct()
	{
		$this->muestras = array();
	}
	/*insertar datos de la muestra*/
	public function registrar_muestra($codcanton,$codsistema,$numero,$departamento,$fuente,
                                         $recolector,$fecha,$fecha_analisis,$hora,$hora_analisis,
                                         $color,$turbiedad,$olor,$dureza,$cloroLibre,$fluoruros,$manganeso,
                                         $nitratos,$nitritos,$coliformes_fecales,$coliformes_ufc,
                                         $ph,$temperatura,$solidos_totales,$conductividad,
                                         $fosfatos,$hierro,$sulfatos,$amoniaco,$coliformes_totales,
                                         $observacion)
	{
		switch ($codcanton){
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
			//cantones Puyo
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
                $sql[] = array();
                unset($sql);
		$sql = "insert into $canton(codsistema,numero,departamento,fuente,recolector,
                       fecha,fecha_analisis,hora,hora_analisis,
                       color,turbiedad,olor,dureza,cloro_libre,fluoruros,manganeso,
                       nitratos,nitritos,coliformes_fecales,coliformes_ufc,ph,temperatura,solidos_totales,
                       conductividad,fosfatos,hierro,sulfatos,amoniaco,
                       coliformes_totales,observacion) 
		       values($codsistema,'$numero','$departamento','$fuente','$recolector',
                          '$fecha','$fecha_analisis','$hora','$hora_analisis',
                          '$color','$turbiedad','$olor','$dureza','$cloroLibre',
                          '$fluoruros','$manganeso','$nitratos','$nitritos',
                          '$coliformes_fecales','$coliformes_ufc','$ph','$temperatura','$solidos_totales',
                          '$conductividad','$fosfatos','$hierro','$sulfatos','$amoniaco',
                          '$coliformes_totales','".$observacion."')";
		$mysqli = Conexion::con();
		$resp = $mysqli->query($sql) or die("Error al ingresar").$mysqli->connect_errno();
        if ($resp){
            echo "<script type='text/javascript'>
                    alert('LA FICHA HA SIDO REGISTRADA...!!!!');
                    window.location='registrar_muestra.php';
                </script>";
        }else{
            echo "<script type='text/javascript'>
                    alert('ERROR AL REGISTRAR LA FICHA...????');
                    window.location='registrar_muestra.php';
                  </script>";
        }	
		$resp->free();
		$mysqli->close();		
	}	
	/*Obtener datos de la muestra por sistema y canton...*/
	public function muestras_by_sistema($idsistema,$idcanton)
	{
		$canton = "";
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
			//cantones Puyo
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
		$sql[] = array();
		unset($sql);
		$sql = "select codmuestra,numero, fecha, hora from $canton 
				where codsistema='$idsistema' order by fecha desc";
		$mysqli=Conexion::con();
		$res=$mysqli->query($sql);
		$mysqli->close();
		while ($reg=$res->fetch_assoc())
		{
			$this->muestras[]=$reg;
		}
		$res->free();
		return $this->muestras;			
	}
	
	/*Obtener muetras por codigo de muestra y segun su canton....*/	
	public function muestra_id($cod,$codcanton)
	{
	    $sql[] = array();
	    unset($sql);
		$mysqli=Conexion::con();
			$query2 = "SELECT provincias.nombreprovincia FROM provincias 
			JOIN cantones ON provincias.codprovincia = cantones.codprovincia 
			WHERE cantones.codcanton = '" . $codcanton . "'";
			$result2 = mysqli_query($mysqli, $query2);
			if ($result2) {
			while ($row = mysqli_fetch_assoc($result2)) {
				$nombrprovi = $row['nombreprovincia'];
			}
			}
		$sql = "select *
                        from muestras_".$nombrprovi."
                        inner join sistemas
                        on muestras_".$nombrprovi.".codsistema=sistemas.codsistema
                        inner join parroquias
                        on sistemas.codparroquia=parroquias.codparroquia
                        inner join cantones
                        on parroquias.codcanton=cantones.codcanton
						inner join provincias
						on cantones.codprovincia=provincias.codprovincia
						where codmuestra='$cod'";
		$mysqli=Conexion::con();
		$consulta = $mysqli->query($sql);
		$mysqli->close();
		while ($reg = $consulta->fetch_assoc())
		{
			$this->muestras[]=$reg;
		}
		$consulta->free();
		return $this->muestras;			
	}
	/*Actualizar datos de la muestra ......*/
	public function actualizar_muestra($codcanton,$codmuestra,$departamento,$fuente,$recolector,
                    $color,$turbiedad,$olor,$dureza,$cloroLibre,$fluoruros,$manganeso,$nitratos,$nitritos,
                    $coliformes_fecales,$coliformes_ufc,$ph,$temperatura,$solidos_totales,$conductividad,$fosfatos,$hierro,
	    $sulfatos,$amoniaco,$coliformes_totales,$observacion) {
	   $mysqli=Conexion::con(); 
	   $canton = canton($codcanton);    
	   $sql[] = array();
	   unset($sql);
	   $sql = "update $canton set departamento='".$departamento."',fuente='".$fuente."', 
               recolector='".$recolector."',color='$color', turbiedad='$turbiedad', 
               olor='$olor',dureza='$dureza',cloro_libre='$cloroLibre',fluoruros='$fluoruros',
               manganeso='$manganeso',nitratos='$nitratos', nitritos='$nitritos', 
               coliformes_fecales='$coliformes_fecales', coliformes_ufc='$coliformes_ufc',
               ph='$ph', temperatura='$temperatura', solidos_totales='$solidos_totales',
               conductividad='$conductividad', fosfatos='$fosfatos',hierro='$hierro',sulfatos='$sulfatos',
               amoniaco='$amoniaco',coliformes_totales='$coliformes_totales',observacion='$observacion'
               where codmuestra=$codmuestra";
	   $resp = $mysqli->query($sql) or die("ERROR EN LA ACTUALIZACION DE DATOS...".mysql_error());
       if ($resp){
           echo "<script type='text/javascript'>
                    alert('LA FICHA HA SIDO CAMBIADA...!!!!'); window.location='busqueda.php'; 
                 </script>";
       }else{
           echo "<script type='text/javascript'> alert('ERROR LA CAMBIAR DATOS DE LA FICHA...????'); window.location='busqueda.php';
                </script>";
       }
       $mysqli->close();
       $resp->free();   
	}
}

?>