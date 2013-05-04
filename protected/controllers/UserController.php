<?php

class UserController extends Controller
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

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('info','register','modifyPass','update'),
				'users'=>array(Yii::app()->user->name),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Registers a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionRegister()
	{
		$model=new User('Register');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->password=md5($_POST['User']['password']);
			$model->password2=md5($_POST['User']['password2']);
			if($model->save())
			{
				Yii::app()->user->setFlash('success', Yii::t('admin', 'Register succesfully'));
				$this->redirect(array('/site/login'));
			}else{
				Yii::app()->user->setFlash('error', Yii::t('admin', 'Register failed'));
			}
		}

		$this->render('register',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel('Update');
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			
			if($model->save())
			{
				Yii::app()->user->setFlash('success', Yii::t('admin', 'Update succesfully'));
				$this->redirect(array('info'));
			}else{
				Yii::app()->user->setFlash('error', Yii::t('admin', 'Update failed'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	public function actionModifyPass()
	{
		$model=$this->loadModel('ModifyPass');
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['User']))
		{
			if(md5($_POST['User']['password3']) === $model->password)
			{
				$model->attributes=$_POST['User'];
				$model->password=md5($_POST['User']['password']);
				$model->password2=md5($_POST['User']['password2']);

				if($model->save())
				{
					Yii::app()->user->setFlash('success', Yii::t('admin', 'ModifyPass succesfully'));
					$this->redirect(array('info'));
				}else{
					Yii::app()->user->setFlash('error', Yii::t('admin', 'ModifyPass failed'));
				}
			}else{
				Yii::app()->user->setFlash('error', '<strong>原密码错误</strong>.');
			}
		}
		
		$this->render('modifyPass',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($scenario='Info')
	{
		$model=User::model()->findByAttributes(array('username'=>Yii::app()->user->name));
		$model->setScenario($scenario);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionInfo()
	{
		$model=$this->loadModel();
		$this->render('info',array(
			'model'=>$model,
		));
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
