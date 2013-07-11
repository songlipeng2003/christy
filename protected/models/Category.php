<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $lft
 * @property integer $rgt
 * @property integer $level
 * @property integer $parent_id
 */
class Category extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Category the static model class
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
		return 'category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, english_name, letter_index', 'required'),
			array('lft, rgt, level, parent_id', 'numerical', 'integerOnly'=>true),
			array('name, english_name, letter_index, description', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description', 'safe', 'on'=>'search'),
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
            'parent'=>array(self::BELONGS_TO, 'Category', 'parent_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('model', 'Category.id'),
			'name' => Yii::t('model', 'Category.name'),
			'english_name' => Yii::t('model', 'Category.english_name'),
			'letter_index' => Yii::t('model', 'Category.letter_index'),
			'parent_id' => Yii::t('model', 'Category.parent_id'),
			'description' => Yii::t('model', 'Category.description'),
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('english_name',$this->name,true);
		$criteria->compare('letter_index',$this->name,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	// public function behaviors()
	// {
	//     return array(
	//         'nestedSetBehavior'=>array(
	//             'class'=>'NestedSetBehavior',
	//             'leftAttribute'=>'lft',
	//             'rightAttribute'=>'rgt',
	//             'levelAttribute'=>'level',
	//             'rootAttribute'=>'parent_id',
	//             'hasManyRoots'=>true,
	//         ),
	//     );
	// }
}