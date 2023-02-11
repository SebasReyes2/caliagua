<?php
//error_reporting(E_ALL ^ E_NOTICE);
include_once ("../conexion/Conexion.php");
class Sistema{	
	private $listasistema;	
	public function __construct()
	{
	    $this->listasistema = array();
	}
	public function dar_sistemas()
	{
	    $sql[] = array();
	    unset($sql);
	    $mysqli=Conexion::con();
		$sql="select * from sistemas";		
		$res=$mysqli->query($sql);
		$mysqli->close();
		while ($reg=$res->fetch_assoc())
		{
			$this->listasistema[]=$reg;
		}
		$res->free();
		return $this->listasistema;
	}
	/*nombre del sistema por id*/
	public function nombre_by_id($id)
	{
	    $mysqli=Conexion::con();
	    $sql[] = array();
	    unset($sql);
		$sql = "select nombresistema from sistemas where codsistema='$id'";
		$datos = $mysqli->query($sql);
		$mysqli->close();
		while($dat = $datos->fetch_assoc()){
			$this->listasistema[]=$dat;
		}
		$datos->free();
		return $this->listasistema;
	}
	
	/*datos tecnicos de un sistema especifico por codigo */
	public function datostecnicos_by_id($codigo)
	{
	    $mysqli=Conexion::con();
	    $query[] = array();
	    unset($query);
		$query = "select codigo,captacion,distancia,mag_distancia,diametro,
                            mag_diametro,tanque_rompepreciones,valvulas_aire,
                            capacidad,long_redistribucion,diametro_tuberia,
                            mag_diametro_tuberia,rompe_presiones,
                            num_conexiones,con_medidor,sin_medidor,poblacion,
							caforado,faforo,eaforo,cautorizado,fconstruccion,jlegalizada,tarifareal,
							jfiscalizada,sdesinfeccion,valvulas_purga,comentarios,tuberia2,tuberia3,
							diametro_tuberia2,diametro_tuberia3,nombresistema
                            from tecnicossistemas
                            inner join sistemas
                            on tecnicossistemas.codsistema = sistemas.codsistema
                            where sistemas.codsistema = $codigo";
		$res=$mysqli->query($query);
		$mysqli->close();		
		while ($reg=$res->fetch_assoc())
		{
			$this->listasistema[]=$reg;
		}
		$res->free();
		return $this->listasistema;
	}
	
