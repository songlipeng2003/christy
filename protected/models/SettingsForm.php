<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class SettingsForm extends CFormModel
{
    public $site_name;
    public $site_description;
    public $telephone;
    public $email;
    public $about_us;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return array(
            // username and password are required
            array('site_name, site_description', 'required'),
            array('email', 'email'),
            array('telephone,about_us', 'safe'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'site_name' =>'网站名称',
            'site_description' =>'网站描述',
            'telephone' =>'联系电话',
            'email' =>'联系邮箱',
            'about_us' =>'关于我们',
        );
    }

    public function save() {
        Yii::app()->settings->set('system', $this->attributes);

        return true;
    }
}
