<?php
$this->breadcrumbs=array(
	Yii::t('model', 'Docs')=>array('index'),
	Yii::t('admin', 'Create'),
);

?>

<h1><?php echo Yii::t('admin', 'Create {model}', array('{model}'=>Yii::t('model', 'Doc'))); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>