<?php 
include_once("../conexion/Conexion.php");
function darsello($codcanton) {
    $strinsello[] = array();
    unset($strinsello);
    if ($codcanton == 112){
        $strinsello = "<img src='../imagen/cantones/alausi.gif' height=80 />";
    }
    if ($codcanton == 115){
        $strinsello = "<img src='../imagen/cantones/chambo.gif' height=80  />";
    }
    if ($codcanton == 116){
        $strinsello = "<img src='../imagen/cantones/chunchi.gif' height=80 />";
    }
    if ($codcanton == 113){
        $strinsello = "<img src='../imagen/cantones/colta.gif' height=80 />";
    }
    if ($codcanton == 114){
        $strinsello = "<img src='../imagen/cantones/cumanda.gif' height=80 />";
    }
    if ($codcanton == 117){
        $strinsello = "<img src='../imagen/cantones/guamote.gif' height=80 />";
    }
    if ($codcanton == 118){
        $strinsello = "<img src='../imagen/cantones/guano.gif' height=80 />";
    }
    if ($codcanton == 119){
        $strinsello = "<img src='../imagen/cantones/pallatanga.gif' height=80 />";
    }
    if ($codcanton == 120){
        $strinsello = "<img src='../imagen/cantones/penipe.gif' height=80 />";
    }
    if ($codcanton == 111){
        $strinsello = "<img src='../imagen/cantones/riobamba.gif' height=80 />";
    }
	//cantones cotopaxi
	 if ($codcanton == 121){
        $strinsello = "<img src='../imagen/cantones/latacunga.gif' height=80 />";
    }
	if ($codcanton == 122){
        $strinsello = "<img src='../imagen/cantones/lamana.gif' height=80 />";
    }
	if ($codcanton == 123){
        $strinsello = "<img src='../imagen/cantones/pangua.gif' height=80 />";
    }
	if ($codcanton == 124){
        $strinsello = "<img src='../imagen/cantones/pujili.gif' height=80 />";
    }
	if ($codcanton == 125){
        $strinsello = "<img src='../imagen/cantones/salcedo.gif' height=80 />";
    }
	if ($codcanton == 126){
        $strinsello = "<img src='../imagen/cantones/saquisili.gif' height=80 />";
    }
	if ($codcanton == 127){
        $strinsello = "<img src='../imagen/cantones/sigchos.gif' height=80 />";
    }		
		//cantones Tungurahua
	if ($codcanton == 128){
        $strinsello = "<img src='../imagen/cantones/banos.gif' height=80 />";
    }
	if ($codcanton == 129){
        $strinsello = "<img src='../imagen/cantones/cevallos.gif' height=80 />";
    }
	if ($codcanton == 130){
        $strinsello = "<img src='../imagen/cantones/mocha.gif' height=80 />";
    }
	if ($codcanton == 131){
        $strinsello = "<img src='../imagen/cantones/patate.gif' height=80 />";
    }
	if ($codcanton == 132){
        $strinsello = "<img src='../imagen/cantones/quero.gif' height=80 />";
    }
	if ($codcanton == 133){
        $strinsello = "<img src='../imagen/cantones/pelileo.gif' height=80 />";
    }
	if ($codcanton == 134){
        $strinsello = "<img src='../imagen/cantones/pillaro.gif' height=80 />";
    }
	if ($codcanton == 135){
        $strinsello = "<img src='../imagen/cantones/tisaleo.gif' height=80 />";
    }
	if ($codcanton == 140){
        $strinsello = "<img src='../imagen/cantones/ambato.gif' height=80 />";
    }
			//cantones Pastaza
	if ($codcanton == 136){
        $strinsello = "<img src='../imagen/cantones/puyo.gif' height=80 />";
    }
	if ($codcanton == 137){
        $strinsello = "<img src='../imagen/cantones/arajuno.gif' height=80 />";
    }
	if ($codcanton == 138){
        $strinsello = "<img src='../imagen/cantones/mera.gif' height=80 />";
    }
	if ($codcanton == 139){
        $strinsello = "<img src='../imagen/cantones/santaclara.gif' height=80 />";
    }	
    return $strinsello;
}
