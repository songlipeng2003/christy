<?php
$this->breadcrumbs=array(
	Yii::t('model', 'Groups')=>array('group/'),
	Yii::t('admin', 'Create'),
);

?>

<h1><?php echo Yii::t('admin', 'Create {model}', array('{model}'=>Yii::t('model', 'Group'))); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>