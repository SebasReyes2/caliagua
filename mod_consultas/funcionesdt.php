<?php 
include_once("../conexion/Conexion.php");
function darsello($codcanton) {
    $stringsello[] = array();
    unset($stringsello);
    if ($codcanton == 112){
        $strinsello = "<img src='../imagen/cantones/alausi.gif' />";
    }
    if ($codcanton == 115){
        $strinsello = "<img src='../imagen/cantones/chambo.gif' />";
    }
    if ($codcanton == 116){
        $strinsello = "<img src='../imagen/cantones/chunchi.gif' />";
    }
    if ($codcanton == 113){
        $strinsello = "<img src='../imagen/cantones/colta.gif' />";
    }
    if ($codcanton == 114){
        $strinsello = "<img src='../imagen/cantones/cumanda.gif' />";
    }
    if ($codcanton == 117){
        $strinsello = "<img src='../imagen/cantones/guamote.gif' />";
    }
    if ($codcanton == 118){
        $strinsello = "<img src='../imagen/cantones/guano.gif' />";
    }
    if ($codcanton == 119){
        $strinsello = "<img src='../imagen/cantones/pallatanga.gif' />";
    }
    if ($codcanton == 120){
        $strinsello = "<img src='../imagen/cantones/penipe.gif' />";
    }
    if ($codcanton == 111){
        $strinsello = "<img src='../imagen/cantones/riobamba.gif' />";
    }
	//cantones cotopaxi
	 if ($codcanton == 121){
        $strinsello = "<img src='../imagen/cantones/latacunga.gif' />";
    }
	if ($codcanton == 122){
        $strinsello = "<img src='../imagen/cantones/lamana.gif' />";
    }
	if ($codcanton == 123){
        $strinsello = "<img src='../imagen/cantones/pangua.gif' />";
    }
	if ($codcanton == 124){
        $strinsello = "<img src='../imagen/cantones/pujili.gif' />";
    }
	if ($codcanton == 125){
        $strinsello = "<img src='../imagen/cantones/salcedo.gif' />";
    }
	if ($codcanton == 126){
        $strinsello = "<img src='../imagen/cantones/saquisili.gif' />";
    }
	if ($codcanton == 127){
        $strinsello = "<img src='../imagen/cantones/sigchos.gif' />";
    }		
		//cantones Tungurahua
	if ($codcanton == 128){
        $strinsello = "<img src='../imagen/cantones/banos.gif' />";
    }
	if ($codcanton == 129){
        $strinsello = "<img src='../imagen/cantones/cevallos.gif' />";
    }
	if ($codcanton == 130){
        $strinsello = "<img src='../imagen/cantones/mocha.gif' />";
    }
	if ($codcanton == 131){
        $strinsello = "<img src='../imagen/cantones/patate.gif' />";
    }
	if ($codcanton == 132){
        $strinsello = "<img src='../imagen/cantones/quero.gif' />";
    }
	if ($codcanton == 133){
        $strinsello = "<img src='../imagen/cantones/pelileo.gif' />";
    }
	if ($codcanton == 134){
        $strinsello = "<img src='../imagen/cantones/pillaro.gif' />";
    }
	if ($codcanton == 135){
        $strinsello = "<img src='../imagen/cantones/tisaleo.gif' />";
    }
	if ($codcanton == 140){
        $strinsello = "<img src='../imagen/cantones/ambato.gif' />";
    }
			//cantones Pastaza
	if ($codcanton == 136){
        $strinsello = "<img src='../imagen/cantones/puyo.gif' />";
    }
	if ($codcanton == 137){
        $strinsello = "<img src='../imagen/cantones/arajuno.gif' />";
    }
	if ($codcanton == 138){
        $strinsello = "<img src='../imagen/cantones/mera.gif' />";
    }
	if ($codcanton == 139){
        $strinsello = "<img src='../imagen/cantones/santaclara.gif' />";
    }	
    return $strinsello;
}
