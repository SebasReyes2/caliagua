<?php
class Cantones extends CActiveRecord
{

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function tableName()
	{
		return 'cantones';
	}

	public function rules()
	{
		return array(
			array('codcanton, nombrecanton, municipio, alcalde, foto', 'required'),
			array('codcanton', 'numerical', 'integerOnly'=>true),
			array('nombrecanton', 'length', 'max'=>15),
			array('municipio', 'length', 'max'=>100),
			array('alcalde', 'length', 'max'=>50),
			array('foto', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('codcanton, nombrecanton, municipio, alcalde, foto', 'safe', 'on'=>'search'),
		);
	}

	
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'parroquiases' => array(self::HAS_MANY, 'Parroquias', 'codcanton'),
			'usuarioses' => array(self::HAS_MANY, 'Usuarios', 'codcanton'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'codcanton' => 'Codcanton',
			'nombrecanton' => 'Nombrecanton',
			'municipio' => 'Municipio',
			'alcalde' => 'Alcalde',
			'foto' => 'Foto',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('codcanton',$this->codcanton);
		$criteria->compare('nombrecanton',$this->nombrecanton,true);
		$criteria->compare('municipio',$this->municipio,true);
		$criteria->compare('alcalde',$this->alcalde,true);
		$criteria->compare('foto',$this->foto,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

}
