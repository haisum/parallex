<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $firstName
 * @property string $lastName
 * @property string $email
 * @property string $website
 * @property string $address
 * @property string $password
 * @property string $birthday
 * @property string $lastLogin
 * @property string $registerDate
 * @property integer $type
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('firstName, lastName, email, address, password, birthday', 'required'),
			array('email', 'email'),
			array('email', 'unique'),
			array('website', 'url'),
			array('birthday', 'date', 'format' => 'yyyy-MM-dd'),
			array('birthday' , 'compare', 'operator'=>'>','compareValue' => '1930-01-01'),
			array('birthday' , 'compare', 'operator'=>'<','compareValue' => '2010-01-01'),
			array('type', 'numerical', 'integerOnly'=>true),
			array('firstName, lastName, email, website, password', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, firstName, lastName, email, website, address, password, birthday, lastLogin, registerDate, type', 'safe', 'on'=>'search'),
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
			'firstName' => 'First Name',
			'lastName' => 'Last Name',
			'email' => 'Email',
			'website' => 'Website',
			'address' => 'Address',
			'password' => 'Password',
			'birthday' => 'Birthday',
			'lastLogin' => 'Last Login',
			'registerDate' => 'Register Date',
			'type' => 'Type',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('firstName',$this->firstName,true);
		$criteria->compare('lastName',$this->lastName,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('lastLogin',$this->lastLogin,true);
		$criteria->compare('registerDate',$this->registerDate,true);
		$criteria->compare('type',$this->type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}