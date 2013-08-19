<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $sex
 * @property string $tel
 * @property string $email
 * @property string $qq
 */
class User extends CActiveRecord
{
	public $config_password;
	public $old_password;
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
			array('username, password, config_password, email', 'required','on'=>'Register'),
			array('email', 'required','on'=>'ModifyEmail'),
			array('username, email', 'required','on'=>'Register'),
			array('password, config_password, old_password', 'required','on'=>'ModifyPass'),
			array('username, password, sex, tel, email, qq', 'length', 'max'=>255),
			array('config_password', 'compare', 'allowEmpty'=>false, 'compareAttribute'=>'password', 'message'=>'两次密码必须一致','on'=>'Register,ModifyPass'),
			array('username, email', 'unique'),
			array('username, password, email', 'required'),
			array('emailActive', 'numerical', 'integerOnly'=>true),
			array('username, password, sex, tel, email, qq', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, sex, tel, email, qq, emailActive', 'safe', 'on'=>'search'),
			array('username', 'match','pattern' => '/^[\x{4e00}-\x{9fa5},]+|[\w\s,]+$/u', 'message' => '必须为英文或汉字'),
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
			'config_password' => '确认密码',
			'old_password' => '原密码',
			'sex' => '性别',
			'tel' => '电话',
			'email' => '电子邮箱',
			'qq' => 'QQ',
			'emailActive' => '邮箱激活状态',
		);
	}

	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('qq',$this->qq,true);
		$criteria->compare('emailActive',$this->emailActive);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getAvatar($size=40)
	{
		$default = 'http://www.gravatar.com/avatar/fca897bd7fb2d58e94e5525c484e4ec9.png';

		return "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->email ) ) ) . "?s=" . $size;
	}
}