<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $firstName
 * @property string $lastName
 * @property string $displayName
 * @property integer $user_role
 * @property integer $status
 * @property string $activation_key
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property Comments[] $comments
 * @property Content[] $contents
 * @property Tags[] $tags
 * @property UserMetadata[] $userMetadatas
 * @property UserRoles $userRole
 */
class Users extends CiiModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
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
		return 'users';
	}

	/**
	 * @return array primary key of the table
	 **/	 
	public function primaryKey()
	{
		return array('id');
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, password, firstName, lastName, displayName, user_role, status', 'required'),
			array('user_role, status', 'numerical', 'integerOnly'=>true),
			array('email, firstName, lastName, displayName', 'length', 'max'=>255),
			array('password, activation_key', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email, password, firstName, lastName, displayName, user_role, status, activation_key, created, updated', 'safe', 'on'=>'search'),
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
			'comments' => array(self::HAS_MANY, 'Comments', 'user_id'),
			'content' => array(self::HAS_MANY, 'Content', 'author_id'),
			'tags' => array(self::HAS_MANY, 'Tags', 'user_id'),
			'metadata' => array(self::HAS_MANY, 'UserMetadata', 'user_id'),
			'role' => array(self::BELONGS_TO, 'UserRoles', 'user_role'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'email' => 'Email',
			'password' => 'Password',
			'firstName' => 'First Name',
			'lastName' => 'Last Name',
			'displayName' => 'Display Name',
			'user_role' => 'User Role',
			'status' => 'Status',
			'activation_key' => 'Activation Key',
			'created' => 'Created',
			'updated' => 'Updated',
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
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('firstName',$this->firstName,true);
		$criteria->compare('lastName',$this->lastName,true);
		$criteria->compare('displayName',$this->displayName,true);
		$criteria->compare('user_role',$this->user_role);
		$criteria->compare('status',$this->status);
		$criteria->compare('activation_key',$this->activation_key,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function beforeSave() {
	    	if ($this->isNewRecord)
			$this->created = new CDbExpression('NOW()');
	   	else
			$this->updated = new CDbExpression('NOW()');
	 
	    	return parent::beforeSave();
	}
	
	public function encryptHash($email, $password, $_dbsalt) {
		return mb_strimwidth(hash("sha512", hash("sha512", hash("whirlpool", md5($password . md5($email)))) . hash("sha512", md5($password . md5($_dbsalt))) . $_dbsalt), 0, 64);	
	}
}
