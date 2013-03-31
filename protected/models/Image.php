<?php

/**
 * This is the model class for table "image".
 *
 * The followings are the available columns in table 'image':
 * @property string $id
 * @property string $title
 * @property string $path
 * @property string $type
 * @property string $position
 * @property string $itemId
 * @property string $lastModified
 */
class Image extends CActiveRecord
{
	public $type = 0;//see config/app.php for default image type kept to program for now
	public $position = 1;
	public $itemId = 0;
	public $programName = "";
	public $uploadedImage = "";
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Image the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'image';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, path, lastModified', 'required'),
			array('title', 'length', 'max'=>255),
			array('type', 'length', 'max'=>4),
			array('uploadedImage', 'file', 'types' => 'jpeg,jpg,png,gif', 'allowEmpty' => true),
			array('uploadedImage', 'file', 'types' => 'jpeg,jpg,png,gif', 'allowEmpty' => false, 'on' => 'create'),
			array('position, itemId', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, path, type, position, itemId, lastModified, programName', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'path' => 'Image',
			'type' => 'Type',
			'position' => 'Position',
			'itemId' => 'Item',
			'lastModified' => 'Last Modified',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('t.id',$this->id,true);
		$criteria->compare('t.title',$this->title,true);
		$criteria->compare('t.path',$this->path,true);
		$criteria->compare('t.type',$this->type,true);
		$criteria->compare('t.position',$this->position,true);
		$criteria->compare('t.itemId',$this->itemId,true);
		$criteria->compare('t.lastModified',$this->lastModified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}