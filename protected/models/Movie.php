<?php

/**
 * This is the model class for table "movie".
 *
 * The followings are the available columns in table 'movie':
 * @property integer $id
 * @property string $title
 * @property string $original_title
 * @property string $aka
 * @property string $directors
 * @property string $casts
 * @property string $writers
 * @property string $website
 * @property string $pubdate
 * @property string $languages
 * @property integer $duration
 * @property string $summary
 */
class Movie extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Movie the static model class
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
		return 'movie';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('duration', 'numerical', 'integerOnly'=>true),
			array('title, original_title, aka, directors, casts, writers, website, languages', 'length', 'max'=>255),
			array('pubdate, summary', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, original_title, aka, directors, casts, writers, website, pubdate, languages, duration, summary', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('model', 'Movie.id'),
			'title' => Yii::t('model', 'Movie.title'),
			'original_title' => Yii::t('model', 'Movie.original_title'),
			'aka' => Yii::t('model', 'Movie.aka'),
			'directors' => Yii::t('model', 'Movie.directors'),
			'casts' => Yii::t('model', 'Movie.casts'),
			'writers' => Yii::t('model', 'Movie.writers'),
			'website' => Yii::t('model', 'Movie.website'),
			'pubdate' => Yii::t('model', 'Movie.pubdate'),
			'languages' => Yii::t('model', 'Movie.id'),
			'duration' => Yii::t('model', 'Movie.duration'),
			'summary' => Yii::t('model', 'Movie.summary'),
			'created_at' => Yii::t('model', 'Movie.created_at'),
			'updated_at' => Yii::t('model', 'Movie.updated_at'),
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('original_title',$this->original_title,true);
		$criteria->compare('aka',$this->aka,true);
		$criteria->compare('directors',$this->directors,true);
		$criteria->compare('casts',$this->casts,true);
		$criteria->compare('writers',$this->writers,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('pubdate',$this->pubdate,true);
		$criteria->compare('languages',$this->languages,true);
		$criteria->compare('duration',$this->duration);
		$criteria->compare('summary',$this->summary,true);

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