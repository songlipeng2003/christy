<?php

class SettingsController extends Controller
{

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',
                'actions'=>array('index'),
                'users'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionIndex()
    {
        $settings = Yii::app()->settings->get('system');
        $model=new SettingsForm;
        $model->attributes=$settings;
        if(isset($_POST['SettingsForm']))
        {
            $model->attributes=$_POST['SettingsForm'];
            if($model->validate())
            {
                $model->save();

                Yii::app()->user->setFlash('success', 'Update settings successfully');
            }
        }

        $this->render('index',array(
            'model'=>$model
        ));

    }
}