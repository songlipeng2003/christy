<?php

/**
 * This is the model class for table "book".
 *
 * The followings are the available columns in table 'book':
 * @property integer $id
 * @property string $name
 * @property string $author
 * @property string $category
 * @property string $press
 * @property string $isbn
 * @property string $description
 * @property string $file
 * @property string $image
 */
class Book extends CActiveRecord
{
	private $oldAttributes = array();

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Book the static model class
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
		return 'book';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('isbn, name, category_id, author_id, press_id, price, pages', 'required'),
			array('file, image', 'required', 'on'=>'Create'),
			array('pages, word_number', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('isbn, name, alt_title, origin_title, subtitle, description, author_intro', 'length', 'max'=>255),
			array('created_at, updated_at, press_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, author, category, press, isbn, description, file, created_at, updated_at, price, pages, press_date, word_number, alt_title', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'user'=>array(self::BELONGS_TO, 'User', 'user_id'),
			'category'=>array(self::BELONGS_TO, 'Category', 'category_id'),
			'author'=>array(self::BELONGS_TO, 'Author', 'author_id'),
			'tranlator'=>array(self::BELONGS_TO, 'Author', 'tranlator_id'),
			'press'=>array(self::BELONGS_TO, 'Press', 'press_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id'=>Yii::t('model', 'Book.id'),
			'isbn'=>Yii::t('model', 'Book.isbn'),
			'name'=>Yii::t('model', 'Book.name'),
			'origin_title'=>Yii::t('model', 'Book.origin_title'),
			'alt_title'=>Yii::t('model', 'Book.alt_title'),
			'subtitle'=>Yii::t('model', 'Book.subtitle'),
			'category_id'=>Yii::t('model', 'Book.category'),
			'author_id'=>Yii::t('model', 'Book.author'),
			'press_id'=>Yii::t('model', 'Book.press'),
			'file'=>Yii::t('model', 'Book.file'),
			'image'=>Yii::t('model', 'Book.image'),
			'price'=>Yii::t('model', 'Book.price'),
			'pages'=>Yii::t('model', 'Book.pages'),
			'press_date'=>Yii::t('model', 'Book.press_date'),
			'word_number'=>Yii::t('model', 'Book.word_number'),
			'description'=>Yii::t('model', 'Book.description'),
			'author_intro'=>Yii::t('model', 'Book.author_intro'),
			'created_at'=>Yii::t('model', 'Book.created_at'),
    		'updated_at'=>Yii::t('model', 'Book.updated_at'),
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
		$criteria->compare('author',$this->author,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('press',$this->press,true);
		$criteria->compare('isbn',$this->isbn,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('pages',$this->pages);
		$criteria->compare('press_date',$this->press_date,true);
		$criteria->compare('word_number',$this->word_number);

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
	
	protected function afterSave()
	{
		if(!isset($this->oldAttributes['file']) || $this->file != $this->oldAttributes['file']){
			$filePath = Yii::getPathOfAlias('webroot').'/upload/tmp/'.$this->file;
			$targetPath = Yii::getPathOfAlias('webroot').'/upload/book/'.$this->file;

			mkdir(Yii::getPathOfAlias('webroot').'/upload/book/', 0755, true);
			copy($filePath, $targetPath);

			@ unlink(Yii::getPathOfAlias('webroot').'/upload/book/'.$this->oldAttributes['file']);
		}

		if(!isset($this->oldAttributes['image']) || $this->image != $this->oldAttributes['image']){
			$filePath = Yii::getPathOfAlias('webroot').'/upload/tmp/'.$this->image;
			$targetPath = Yii::getPathOfAlias('webroot').'/upload/images/book/originals/'.$this->image;

			mkdir(Yii::getPathOfAlias('webroot').'/upload/images/book/originals/', 0755, true);
			copy($filePath, $targetPath);

			@ unlink(Yii::getPathOfAlias('webroot').'/upload/images/book/originals/'.$this->oldAttributes['image']);
			@ unlink(Yii::getPathOfAlias('webroot').'/upload/images/book/thumb/'.$this->oldAttributes['image']);
			@ unlink(Yii::getPathOfAlias('webroot').'/upload/images/book/tiny/'.$this->oldAttributes['image']);
			@ unlink(Yii::getPathOfAlias('webroot').'/upload/images/book/big/'.$this->oldAttributes['image']);
		}
	}

	protected function afterFind()
    {
        $this->oldAttributes = $this->getAttributes();

        return parent::afterFind();
    }

    protected function afterDelete(){
    	@ unlink(Yii::getPathOfAlias('webroot').'/upload/book/'.$this->oldAttributes['file']);
    	@ unlink(Yii::getPathOfAlias('webroot').'/upload/images/book/originals/'.$this->oldAttributes['image']);
		@ unlink(Yii::getPathOfAlias('webroot').'/upload/images/book/thumb/'.$this->oldAttributes['image']);
		@ unlink(Yii::getPathOfAlias('webroot').'/upload/images/book/tiny/'.$this->oldAttributes['image']);
		@ unlink(Yii::getPathOfAlias('webroot').'/upload/images/book/big/'.$this->oldAttributes['image']);
    }
}