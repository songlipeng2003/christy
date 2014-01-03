<?php

/**
 * This is the model class for table "book_order".
 *
 * The followings are the available columns in table 'book_order':
 * @property integer $id
 * @property integer $user_id
 * @property integer $book_id
 * @property integer $status
 * @property integer $download_times
 * @property string $created_at
 * @property string $updated_at
 */
class BookOrder extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BookOrder the static model class
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
		return 'book_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, book_id', 'required'),
			array('user_id, book_id, status, download_times', 'numerical', 'integerOnly'=>true),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, book_id, status, download_times, created_at, updated_at', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'user'=>array(self::BELONGS_TO, 'User', 'user_id'),
			'book'=>array(self::BELONGS_TO, 'Book', 'book_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('model', 'BookOrder.id'),
			'user_id' => Yii::t('model', 'BookOrder.user'),
			'book_id' => Yii::t('model', 'BookOrder.book'),
			'status' => Yii::t('model', 'BookOrder.status'),
			'download_times' => Yii::t('model', 'BookOrder.download_times'),
			'created_at' => Yii::t('model', 'BookOrder.created_at'),
			'updated_at' => Yii::t('model', 'BookOrder.updated_at'),
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
		$criteria->compare('book_id',$this->book_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('download_times',$this->download_times);
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