<?php

class CategoryController extends Controller
{
    private $_behaviorIDs = array();

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
			// array('allow',
			// 	'actions'=>array('index','view','create','update','delete','ajaxFillTree'),
			// 	'users'=>array('admin'),
			// ),
			// array('deny',  // deny all users
			// 	'users'=>array('*'),
			// ),
		);
	}

	public function behaviors()
	{
		return array(
			'jsTreeBehavior' => array(
				'class' => 'ext.jstree-behavior.behaviors.JsTreeBehavior',
				'modelClassName' => 'Category',
				'form_alias_path' => 'application.modules.admin.views.category._form',
				'view_alias_path' => 'application.modules.admin.views.category.view',
				'label_property' => 'name',
				'rel_property' => 'name'
			)
		);
	}

    public function createAction($actionID)
    {
        $action = parent::createAction($actionID);
        if ($action !== null)
            return $action;
        foreach ($this->_behaviorIDs as $behaviorID) {
            $object = $this->asa($behaviorID);
            if ($object->getEnabled() && method_exists($object, 'action' . $actionID))
                return new CInlineAction($object, $actionID);
        }
    }

    public function attachBehavior($name, $behavior)
    {
        $this->_behaviorIDs[] = $name;
        parent::attachBehavior($name, $behavior);
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
		$model=new Category;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Category']))
		{
			$model->attributes=$_POST['Category'];
			$result = false;
			if($_POST['Category']['parent_id']){
				$parent = Category::model()->findByPk($_POST['Category']['parent_id']);

				$result = $model->appendTo($parent);
			}else{
				$result = $model->saveNode();
			}

			if($result)
			{
				Yii::app()->user->setFlash('success', Yii::t('admin', 'Create succesfully'));
				$this->redirect(array('view','id'=>$model->id));
			}else{
				Yii::app()->user->setFlash('error', Yii::t('admin', 'Create failed'));
			}
		}

		if(isset($_REQUEST['parent_id'])){
			$model->parent_id = $_REQUEST['parent_id'];
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Category']))
		{
			$model->attributes=$_POST['Category'];

			if($model->saveNode())
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
		$model=new Category('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Category']))
			$model->attributes=$_GET['Category'];

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
		$model=Category::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='category-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAjaxFillTree()
    {
        // accept only AJAX request (comment this when debugging)
        if (!Yii::app()->request->isAjaxRequest) {
            exit();
        }
        // parse the user input
        $parentId = "NULL";
        if (isset($_GET['root']) && $_GET['root'] !== 'source') {
            $parentId = (int) $_GET['root'];
        }
        // read the data (this could be in a model)
        $children = Yii::app()->db->createCommand(
            "SELECT m1.id, m1.name AS text, m2.id IS NOT NULL AS hasChildren "
            . "FROM category AS m1 LEFT JOIN category AS m2 ON m1.id=m2.parent_id "
            . "WHERE m1.parent_id <=> $parentId "
            . "GROUP BY m1.id ORDER BY m1.letter_index ASC"
        )->queryAll();

        foreach ($children as $key => $child) {
        	$link = CHtml::link($child['text'], array('category/view', 'id'=>$child['id']));

			$children[$key]['text'] = $link;
        }

        $json = CTreeView::saveDataAsJson($children);

        $json = str_replace(
            '"hasChildren":"0"',
            '"hasChildren":false',
          	$json  
        );

        echo $json;
    }
}
