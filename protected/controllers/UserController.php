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
		if(Yii::app()->user->name!='Guest')
		{
			return array(
				array('allow',
					'actions'=>array('info','register','modifyPass','update','modifyEmail','activeEmail'),
				),
				array('deny',  // deny all users
					'users'=>array('*'),
				),
			);
		}else{
			return array(
				array('allow',
					'actions'=>array('register','activeEmailCheck'),
				),
				array('deny',  // deny all users
					'users'=>array('*'),
				),
			);
		}
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
			$model->config_password=md5($_POST['User']['config_password']);
			if($model->save())
			{
				Yii::app()->user->setFlash('success', Yii::t('common', 'Register succesfully'));
				$this->redirect(array('/site/login'));
			}else{
				Yii::app()->user->setFlash('error', Yii::t('common', 'Register failed'));
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
				Yii::app()->user->setFlash('success', Yii::t('common', 'Update succesfully'));
				$this->redirect(array('info'));
			}else{
				Yii::app()->user->setFlash('error', Yii::t('common', 'Update failed'));
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
			if(md5($_POST['User']['old_password']) === $model->password)
			{
				$model->attributes=$_POST['User'];
				$model->password=md5($_POST['User']['password']);
				$model->config_password=md5($_POST['User']['config_password']);

				if($model->save())
				{
					Yii::app()->user->setFlash('success', Yii::t('common', 'ModifyPass succesfully'));
					$this->redirect(array('info'));
				}else{
					Yii::app()->user->setFlash('error', Yii::t('common', 'ModifyPass failed'));
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

	public function actionModifyEmail()
	{
		$model=$this->loadModel('ModifyEmail');
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			
			if($model->save())
			{
				Yii::app()->user->setFlash('success', Yii::t('common', 'ModifyEmail succesfully'));
				$this->redirect(array('info'));
			}else{
				Yii::app()->user->setFlash('error', Yii::t('common', 'ModifyEmail failed'));
			}
		}

		$this->render('modifyEmail',array(
			'model'=>$model,
		));
	}

	public function actionActiveEmail()
	{
		$message = new YiiMailMessage;
		$model = $this->loadModel('ActiveEmail');

	    $message->from = Yii::app()->params['adminEmail'];    // 送信人
	    $message->addTo($model->email);               // 收信人
	    $message->setSubject("注册邮箱激活确认");
	    
	    $message->view = 'index';      // 邮件模板的文件名(不带后缀PHP)
	    $message->setBody(
	    	array('activeEmail'=>Yii::app()->request->hostInfo.'/christy/user'.'/activeEmailCheck/code/'.md5($model->password).'/username/'.$model->username),  // 传递到模板文件中的参数
	    	'text/html',                 // 邮件格式
	    	'utf-8'                      // 邮件编码
    	);
	    
		if(Yii::app()->mail->send($message)){
	    	yii::app ()->user->setFlash('successed','Successed!');
	    } else {
	    	yii::app ()->user->setFlash('failed','Failed!');
	    }
	}

	public function actionActiveEmailCheck()
	{
		if($model=User::model()->findByAttributes(array('username'=>$_GET['username'])))
		{
			if(isset($_GET['username']) and isset($_GET['code']))
			{
				if(md5($model->password)==$_GET['code'])
				{
					$model->emailActive=1;
					$model->save();
					yii::app ()->user->setFlash('successed','Successed!');
					$this->redirect(array('info'));
				}else{
					throw new CHttpException(404,'The requested page does not exist.');
				}
			}else{
				throw new CHttpException(404,'The requested page does not exist.');
			}	
		}else{
			throw new CHttpException(404,'The requested page does not exist.');
		}
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
