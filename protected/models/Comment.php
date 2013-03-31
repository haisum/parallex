<?php

/**
 * This is the model class for table "comment".
 *
 * The followings are the available columns in table 'comment':
 * @property integer $id
 * @property integer $programId
 * @property string $name
 * @property string $email
 * @property string $website
 * @property string $comment
 * @property string $postedTime
 * @property integer $status
 */
class Comment extends CActiveRecord
{
	public $programName = "";
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Comment the static model class
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
		return 'comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('programId, name, email, comment, postedTime', 'required'),
			array('email', 'email'),
			array('website', 'url'),
			array('comment' , 'length', 'min'=>15),
			array('programId, status', 'numerical', 'integerOnly'=>true),
			array('name, website', 'length', 'max'=>50),
			array('email', 'length', 'max'=>60),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, programId, name, email, website, comment, programName, postedTime, status', 'safe', 'on'=>'search'),
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
			'program' => array(self::BELONGS_TO, 'Program', 'programId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'programId' => 'Program',
			'name' => 'Name',
			'email' => 'Email',
			'website' => 'Website',
			'comment' => 'Comment',
			'postedTime' => 'Posted Time',
			'status' => 'Status',
			'programName' => 'Program'
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
		$criteria->with = array('program');
		$criteria->compare('program.name',$this->programName, true);
		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.programId',$this->programId);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.email',$this->email,true);
		$criteria->compare('t.website',$this->website,true);
		$criteria->compare('t.comment',$this->comment,true);
		$criteria->compare('t.postedTime',$this->postedTime,true);
		$criteria->compare('t.status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}