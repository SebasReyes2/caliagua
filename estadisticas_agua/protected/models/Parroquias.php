<?php

class Parroquias extends CActiveRecord
{
	
    
        public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function tableName()
	{
		return 'parroquias';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codcanton, nombreparroquia', 'required'),
			array('codcanton', 'numerical', 'integerOnly'=>true),
			array('nombreparroquia', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('codparroquia, codcanton, nombreparroquia', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'barrioses' => array(self::HAS_MANY, 'Barrios', 'codparroquia'),
			'codcanton0' => array(self::BELONGS_TO, 'Cantones', 'codcanton'),
		);
	}

	
	public function attributeLabels()
	{
		return array(
			'codparroquia' => 'Codparroquia',
			'codcanton' => 'Codcanton',
			'nombreparroquia' => 'Nombreparroquia',
		);
	}

	
	public function search()
	{

		$criteria=new CDbCriteria;

		$criteria->compare('codparroquia',$this->codparroquia);
		$criteria->compare('codcanton',$this->codcanton);
		$criteria->compare('nombreparroquia',$this->nombreparroquia,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
