<?php

/**
 * This is the model class for table "shop".
 *
 * The followings are the available columns in table 'shop':
 * @property integer $id
 * @property string $shopname
 * @property string $name
 * @property string $address
 * @property string $tel
 * @property string $pic
 * @property double $latitude
 * @property double $longitude
 * @property integer $zoom
 *
 * The followings are the available model relations:
 * @property ShopHaveServices[] $shopHaveServices
 */
class Shop extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'shop';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('shopname, pic', 'required'),
			array('zoom', 'numerical', 'integerOnly'=>true),
			array('latitude, longitude', 'numerical'),
			array('shopname', 'length', 'max'=>100),
			array('name', 'length', 'max'=>50),
			array('tel', 'length', 'max'=>10),
			array('address', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, shopname, name, address, tel, pic, latitude, longitude, zoom', 'safe', 'on'=>'search'),
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
			'shopHaveServices' => array(self::HAS_MANY, 'ShopHaveServices', 'shop_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'shopname' => 'ชื่อร้าน',
			'name' => 'ชื่อเจ้าของร้าน',
			'address' => 'ที่อยู่',
			'tel' => 'เบอร์โทร',
			'pic' => 'รูปร้าน',
			'latitude' => 'Latitude',
			'longitude' => 'Longitude',
			'zoom' => 'Zoom',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('shopname',$this->shopname,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('latitude',$this->latitude);
		$criteria->compare('longitude',$this->longitude);
		$criteria->compare('zoom',$this->zoom);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Shop the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