    //dar sistemas por id
    public function sistemas_id($id)
	{
        $mysqli=Conexion::con();
        $sql[] = array();
        unset($sql);
		$sql="select codsistema,nombresistema,nombrebarrio,
                    nombreparroquia,nombrecanton,tiposistema from sistemas
                    inner join barrios
                    on sistemas.codbarrio=barrios.codbarrio
                    inner join parroquias
                    on barrios.codparroquia=parroquias.codparroquia
                    inner join cantones
                    on parroquias.codcanton=cantones.codcanton 
                    where codsistema='".$id."'";
		$res=$mysqli->query($sql);
		$mysqli->close();
		while ($reg=$res->fetch_assoc())
		{
			$this->listasistema[]=$reg;
		}
		$res->free();
		return $this->listasistema;
	}	
	/*DATOS TECNICOS POR CODIGO */
	public function detallestecnicos_by_id($codsistema)
	{
	    $mysqli=Conexion::con();
	    $sql[] = array();
	    unset($sql);
	    $sql = "select codigo,captacion,latitud,longitud,altitud,caforado,faforo,eaforo,cautorizado,
            fconstruccion,jlegalizada,jfiscalizada,tarifareal,tconstruccion,sdesinfeccion,pqutilizados,
			proveedores,tuberia1,tuberia2,tuberia3,magnitud_tuberia,distancia,mag_distancia,rompepresion,valvulas_aire,
			valvulas_purga,numtanques,estado,uso,capacidad,longitudred,diametro1,diametro2,diametro3,magnitud_diametro,
			re_rompepresion,numconex,conmedidor,sinmedidor,poblacion,comentarios,nombresistema
                    from tecnicossistemas
					inner join sistemas
                    on tecnicossistemas.codsistema = sistemas.codsistema
                    where tecnicossistemas.codsistema='$codsistema'";
	    $res=$mysqli->query($sql);
		$mysqli->close();
		while ($reg=$res->fetch_assoc())
		{
			$this->listasistema[]=$reg;
		}
		$res->free();
		return $this->listasistema;
	}
    //INSERTAR DATOS BASICOS DEL SISTEMA EN LA BASE DE DATOS.....
	public function insertar ($codbarrio,$nombresistema,$tipo)
	{
	    $mysqli=Conexion::con();
	    $sql[] = array();
	    unset($sql);
	    $sql = "insert into sistemas values(null,'$codbarrio','".$nombresistema."','$tipo')";
		$resp = $mysqli->query($sql);
		if($resp){
		    echo "<script type='text/javascript'> alert('EL SISTEMA SE REGISTRÓ CON ÉXITO...!!!!'); window.location='registrar_sistema.php';
          		 </script>";
		}
		$resp->free();	
		$mysqli->close();
	}
	/*----CAMBIAR DATOS BASICOS DEL SISTEMA----*/
	public function actualizar_basicos($nombre,$tipo,$cod)
	{
	    $mysqli=Conexion::con();
	    $sql[] = array();
	    unset($sql);
		$sql = "update sistemas set nombresistema='".$nombre."', tiposistema='".$tipo."' where codsistema='$cod'";
		$res = $mysqli->query($sql);
		if($res){
		    header("Location: buscar_sistema.php?msg=2");
		}
		$res->free();
		$mysqli->close();
	}
	/*----CAMBIAR DATOS TECNICOS DE UN SISTEMA-----*/
	public function actualizar_tecnicos($distancia,$diametro,$tanqueRompepreciones,
	    $valvulasAire,$capacidad,$longRedistribucion,$diametroTuberia,
	    $rompePresiones,$numConexiones,$conMedidor,$sinMedidor,$poblacion,
	    $cAforado,$cAutorizado,$tarifaReal,$valvulasPurga,$comeNtarios,
	    $Tuberia2,$Tuberia3,$diametroTuberia2,$diametroTuberia3,$Latitud,$Longitud,$Altitud, 
	    $Tconstruccion,$Pqutilizados,$Proveedores,$Numtanques,
	    $codigo)
	    {
	       $mysqli=Conexion::con();
	       $sql[] = array();
	       unset($sql);
	       $sql = "update tecnicossistemas set
                distancia='$distancia',diametro='$diametro',tanque_rompepreciones='$tanqueRompepreciones',
                valvulas_aire='$valvulasAire',capacidad='$capacidad',long_redistribucion='$longRedistribucion',
                diametro_tuberia='$diametroTuberia',rompe_presiones='$rompePresiones',    											           		   					num_conexiones='$numConexiones',con_medidor='$conMedidor',  
                sin_medidor='$sinMedidor',poblacion='$poblacion',
				caforado='$cAforado',cautorizado='$cAutorizado',tarifareal='$tarifaReal',
				valvulas_purga='$valvulasPurga',comentarios='$comeNtarios,tuberia2='$Tuberia2',
				tuberia3='$Tuberia3',diametro_tuberia2='$diametroTuberia2',diametro_tuberia3='$diametroTuberia3'
                where  codigo='$codigo'";					
	       $consulta = $mysqli->query($sql) or die("Error de consulta");
	       $consulta->free();
	       $mysqli->close();
	       echo "<script type='text/javascript'> alert('SE HA MODIFICADO CON EXITO EL REGISTRO'); window.location='buscar_sistema.php';
		   </script>";
	}
    public function update_tecnicos(
        $latitud,$longitud,$altitud,$caforado,$cautorizado,$tarifareal,$tconstruccion,$proveedores,$tuberia1,
        $tuberia2,$tuberia3,$distancia,$rompepresion,$valvulas_aire,$valvulas_purga,$numtanques,$capacidad,
		$longitudred,$diametro1,$diametro2,$diametro3,$re_rompepresion,$numconex,$conmedidor,$sinmedidor,$poblacion,
		$comentarios,$codigo) {
		$mysqli=Conexion::con();
        $sql[] = array();
        unset($sql);
        $sql = "update tecnicossistemas set  
            latitud='$latitud',longitud='$longitud',altitud='$altitud',caforado='$caforado',
            cautorizado='$cautorizado',tarifareal='$tarifareal',tconstruccion='$tconstruccion',proveedores='$proveedores',
			tuberia1='$tuberia1',tuberia2='$tuberia2',tuberia3='$tuberia3',
			distancia='$distancia',rompepresion='$rompepresion',valvulas_aire='$valvulas_aire',
			valvulas_purga='$valvulas_purga',
			numtanques='$numtanques',capacidad='$capacidad',
			longitudred='$longitudred',diametro1='$diametro1',diametro2='$diametro2',diametro3='$diametro3',
			re_rompepresion='$re_rompepresion',numconex='$numconex',conmedidor='$conmedidor',
			sinmedidor='$sinmedidor',poblacion='$poblacion',comentarios='$comentarios'
			where  codigo='$codigo';";					
        $consulta = $mysqli->query($sql) or die("Error de consulta");
        $consulta->free();
        $mysqli->close();
        echo "<script type='text/javascript'> alert('SE HA MODIFICADO CON EXITO EL REGISTRO'); window.location='buscar_sistema.php';
            </script>";
    }
    //INSERTAR DATOS TECNICOS DEL SISTEMA EN LA BASE DE DATOS.....
	public function insertar_detalles ($codsistema,$captacion,$latitud,$longitud,$altitud,$caforado,$faforo,$eaforo,$cautorizado,
		$fconstruccion,$jlegalizada,$jfiscalizada,$tarifareal,$tconstruccion,$sdesinfeccion,$pqutilizados,
		$proveedores,$tuberia1,$tuberia2,$tuberia3,$magnitud_tuberia,$distancia,$mag_distancia,$rompepresion,$valvulas_aire,
		$valvulas_purga,$numtanques,$estado,$uso,$capacidad,$longitudred,$diametro1,$diametro2,$diametro3,$magnitud_diametro,
	    $re_rompepresion,$numconex,$conmedidor,$sinmedidor,$poblacion,$comentarios) {
	    $mysqli=Conexion::con();
	    $sql[] = array();
	    unset($sql);
		$sql = "insert into tecnicossistemas values(null,'$codsistema','$captacion','$latitud','$longitud',
            $altitud','$caforado','$faforo','$eaforo','$cautorizado','$fconstruccion',
			'$jlegalizada','$jfiscalizada','$tarifareal','$tconstruccion','$sdesinfeccion',
			'$pqutilizados','$proveedores','$tuberia1','$tuberia2','$tuberia3','$magnitud_tuberia',
			'$distancia','$mag_distancia','$rompepresion','$valvulas_aire',
			'$valvulas_purga','$numtanques','$estado','$uso','$capacidad','$longitudred',
			'$diametro1','$diametro2','$diametro3','$magnitud_diametro','$re_rompepresion',
			'$numconex','$conmedidor','$sinmedidor','$poblacion','$comentarios')";				
		$res=$mysqli->query($sql) or die(mysql_error());
		$res->free();
		$mysqli->close();
		echo "<script type='text/javascript'>  alert('DATOS REGISTRADOS CON EXITO!!!'); window.location='datostecnicos.php';</script>";		
	}
	public function get_datostecnicos($id_sistema) {
	    $mysqli=Conexion::con();
	    $sql= "select * from tecnicossistemas where codsistema='$id_sistema'";
		$res=$mysqli->query($sql);
		$mysqli->close();
		while ($reg=$res->fetch_assoc())
		{
			$this->listasistema[]=$reg;
		}
		$res->free();
		return $this->listasistema;
	}
	public function get_datosgenerales($id_sistema) {
	    $mysqli=Conexion::con();
		$sql= "select nombresistema,tiposistema,nombrebarrio,nombreparroquia,nombrecanton,cantones.foto as foto,municipio,nom_provincia
		from sistemas
		inner join barrios on
		sistemas.codbarrio=barrios.codbarrio
		inner join parroquias on
		barrios.codparroquia=parroquias.codparroquia
		inner join cantones on
		parroquias.codcanton=cantones.codcanton
		inner join provincias on
		cantones.cod_provincia=provincias.cod_provincia
		where codsistema='$id_sistema'";
		$res=$mysqli->query($sql);
		$mysqli->close();		
		while ($reg=$res->fetch_assoc())
		{
			$this->listasistema[]=$reg;
		}
		$res->free();
		return $this->listasistema;			
		}		
	}
?>