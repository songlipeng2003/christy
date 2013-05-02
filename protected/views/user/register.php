<?php
$this->breadcrumbs=array(
	Yii::t('model', 'Users')=>array('index'),
	Yii::t('admin', 'Register'),
);

?>

<h1><?php echo Yii::t('admin', 'Register {model}', array('{model}'=>Yii::t('model', 'User'))); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>