<?php
$this->breadcrumbs=array(
	Yii::t('model', 'Users')=>array('index'),
	Yii::t('common', 'Register'),
);

?>

<h1><?php echo Yii::t('common', 'Register'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>