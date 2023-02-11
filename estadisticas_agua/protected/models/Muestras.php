<?php

class Muestras extends CActiveRecord{
    
    private $con;
    public $codcanton;
    public $codparroquia;
    public $codbarrio;
    public $codsistema;
    public $parametro;
    public $fecha;
    public $fecha2;


    public function __construct() {
        $this->con = new CDbConnection(Yii::app()->db->connectionString,Yii::app()->db->username,Yii::app()->db->password);
        $this->con->active=true;
    }
    public static function model($className = __CLASS__) {
        parent::model($className);
    }
    
    public function rules() {
        return array(
            array('codcanton,codparroquia,codbarrio,codsistema,parametro','ext.TipoValidation'),
        );
    }
    
    public function getDatosParamBySistema($nombre_tabla,$idsistema,$parametro){
        $sql = "select $parametro,fecha,hora,fuente from $nombre_tabla
                where (codsistema='$idsistema') and $parametro!='' ORDER BY fecha ASC,hora ASC;";
        $datos = $this->con->createCommand($sql)->queryAll();
        $this->con->active=false;
        return $datos;
    }
    
    public function GetDatosParamFecha($nombre_tabla,$idsistema,$param,$fecha,$fecha2) {
        $sql = "select $param, fecha,hora,fuente from $nombre_tabla 
                where (codsistema='$idsistema') and ($param!='') and (fecha between '$fecha' and '$fecha2') order by fecha,hora ASC;";
        $reg = $this->con->createCommand($sql)->queryAll();
        $this->con->active = false;
        return $reg;                                
    }
    
    public function getDetalles_id($table,$idsistema) {
        $sql = "select * from $table where codsistema='$idsistema' ORDER BY  fecha DESC, hora DESC LIMIT 0,1;";
        $reg3 = $this->con->createCommand($sql)->queryAll();
        $this->con->active=false;
        return $reg3;
    }
}

