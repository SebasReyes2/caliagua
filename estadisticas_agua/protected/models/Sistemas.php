<?php

class Sistemas extends CActiveRecord
{
        public $codcanton;
        public $codparroquia;
        public $connection;
        
        public function __construct()
    {
        $this->connection=new CDbConnection(Yii::app()->db->connectionString,Yii::app()->db->username,Yii::app()->db->password);
        $this->connection->active=true;
    }
        
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function tableName()
	{
		return 'sistemas';
	}

	
	public function rules()
	{
            return array(
                    array('codcanton', 'required'),
                    /*array('codbarrio', 'numerical', 'integerOnly'=>true),
                    array('nombresistema', 'length', 'max'=>50),
                    array('tiposistema', 'length', 'max'=>10),
                    array('codsistema, codbarrio, nombresistema, tiposistema', 'safe', 'on'=>'search'),*/
            );
	}

	
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'muestrasAlausis' => array(self::HAS_MANY, 'MuestrasAlausi', 'codsistema'),
			'muestrasChambos' => array(self::HAS_MANY, 'MuestrasChambo', 'codsistema'),
			'muestrasChunchis' => array(self::HAS_MANY, 'MuestrasChunchi', 'codsistema'),
			'muestrasColtas' => array(self::HAS_MANY, 'MuestrasColta', 'codsistema'),
			'muestrasCumandas' => array(self::HAS_MANY, 'MuestrasCumanda', 'codsistema'),
			'muestrasGuamotes' => array(self::HAS_MANY, 'MuestrasGuamote', 'codsistema'),
			'muestrasGuanos' => array(self::HAS_MANY, 'MuestrasGuano', 'codsistema'),
			'muestrasPallatangas' => array(self::HAS_MANY, 'MuestrasPallatanga', 'codsistema'),
			'muestrasPenipes' => array(self::HAS_MANY, 'MuestrasPenipe', 'codsistema'),
			'muestrasRiobambas' => array(self::HAS_MANY, 'MuestrasRiobamba', 'codsistema'),
			'codbarrio0' => array(self::BELONGS_TO, 'Barrios', 'codbarrio'),
			'tecnicossistemases' => array(self::HAS_MANY, 'Tecnicossistemas', 'codsistema'),
		);
	}

	
	public function attributeLabels()
	{
		return array(
			'codsistema' => 'Codsistema',
			'codbarrio' => 'Codbarrio',
			'nombresistema' => 'Nombresistema',
			'tiposistema' => 'Tiposistema',
		);
	}

	
	public function search()
	{

		$criteria=new CDbCriteria;
		$criteria->compare('codsistema',$this->codsistema);
		$criteria->compare('codbarrio',$this->codbarrio);
		$criteria->compare('nombresistema',$this->nombresistema,true);
		$criteria->compare('tiposistema',$this->tiposistema,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getNumeroBombeo($cod){
        $sql = "select codsistema
            from sistemas
            inner join barrios
            on sistemas.codbarrio=barrios.codbarrio
            inner join parroquias
            on barrios.codparroquia=parroquias.codparroquia
            inner join cantones
            on parroquias.codcanton=cantones.codcanton 
            where cantones.codcanton='$cod' and tiposistema='Bombeo';";
        //$numbombeo = $this->con->createCommand($sql)->queryAll();
        $numbombeo = $this->connection->createCommand($sql)->queryAll();
        $num = count($numbombeo);
        $this->connection->active=false;
        return $num;
    }
    
    public function getNumeroGravedad($cod){
        $sql = "select codsistema
            from sistemas
            inner join barrios
            on sistemas.codbarrio=barrios.codbarrio
            inner join parroquias
            on barrios.codparroquia=parroquias.codparroquia
            inner join cantones
            on parroquias.codcanton=cantones.codcanton 
            where cantones.codcanton='$cod' and tiposistema='A gravedad';";
        $numgrav = $this->connection->createCommand($sql)->queryAll();
        $num = count($numgrav);
        $this->connection->active=false;
        return $num;
    }
    
    public function getNumGravedadParroquia($id_parroquia){
        $sql = "select codsistema
            from sistemas
            inner join barrios
            on sistemas.codbarrio=barrios.codbarrio
            inner join parroquias
            on barrios.codparroquia=parroquias.codparroquia
            where parroquias.codparroquia='$id_parroquia' and tiposistema='a gravedad';";
        $numgrav = $this->connection->createCommand($sql)->queryAll();
        $num = count($numgrav);
        $this->connection->active=false;
        return $num;
    }
    
    public function getNumBombeoParroquia($id_parroquia){
        $sql = "select codsistema
            from sistemas
            inner join barrios
            on sistemas.codbarrio=barrios.codbarrio
            inner join parroquias
            on barrios.codparroquia=parroquias.codparroquia
            where parroquias.codparroquia='$id_parroquia' and tiposistema='Bombeo';";
        $numbom = $this->connection->createCommand($sql)->queryAll();
        $num1 = count($numbom);
        $this->connection->active=false;
        return $num1;
    }
    
    public function getSistemasByCanton($id_canton) {
        $sql = "select codsistema,nombresistema,barrios.nombrebarrio,parroquias.nombreparroquia,
                        cantones.nombrecanton,tiposistema
                    from
                        sistemas
                            inner join
                        barrios ON sistemas.codbarrio = barrios.codbarrio
                            inner join
                        parroquias ON barrios.codparroquia = parroquias.codparroquia
                            inner join
                        cantones ON parroquias.codcanton = cantones.codcanton
                    where cantones.codcanton='$id_canton';";
        $reg = $this->connection->createCommand($sql)->queryAll();
        $this->connection->active=false;
        return $reg;
    }
            
}
