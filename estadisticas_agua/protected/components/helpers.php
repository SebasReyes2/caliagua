<?php

function chao_tilde($entra)
{
$traduce=array( 'á' => '&aacute;' , 'é' => '&eacute;' , 'í' => '&iacute;' , 'ó' => '&oacute;' , 'ú' => '&uacute;' , 'ñ' => '&ntilde;' , 'Ñ' => '&Ntilde;' , 'ä' => '&auml;' , 'ë' => '&euml;' , 'ï' => '&iuml;' , 'ö' => '&ouml;' , 'ü' => '&uuml;');
$sale=strtr( $entra , $traduce );
return $sale;
}

function quitarTilde($param) {
    $var = array('á'=>'a','é'=>'e','í'=>'i','ó'=>'o','ú'=>'u');
    $salida = strtr($param, $var);
    return $salida;
}

function nombre_parametro($param){
    $parametro = strtoupper($param);
    $parametro = strtr($parametro,"_"," ");
    return $parametro;
}

function nombre_canton($id) {
    $canton = array();
    if ($id == 100){
        $canton = "Alausí";
    }
    if ($id == 101){
        $canton = "Chambo";
    }
    if ($id == 102){
        $canton = "Chunchi";
    }
    if ($id == 103){
        $canton = "Colta";
    }
    if ($id == 104){
        $canton = "Cumandá";
    }
    if ($id == 105){
        $canton = "Guamote";
    }
    if ($id == 106){
        $canton = "Guano";
    }
    if ($id == 107){
        $canton = "Pallatanga";
    }
    if ($id == 108){
        $canton = "Penipe";
    }
    if ($id == 109){
        $canton = "Riobamba";
    }
    return $canton;
}

function nombreparroquia($param) 
{
    $criteria = new CDbCriteria();
    $criteria->select='nombreparroquia';
    $criteria->condition='codparroquia=:id';
    $criteria->params=array(':id'=>$param);
    $nombre = Parroquias::model()->find($criteria);
    return $nombre["nombreparroquia"];
}

function nombresistema($param) 
{
    $criteria = new CDbCriteria();
    $criteria->select='nombresistema';
    $criteria->condition='codsistema=:id';
    $criteria->params=array(':id'=>$param);
    $nombre = Sistemas::model()->find($criteria);
    return $nombre["nombresistema"];
}

function getinfobysistema($id) {
    $conex = Yii::app()->db;
    $sql = "select nombresistema,nombrebarrio,nombreparroquia,nombrecanton
            from sistemas
            INNER JOIN
            barrios ON sistemas.codbarrio = barrios.codbarrio
            INNER JOIN
            parroquias ON barrios.codparroquia=parroquias.codparroquia
            INNER JOIN cantones ON parroquias.codcanton=cantones.codcanton
            WHERE codsistema = '$id';";
    $reg = $conex->createCommand($sql)->queryAll();
    $conex->active=false;
    return $reg;
}

