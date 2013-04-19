<?php
$this->breadcrumbs=array(
	'作者'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'更新',
);
?>

<h1>更新作者 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>