<?php

class Tipo extends CActiveRecord {
    
    private $con;
    public $nombre;
    public $descripcion;
    public $foto; 


    public function __construct() {
        $this->con = new CDbConnection(Yii::app()->db->connectionString,Yii::app()->db->username,Yii::app()->db->password);
        $this->con->active=true;
    }
    public static function model($className = __CLASS__) {
        parent::model($className);
    }
    
    public function cantones_chimborazo()
    {
        $sql = "select codcanton,nombrecanton from cantones order by nombrecanton ASC LIMIT 0 , 10;";
        //$dataReader = $this->con->createCommand($sql)->query();
        $cantones = $this->con->createCommand($sql)->queryAll();
        $this->con->active=false;
        return $cantones;
    }
    
    public function rules() {
        return array(
            array('nombre,descripcion','ext.TipoValidation')
        );
    }
    
     public function insertar($foto)
    {
        $sql="INSERT INTO tipo (nombre,descripcion,foto) VALUES(?,?,?)";
        $command=$this->con->createCommand($sql);
        // reemplaza el marcador de posición ":username" con el valor real de username
        $command-> bindValue(1,$_POST["Tipo"]["nombre"],PDO::PARAM_STR);
        // reemplaza el marcador de posición ":email" con el valor real de email
        $command-> bindValue(2,$_POST["Tipo"]["descripcion"],PDO::PARAM_STR);
        $command->bindValue(3,$foto,  PDO::PARAM_STR);
        $command->execute();
        $this->con->active=false;
        return true;
    }
}

