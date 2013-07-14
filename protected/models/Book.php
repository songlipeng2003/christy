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
 * @property string $document
 * @property string $picture
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
			array('name, author, press, isbn', 'required'),
			array('document, picture', 'required', 'on'=>'Create'),
			array('name, author, category, press, isbn, description, document, picture', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, author, category, press, isbn, description, document', 'safe', 'on'=>'search'),
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
			'id' => '编号',
			'name' => '书籍名称',
			'author' => '作者',
			'category' => '书籍分类',
			'press' => '出版社',
			'isbn' => 'ISBN编号',
			'description' => '描述',
			'document'=>'书籍文档',
			'picture'=>'书籍封面',
			'created_at'=>'创建时间',
    		'updated_at'=>'更新时间',
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
		if(!isset($this->oldAttributes['document']) || $this->document != $this->oldAttributes['document']){
			$filePath = $_SERVER['DOCUMENT_ROOT'].'/upload/tmp/'.$this->document;
			$targetPath = $_SERVER['DOCUMENT_ROOT'].'/upload/book/'.$this->document;

			copy($filePath, $targetPath);

			@ unlink($_SERVER['DOCUMENT_ROOT'].'/upload/book/'.$this->oldAttributes['document']);
		}

		if(!isset($this->oldAttributes['picture']) || $this->picture != $this->oldAttributes['picture']){
			$filePath = $_SERVER['DOCUMENT_ROOT'].'/upload/tmp/'.$this->picture;
			$targetPath = $_SERVER['DOCUMENT_ROOT'].'/upload/images/book/originals/'.$this->picture;

			copy($filePath, $targetPath);

			@ unlink($_SERVER['DOCUMENT_ROOT'].'/upload/images/book/originals/'.$this->oldAttributes['picture']);
			@ unlink($_SERVER['DOCUMENT_ROOT'].'/upload/images/book/thumb/'.$this->oldAttributes['picture']);
			@ unlink($_SERVER['DOCUMENT_ROOT'].'/upload/images/book/tiny/'.$this->oldAttributes['picture']);
			@ unlink($_SERVER['DOCUMENT_ROOT'].'/upload/images/book/big/'.$this->oldAttributes['picture']);
		}
	}

	protected function afterFind()
    {
        $this->oldAttributes = $this->getAttributes();

        return parent::afterFind();
    }

    protected function afterDelete(){
    	@ unlink($_SERVER['DOCUMENT_ROOT'].'/upload/book/'.$this->oldAttributes['document']);
    	@ unlink($_SERVER['DOCUMENT_ROOT'].'/upload/images/book/originals/'.$this->oldAttributes['picture']);
		@ unlink($_SERVER['DOCUMENT_ROOT'].'/upload/images/book/thumb/'.$this->oldAttributes['picture']);
		@ unlink($_SERVER['DOCUMENT_ROOT'].'/upload/images/book/tiny/'.$this->oldAttributes['picture']);
		@ unlink($_SERVER['DOCUMENT_ROOT'].'/upload/images/book/big/'.$this->oldAttributes['picture']);
    }
}