<?php

/**
 * This is the model class for table "review".
 *
 * The followings are the available columns in table 'review':
 * @property integer $id
 * @property integer $user_id
 * @property integer $object_id
 * @property integer $type
 * @property integer $rating
 * @property string $title
 * @property string $summary
 * @property string $content
 * @property integer $votes
 * @property integer $useless
 * @property integer $comments
 * @property string $created_at
 * @property string $updated_at
 */
class Review extends CActiveRecord
{
	const TYPE_BOOK = 1;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Review the static model class
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
		return 'review';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, object_id, type, title, content', 'required'),
			array('user_id, object_id, type, rating, votes, useless, comments', 'numerical', 'integerOnly'=>true),
			array('title, summary', 'length', 'max'=>255),
			array('content, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, object_id, type, rating, title, summary, content, votes, useless, comments, created_at, updated_at', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'user'=>array(self::BELONGS_TO, 'User', 'user_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('model', 'Review.id'),
			'user_id' => Yii::t('model', 'Review.user'),
			'object_id' => Yii::t('model', 'Review.object'),
			'type' => Yii::t('model', 'Review.type'),
			'rating' => Yii::t('model', 'Review.rating'),
			'title' => Yii::t('model', 'Review.title'),
			'summary' => Yii::t('model', 'Review.summary'),
			'content' => Yii::t('model', 'Review.content'),
			'votes' => Yii::t('model', 'Review.votes'),
			'useless' => Yii::t('model', 'Review.useless'),
			'comments' => Yii::t('model', 'Review.comments'),
			'created_at' => Yii::t('model', 'Review.created_at'),
			'updated_at' => Yii::t('model', 'Review.updated_at'),
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('object_id',$this->object_id);
		$criteria->compare('type',$this->type);
		$criteria->compare('rating',$this->rating);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('votes',$this->votes);
		$criteria->compare('useless',$this->useless);
		$criteria->compare('comments',$this->comments);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function behaviors(){
		return array(
			'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
				'createAttribute' => 'created_at',
				'updateAttribute' => 'updated_at',
			)
		);
	}
}