<?php
$this->breadcrumbs=array(
	// Yii::t('model', 'Users')=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	Yii::t('admin', 'ModifyPass'),
);
?>

<h1> <?php echo $model->username; ?> <?php echo Yii::t('admin', 'ModifyPass {model}', array('{model}'=>Yii::t('model', 'User'))); ?> </h1>

<?php echo $this->renderPartial('_form_ModifyPass',array('model'=>$model)); ?>