<?php
$this->breadcrumbs=array(
	Yii::t('model', 'Users')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	Yii::t('admin', 'Modify_pass'),
);
?>

<h1><?php echo Yii::t('admin', 'Modify_pass {model}', array('{model}'=>Yii::t('model', 'User'))); ?>  <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form_ModifyPass',array('model'=>$model)); ?>