/* FUNCIONES DE VERIFICACION DE CALIDAD DEL AGUA */
function getCalidadRiobamba($id)
{
    $conexion = Yii::app()->db;
    $sql = "call get_calidad_riobambaid('$id');";
    $reg = $conexion->createCommand($sql)->queryAll();
    $conexion->active=false;
    return $reg;
}
function getCalidadAlausi($id)
{
    $conexion = Yii::app()->db;
    $sql = "call get_calidad_alausiid('$id');";
    $reg = $conexion->createCommand($sql)->queryAll();
    $conexion->active=false;
    return $reg;
}
function getCalidadChambo($id)
{
    $conexion = Yii::app()->db;
    $sql = "call get_calidad_chamboid('$id');";
    $reg = $conexion->createCommand($sql)->queryAll();
    $conexion->active=false;
    return $reg;
}
function getCalidadChunchi($id)
{
    $conexion = Yii::app()->db;
    $sql = "call get_calidad_chunchiid('$id');";
    $reg = $conexion->createCommand($sql)->queryAll();
    $conexion->active=false;
    return $reg;
}
function getCalidadColta($id)
{
    $conexion = Yii::app()->db;
    $sql = "call get_calidad_coltaid('$id');";
    $reg = $conexion->createCommand($sql)->queryAll();
    $conexion->active=false;
    return $reg;
}
function getCalidadCumanda($id)
{
    $conexion = Yii::app()->db;
    $sql = "call get_calidad_cumandaid('$id');";
    $reg = $conexion->createCommand($sql)->queryAll();
    $conexion->active=false;
    return $reg;
}
function getCalidadGuamote($id)
{
    $conexion = Yii::app()->db;
    $sql = "call get_calidad_guamoteid('$id');";
    $reg = $conexion->createCommand($sql)->queryAll();
    $conexion->active=false;
    return $reg;
}
function getCalidadGuano($id)
{
    $conexion = Yii::app()->db;
    $sql = "call get_calidad_guanoid('$id');";
    $reg = $conexion->createCommand($sql)->queryAll();
    $conexion->active=false;
    return $reg;
}
function getCalidadPallatanga($id)
{
    $conexion = Yii::app()->db;
    $sql = "call get_calidad_pallatangaid('$id');";
    $reg = $conexion->createCommand($sql)->queryAll();
    $conexion->active=false;
    return $reg;
}
function getCalidadPenipe($id)
{
    $conexion = Yii::app()->db;
    $sql = "call get_calidad_penipeid('$id');";
    $reg = $conexion->createCommand($sql)->queryAll();
    $conexion->active=false;
    return $reg;
}
/*  FUNCIONES DE NUMERO DE REGISTROS POR SISTEMA  */
function getreg_sistema($id){
    $criteria = new CDbCriteria();
    $criteria->select='codmuestra';
    $criteria->condition='codsistema=:id';
    $criteria->params=array(':id'=>$id);
    $regis = MuestrasRiobamba::model()->count($criteria);
    return $regis;
}
function numreg_muestras_alausi($id){
    $criteria = new CDbCriteria();
    $criteria->select='codmuestra';
    $criteria->condition='codsistema=:id';
    $criteria->params=array(':id'=>$id);
    $regis = MuestrasAlausi::model()->count($criteria);
    return $regis;
}
function numreg_muestras_chambo($id){
    $criteria = new CDbCriteria();
    $criteria->select='codmuestra';
    $criteria->condition='codsistema=:id';
    $criteria->params=array(':id'=>$id);
    $regis = MuestrasChambo::model()->count($criteria);
    return $regis;
}
function numreg_muestras_chunchi($id){
    $criteria = new CDbCriteria();
    $criteria->select='codmuestra';
    $criteria->condition='codsistema=:id';
    $criteria->params=array(':id'=>$id);
    $regis = MuestrasChunchi::model()->count($criteria);
    return $regis;
}
function numreg_muestras_colta($id){
    $criteria = new CDbCriteria();
    $criteria->select='codmuestra';
    $criteria->condition='codsistema=:id';
    $criteria->params=array(':id'=>$id);
    $regis = MuestrasColta::model()->count($criteria);
    return $regis;
}
function numreg_muestras_cumanda($id){
    $criteria = new CDbCriteria();
    $criteria->select='codmuestra';
    $criteria->condition='codsistema=:id';
    $criteria->params=array(':id'=>$id);
    $regis = MuestrasCumanda::model()->count($criteria);
    return $regis;
}
function numreg_muestras_guamote($id){
    $criteria = new CDbCriteria();
    $criteria->select='codmuestra';
    $criteria->condition='codsistema=:id';
    $criteria->params=array(':id'=>$id);
    $regis = MuestrasGuamote::model()->count($criteria);
    return $regis;
}
function numreg_muestras_guano($id){
    $criteria = new CDbCriteria();
    $criteria->select='codmuestra';
    $criteria->condition='codsistema=:id';
    $criteria->params=array(':id'=>$id);
    $regis = MuestrasGuano::model()->count($criteria);
    return $regis;
}
function numreg_muestras_pallatanga($id){
    $criteria = new CDbCriteria();
    $criteria->select='codmuestra';
    $criteria->condition='codsistema=:id';
    $criteria->params=array(':id'=>$id);
    $regis = MuestrasPallatanga::model()->count($criteria);
    return $regis;
}
function numreg_muestras_penipe($id){
    $criteria = new CDbCriteria();
    $criteria->select='codmuestra';
    $criteria->condition='codsistema=:id';
    $criteria->params=array(':id'=>$id);
    $regis = MuestrasPenipe::model()->count($criteria);
    return $regis;
}
/* FIN FUNCION  */
 function tabla_muestras($idcanton) {
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
    
 function getLimitePermisible($param) 
    {
        $lim_sup = array();
        if($param == "ph")
        {
            $lim_sup = 9;
        }
        if($param == "color")
        {
            $lim_sup = 15;
        }
        if($param == "turbiedad")
        {
            $lim_sup = 5;
        }
        if($param == "temperatura")
        {
            $lim_sup = "";
        }
        if($param == "solidos_totales")
        {
            $lim_sup = 500;
        }
        if($param == "conductividad")
        {
            $lim_sup = "";
        }
        if($param == "dureza")
        {
            $lim_sup = 500;
        }
        if($param == "cloro_libre")
        {
            $lim_sup = 1.5;
        }
        if($param == "hierro")
        {
            $lim_sup = 0.3;
        }
        if($param == "nitritos")
        {
            $lim_sup = 3;
        }
        if($param == "nitratos")
        {
            $lim_sup = 50;
        }
        if($param == "sulfatos")
        {
            $lim_sup = 250;
        }
        if($param == "fosfatos")
        {
            $lim_sup = 0.3;
        }
        if($param == "manganeso")
        {
            $lim_sup = 0.1;
        }
        if($param == "fluoruros")
        {
            $lim_sup = 1.5;
        }
        if($param == "amoniaco")
        {
            $lim_sup = 1;
        }
        if($param == "coliformes_fecales")
        {
            $lim_sup = 50;
        }
        if($param == "coliformes_totales")
        {
            $lim_sup = 3000;
        }
        return $lim_sup;
    }
    
 function getUnidadesParametro($param) 
    {
        unset($unidad);
        $unidad[] = array();
        if($param == "ph")
        {
            $unidad = "unidades";
        }
        if($param == "color")
        {
            $unidad = "color real";
        }
        if($param == "turbiedad")
        {
            $unidad = "NTU";
        }
        if($param == "temperatura")
        {
            $unidad = "°C";
        }
        if($param == "solidos_totales")
        {
            $unidad = "mg/l";
        }
        if($param == "conductividad")
        {
            $unidad = "μS/cm";
        }
        if($param == "dureza")
        {
            $unidad = "mg/l";
        }
        if($param == "cloro_libre")
        {
            $unidad = "mg/l";
        }
        if($param == "hierro")
        {
            $unidad = "mg/l";
        }
        if($param == "nitritos")
        {
            $unidad = "mg/l";
        }
        if($param == "nitratos")
        {
            $unidad = "mg/l";
        }
        if($param == "sulfatos")
        {
            $unidad = "mg/l";
        }
        if($param == "fosfatos")
        {
            $unidad = "mg/l";
        }
        if($param == "manganeso")
        {
            $unidad = "mg/l";
        }
        if($param == "fluoruros")
        {
            $unidad = "mg/l";
        }
        if($param == "amoniaco")
        {
            $unidad = "mg/l";
        }
        if($param == "coliformes_fecales")
        {
            $unidad = "NMP/100 ml";
        }
        if($param == "coliformes_totales")
        {
            $unidad = "NMP/100 ml";
        }
        return $unidad;
    }

 function getMsj_ph($param) {
        if($param == ""){
            echo "-";
        }else{
            if($param>=6 and $param<=9){
                echo '<span>'.$param.'</span>';
            }else{
                echo '<span style="color: red;">'.$param.'</span>';
            }
        }
}
function getMsj_color($param) {
        if($param == ""){
            echo "-";
        }else{
            if($param<=15){
                echo '<span>'.$param.'</span>';
            }else{
                echo '<span style="color: red;">'.$param.'</span>';
            }
        }
}
function getMsj_olor($param) {
    if($param==""){
        echo '<span>-</span>';
    }else{
        echo '<span style="color: red;">'.$param.'</span>';
    }
        
}
function getMsj_turbiedad($param) {
        if($param == ""){
            echo "<span>-</span>";
        }else{
            if($param<=5){
                echo '<span>'.$param.'</span>';
            }else{
                echo '<span style="color: red;">'.$param.'</span>';
            }
        }
}
function getMsj_temperatura($param) {
        if($param == ""){
            echo "<span>-</span>";
        }else{
                echo '<span>'.$param.'</span>';
        }
}
function getMsj_solidos_totales($param) {
        if($param == ""){
            echo "<span>-</span>";
        }else{
            if($param<=500){
                echo '<span>'.$param.'</span>';
            }else{
                echo '<span style="color: red;">'.$param.'</span>';
            }
        }
}
function getMsj_conductividad($param) {
        if($param == ""){
            echo "<span>-</span>";
        }else{
                echo '<span>'.$param.'</span>';
            }
}
function getMsj_dureza($param) {
        if($param == ""){
            echo "<span>-</span>";
        }else{
            if($param<=500){
                echo '<span>'.$param.'</span>';
            }else{
                echo '<span style="color: red;">'.$param.'</span>';
            }
        }
}
function getMsj_cloro_libre($param) {
        if($param == ""){
            echo "<span>-</span>";
        }else{
            if($param>=0.3 and $param<=1.5){
                echo '<span>'.$param.'</span>';
            }else{
                echo '<span style="color: red;">'.$param.'</span>';
            }
        }
}
function getMsj_hierro($param) {
        if($param == ""){
            echo "<span>-</span>";
        }else{
            if($param<=0.3){
                echo '<span>'.$param.'</span>';
            }else{
                echo '<span style="color: red;">'.$param.'</span>';
            }
        }
}
function getMsj_nitratos($param) {
        if($param == ""){
            echo "<span>-</span>";
        }else{
            if($param<=50){
                echo '<span>'.$param.'</span>';
            }else{
                echo '<span style="color: red;">'.$param.'</span>';
            }
        }
}
function getMsj_nitritos($param) {
        if($param == ""){
            echo "<span>-</span>";
        }else{
            if($param<=3.0){
                echo '<span>'.$param.'</span>';
            }else{
                echo '<span style="color: red;">'.$param.'</span>';
            }
        }
}
function getMsj_sulfatos($param) {
        if($param == ""){
            echo "<span>-</span>";
        }else{
            if($param<=150){
                echo '<span>'.$param.'</span>';
            }else{
                echo '<span style="color: red;">'.$param.'</span>';
            }
        }
}
function getMsj_fosfatos($param) {
        if($param == ""){
            echo "<span>-</span>";
        }else{
            if($param<=0.3){
                echo '<span>'.$param.'</span>';
            }else{
                echo '<span style="color: red;">'.$param.'</span>';
            }
        }
}
function getMsj_manganeso($param) {
        if($param == ""){
            echo "<span>-</span>";
        }else{
            if($param<=0.1){
                echo '<span>'.$param.'</span>';
            }else{
                echo '<span style="color: red;">'.$param.'</span>';
            }
        }
}
function getMsj_fluoruros($param) {
        if($param == ""){
            echo "<span>-</span>";
        }else{
            if($param<=1.5){
                echo '<span>'.$param.'</span>';
            }else{
                echo '<span style="color: red;">'.$param.'</span>';
            }
        }
}
function getMsj_amoniaco($param) {
        if($param == ""){
            echo "<span>-</span>";
        }else{
            if($param<=1.0){
                echo '<span>'.$param.'</span>';
            }else{
                echo '<span style="color: red;">'.$param.'</span>';
            }
        }
}
function getMsj_coliformes_fecales($param) {
        if($param == ""){
            echo "<span>-</span>";
        }else{
            if($param<=50){
                echo '<span>'.$param.'</span>';
            }else{
                echo '<span style="color: red;">'.$param.'</span>';
            }
        }
}
function getMsj_coliformes_totales($param) {
        if($param == ""){
            echo "<span>-</span>";
        }else{
            if($param<=3000){
                echo '<span>'.$param.'</span>';
            }else{
                echo '<span style="color: red;">'.$param.'</span>';
            }
        }
}