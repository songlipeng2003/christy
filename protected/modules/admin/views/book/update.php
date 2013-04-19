<?php
$this->breadcrumbs=array(
	'Books'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'更新',
);
?>

<h1>更新 Book <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>