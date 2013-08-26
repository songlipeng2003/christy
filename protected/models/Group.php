<?php

/**
 * This is the model class for table "group".
 *
 * The followings are the available columns in table 'group':
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $summary
 * @property string $created_at
 * @property string $updated_at
 */
class Group extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Group the static model class
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
		return 'group';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('user_id, name, summary', 'required'),
			array('name', 'unique'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>30),
			array('summary', 'length', 'min'=>10, 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, name, summary, created_at, updated_at', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'user'=>array(self::BELONGS_TO, 'User', 'user_id'),
			'members'=>array(self::HAS_MANY, 'Member', 'group_id'),
            'memberCount'=>array(self::STAT, 'Member', 'group_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('model', 'Group.id'),
			'user_id' => Yii::t('model', 'Group.user'),
			'name' => Yii::t('model', 'Group.name'),
			'summary' => Yii::t('model', 'Group.summary'),
			'created_at' => Yii::t('model', 'Group.created_at'),
			'updated_at' => Yii::t('model', 'Group.updated_at'),
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function behaviors()
	{
		return array(
			'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
				'createAttribute' => 'created_at',
				'updateAttribute' => 'updated_at',
			)
		);
	}

	public function afterSave()
	{
		if($this->isNewRecord){
			$member = new Member();
			$member->user_id = $this->user_id;
			$member->group_id = $this->id;
			$member->save();
		}
	}

	public function afterDelete()
	{
		Member::model()->deleteAll('group_id='.$this->id);
		Topic::model()->deleteAll('group_id='.$this->id);
	}
}