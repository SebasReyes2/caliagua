<?php

/**
 * This is the model class for table "muestras_guamote".
 *
 * The followings are the available columns in table 'muestras_guamote':
 * @property integer $codmuestra
 * @property integer $codsistema
 * @property integer $numero
 * @property string $departamento
 * @property string $fuente
 * @property string $recolector
 * @property string $fecha
 * @property string $fecha_analisis
 * @property string $hora
 * @property string $hora_analisis
 * @property string $color
 * @property string $turbiedad
 * @property string $olor
 * @property string $dureza
 * @property string $cloro_libre
 * @property string $fluoruros
 * @property string $manganeso
 * @property string $nitratos
 * @property string $nitritos
 * @property string $coliformes_fecales
 * @property string $ph
 * @property string $temperatura
 * @property string $solidos_totales
 * @property string $conductividad
 * @property string $fosfatos
 * @property string $hierro
 * @property string $sulfatos
 * @property string $amoniaco
 * @property string $coliformes_totales
 * @property string $observacion
 *
 * The followings are the available model relations:
 * @property Sistemas $codsistema0
 */
class MuestrasGuamote extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'muestras_guamote';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codsistema, numero, departamento, fuente, recolector, fecha, fecha_analisis, hora, hora_analisis', 'required'),
			array('codsistema, numero', 'numerical', 'integerOnly'=>true),
			array('departamento, fuente, recolector', 'length', 'max'=>50),
			array('color, turbiedad, dureza, cloro_libre, fluoruros, manganeso, nitratos, nitritos, coliformes_fecales, ph, temperatura, solidos_totales, conductividad, fosfatos, hierro, sulfatos, amoniaco, coliformes_totales', 'length', 'max'=>10),
			array('olor', 'length', 'max'=>25),
			array('observacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('codmuestra, codsistema, numero, departamento, fuente, recolector, fecha, fecha_analisis, hora, hora_analisis, color, turbiedad, olor, dureza, cloro_libre, fluoruros, manganeso, nitratos, nitritos, coliformes_fecales, ph, temperatura, solidos_totales, conductividad, fosfatos, hierro, sulfatos, amoniaco, coliformes_totales, observacion', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'codsistema0' => array(self::BELONGS_TO, 'Sistemas', 'codsistema'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codmuestra' => 'Codmuestra',
			'codsistema' => 'Codsistema',
			'numero' => 'Numero',
			'departamento' => 'Departamento',
			'fuente' => 'Fuente',
			'recolector' => 'Recolector',
			'fecha' => 'Fecha',
			'fecha_analisis' => 'Fecha Analisis',
			'hora' => 'Hora',
			'hora_analisis' => 'Hora Analisis',
			'color' => 'Color',
			'turbiedad' => 'Turbiedad',
			'olor' => 'Olor',
			'dureza' => 'Dureza',
			'cloro_libre' => 'Cloro Libre',
			'fluoruros' => 'Fluoruros',
			'manganeso' => 'Manganeso',
			'nitratos' => 'Nitratos',
			'nitritos' => 'Nitritos',
			'coliformes_fecales' => 'Coliformes Fecales',
			'ph' => 'Ph',
			'temperatura' => 'Temperatura',
			'solidos_totales' => 'Solidos Totales',
			'conductividad' => 'Conductividad',
			'fosfatos' => 'Fosfatos',
			'hierro' => 'Hierro',
			'sulfatos' => 'Sulfatos',
			'amoniaco' => 'Amoniaco',
			'coliformes_totales' => 'Coliformes Totales',
			'observacion' => 'Observacion',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('codmuestra',$this->codmuestra);
		$criteria->compare('codsistema',$this->codsistema);
		$criteria->compare('numero',$this->numero);
		$criteria->compare('departamento',$this->departamento,true);
		$criteria->compare('fuente',$this->fuente,true);
		$criteria->compare('recolector',$this->recolector,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('fecha_analisis',$this->fecha_analisis,true);
		$criteria->compare('hora',$this->hora,true);
		$criteria->compare('hora_analisis',$this->hora_analisis,true);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('turbiedad',$this->turbiedad,true);
		$criteria->compare('olor',$this->olor,true);
		$criteria->compare('dureza',$this->dureza,true);
		$criteria->compare('cloro_libre',$this->cloro_libre,true);
		$criteria->compare('fluoruros',$this->fluoruros,true);
		$criteria->compare('manganeso',$this->manganeso,true);
		$criteria->compare('nitratos',$this->nitratos,true);
		$criteria->compare('nitritos',$this->nitritos,true);
		$criteria->compare('coliformes_fecales',$this->coliformes_fecales,true);
		$criteria->compare('ph',$this->ph,true);
		$criteria->compare('temperatura',$this->temperatura,true);
		$criteria->compare('solidos_totales',$this->solidos_totales,true);
		$criteria->compare('conductividad',$this->conductividad,true);
		$criteria->compare('fosfatos',$this->fosfatos,true);
		$criteria->compare('hierro',$this->hierro,true);
		$criteria->compare('sulfatos',$this->sulfatos,true);
		$criteria->compare('amoniaco',$this->amoniaco,true);
		$criteria->compare('coliformes_totales',$this->coliformes_totales,true);
		$criteria->compare('observacion',$this->observacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MuestrasGuamote the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
