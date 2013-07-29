<?php

class GroupController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/main';

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
			// array('allow',
			// 	'actions'=>array('index','view','create','update','delete'),
			// 	'users'=>array('admin'),
			// ),
			// array('deny',  // deny all users
			// 	'users'=>array('*'),
			// ),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$group = $this->loadModel($id);

		$member = Member::model()->findByAttributes(array(
			'user_id'=>Yii::app()->user->id,
			'group_id'=>$id
		));

		$topics=new Topic('search');
		if(isset($_POST['Topic'])){
			$topics->attributes=$_POST['Topic'];
		}
		
		$topics->group_id = $id;
		// $topics->sort = 'id DESC';

		$this->render('view',array(
			'group'=>$group,
			'member'=>$member,
			'topics'=>$topics
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreateTopic($id)
	{
		$model=new Topic;
		$model->group_id = $id;
		$group=$this->loadModel($id);

		if(isset($_POST['Topic']))
		{
			$model->attributes=$_POST['Topic'];
			$model->user_id = Yii::app()->user->id;
			if($model->save())
			{
				Yii::app()->user->setFlash('success', '发表成功');
				$this->redirect(array('view','id'=>$group->id));
			}else{
				Yii::app()->user->setFlash('error', '发表失败');
			}
		}

		$this->render('createTopic',array(
			'model'=>$model,
			'group'=>$group
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Group;

		if(isset($_POST['Group']))
		{
			$model->attributes=$_POST['Group'];
			$model->user_id = Yii::app()->user->id;
			if($model->save())
			{
				Yii::app()->user->setFlash('success', Yii::t('admin', 'Create succesfully'));
				$this->redirect(array('view','id'=>$model->id));
			}else{
				Yii::app()->user->setFlash('error', Yii::t('admin', 'Create failed'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		if($model->user_id!=Yii::app()->user->id){
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}

		if(isset($_POST['Group']))
		{
			$model->attributes=$_POST['Group'];

			if($model->save())
			{
				Yii::app()->user->setFlash('success', Yii::t('admin', 'Update succesfully'));
				$this->redirect(array('view','id'=>$model->id));
			}else{
				Yii::app()->user->setFlash('error', Yii::t('admin', 'Update failed'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
			{
				Yii::app()->user->setFlash('success', Yii::t('admin', 'Delete succesfully'));

				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
			}
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model=new Group('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Group']))
			$model->attributes=$_GET['Group'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Group::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='group-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
