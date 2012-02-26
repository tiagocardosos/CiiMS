<?php

/**
 * This is the model class for table "content".
 *
 * The followings are the available columns in table 'content':
 * @property integer $id
 * @property integer $vid
 * @property integer $author_id
 * @property string $title
 * @property string $content
 * @property string $except
 * @property integer $status
 * @property integer $commentable
 * @property integer $parent_id
 * @property integer $category_id
 * @property integer $type_id
 * @property string $password
 * @property integer $comment_count
 * @property string $slug
 * @property string $created
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property Comments[] $comments
 * @property Comments[] $comments1
 * @property Users $author
 * @property Content $parent
 * @property Content[] $contents
 * @property Categories $category
 * @property ContentMetadata[] $contentMetadatas
 */
class Content extends CiiModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Content the static model class
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
		return 'content';
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
			array('vid, author_id, title, content, extract, status, commentable, parent_id, category_id, slug', 'required'),
			array('vid, author_id, status, commentable, parent_id, category_id, type_id, comment_count', 'numerical', 'integerOnly'=>true),
			array('title, password, slug', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, vid, author_id, title, content, extract, status, commentable, parent_id, category_id, type_id, password, comment_count, slug, created, updated', 'safe', 'on'=>'search'),
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
			'comments' => array(self::HAS_MANY, 'Comments', 'content_id'),
			'author' => array(self::BELONGS_TO, 'Users', 'author_id'),
			'parent' => array(self::BELONGS_TO, 'Content', 'parent_id'),
			'category' => array(self::BELONGS_TO, 'Categories', 'category_id'),
			'metadata' => array(self::HAS_MANY, 'ContentMetadata', 'content_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'vid' => 'Vid',
			'author_id' => 'Author',
			'title' => 'Title',
			'content' => 'Content',
			'extract' => 'Extract',
			'status' => 'Status',
			'commentable' => 'Commentable',
			'parent_id' => 'Parent',
			'category_id' => 'Category',
			'type_id' => 'Type',
			'password' => 'Password',
			'comment_count' => 'Comment Count',
			'slug' => 'Slug',
			'created' => 'Created',
			'updated' => 'Updated',
		);
	}
	
	/**
         * Finds all active records with the specified primary keys.
         * Overloaded to support composite primary keys. For our content, we want to find the latest version of that primary key, defined as MAX(vid) WHERE id = pk
         * See {@link find()} for detailed explanation about $condition and $params.
         * @param mixed $pk primary key value(s). Use array for multiple primary keys. For composite key, each key value must be an array (column name=>column value).
         * @param mixed $condition query condition or criteria.
         * @param array $params parameters to be bound to an SQL statement.
         * @return array the records found. An empty array is returned if none is found.
         */
	public function findByPk($pk, $condition='', $params=array())
	{
		// If we do not supply a condition or parameters, use our overwritten method
		if ($condition == '' && empty($params))
		{			
			// Trace
			Yii::trace(get_class($this).'.findByPk() Override','system.db.ar.CActiveRecord');
			$criteria = new CDbCriteria;
			$criteria->addCondition("t.id={$pk}");
			$criteria->addCondition("vid=(SELECT MAX(vid) FROM content WHERE t.id={$pk})");
			return $this->query($criteria);
		}
		
		return parent::findByPk($pk, $conditions, $params);
	}
	
	public function beforeSave() {
	    	if ($this->isNewRecord)
			$this->created = new CDbExpression('NOW()');
	   	else
			$this->updated = new CDbExpression('NOW()');
	 
	    	return parent::beforeSave();
	}
}
