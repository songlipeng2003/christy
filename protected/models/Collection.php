<?php

/**
 * This is the model class for table "collection".
 *
 * The followings are the available columns in table 'collection':
 * @property integer $id
 * @property integer $user_id
 * @property integer $object_id
 * @property integer $type
 * @property integer $status
 * @property integer $rating
 * @property string $tags
 * @property string $comment
 * @property string $created_at
 * @property string $updated_at
 */
class Collection extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Collection the static model class
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
		return 'collection';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, object_id, type, status', 'required'),
			array('user_id, object_id, type, status, rating', 'numerical', 'integerOnly'=>true),
			array('tags, comment', 'length', 'max'=>255),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, object_id, type, status, rating, tags, comment, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('model', 'Collection.id'),
			'user_id' => Yii::t('model', 'Collection.user'),
			'object_id' => Yii::t('model', 'Collection.object'),
			'type' => Yii::t('model', 'Collection.type'),
			'status' => Yii::t('model', 'Collection.status'),
			'rating' => Yii::t('model', 'Collection.rating'),
			'tags' => Yii::t('model', 'Collection.tags'),
			'comment' => Yii::t('model', 'Collection.comment'),
			'created_at' => Yii::t('model', 'Collection.created_at'),
			'updated_at' => Yii::t('model', 'Collection.updated_at'),
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
		$criteria->compare('status',$this->status);
		$criteria->compare('rating',$this->rating);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('comment',$this->comment,true);
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