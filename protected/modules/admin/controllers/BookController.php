<?php

class BookController extends Controller
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
				'actions'=>array('index','view','create','update','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Book;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Book']))
		{
			$model->attributes=$_POST['Book'];
			if($this->upload($model,'document'))
			{
				if($model->save())
				{
					Yii::app()->user->setFlash('success', Yii::t('admin', 'Create succesfully'));
					$this->redirect(array('view','id'=>$model->id));
				}else{
					Yii::app()->user->setFlash('error', Yii::t('admin', 'Create failed'));
				}
			}else{
				Yii::app()->user->setFlash('error', Yii::t('admin', 'Upload failed'));
			}
			
		}

		$info = $this->GetInfo();

		$this->render('create',array(
			'model'=>$model,
			'authors'=>$info['authors'],
			'categories'=>$info['categories'], 
			'presses'=>$info['presses'],
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Book']))
		{
			$model->attributes=$_POST['Book'];
			if($this->upload($model,'document'))
			{
				if($model->save())
				{
					Yii::app()->user->setFlash('success', Yii::t('admin', 'Update succesfully'));
					$this->redirect(array('view','id'=>$model->id));
				}else{
					Yii::app()->user->setFlash('error', Yii::t('admin', 'Update failed'));
				}
			}else{
				Yii::app()->user->setFlash('error', Yii::t('admin', 'Upload failed'));
			}
			
		}

		$info = $this->GetInfo();

		$this->render('create',array(
			'model'=>$model,
			'authors'=>$info['authors'],
			'categories'=>$info['categories'], 
			'presses'=>$info['presses'],
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
		$model=new Book('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Book']))
			$model->attributes=$_GET['Book'];

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
		$model=Book::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='book-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	protected function GetInfo()
	{
		$author = array_map(function($record) {return $record->attributes;},Author::model()->findAll());
		$category = array_map(function($record) {return $record->attributes;},Category::model()->findAll());
		$press = array_map(function($record) {return $record->attributes;},Press::model()->findAll());
		foreach ($author as $key => $value) {
			$authors[$value['name']]=$value['name']; 
		}
		foreach ($category as $key => $value) {
			$categories[$value['name']]=$value['name'];
		}
		foreach ($press as $key => $value) {
			$presses[$value['name']]=$value['name'];
		}
		return array('authors'=>$authors,'categories'=>$categories,'presses'=>$presses);
	} 
	protected function upload($model,$document)
	{
		$file=CUploadedFile::getInstance($model,$document);//获取表单名为$document的上传信息
		$filename=$file->getName();//获取文件名
		//$filesize=$file->getSize();//获取文件大小
		//$filetype=$file->getType();//获取文件类型
		$model->$document=time().'_'.$filename;//数据库中要存放文件名
		$uploadfile="./assets/upload/".$model->$document;
		return $file->saveAs($uploadfile,true);//上传操作
	}
}
