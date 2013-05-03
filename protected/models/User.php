<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $user_sex
 * @property string $user_tel
 * @property string $user_email
 * @property string $user_qq
 */
class User extends CActiveRecord
{
	public $password2;
	public $password3;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, password2, user_email', 'required','on'=>'Register'),
			array('user_email', 'required','on'=>'Update'),
			array('password, password2, password3', 'required','on'=>'ModifyPass'),
			array('username, password, user_sex, user_tel, user_email, user_qq', 'length', 'max'=>255),
			array('password2', 'compare', 'allowEmpty'=>false, 'compareAttribute'=>'password', 'message'=>'两次密码必须一致','on'=>'Register,ModifyPass'),
			array('username', 'unique'),
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
			'id' => 'ID',
			'username' => '用户名',
			'password' => '密码',
			'password2' => '再次输入密码',
			'password3' => '原密码',
			'user_sex' => '性别',
			'user_tel' => '电话',
			'user_email' => '电子邮箱',
			'user_qq' => 'QQ',
		);
	}
}