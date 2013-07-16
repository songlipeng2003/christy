<?php

class ConfigController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

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
		if($_POST!=null){
			foreach ($_POST as $key => $value) {
				$record_update=$this->loadModel(array('key'=>$key));
				$record_update->value=$value;
				if($record_update->save())
				{
					Yii::app()->user->setFlash('success', Yii::t('admin', 'Update succesfully'));
				}else{
					Yii::app()->user->setFlash('error', Yii::t('admin', 'Update failed'));
				}
			}
		}
		$model=new Config;
		$record=$model->findAll();
		foreach ($record as $config) {
            $configs[$config->attributes['key']] = $config->attributes['value'];
        }
		$this->render('index',array(
			'model'=>$model,
			'configs'=>$configs,
		));
	}

	public function loadModel($params)
	{
		$model=Config::model()->findByAttributes($params);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}