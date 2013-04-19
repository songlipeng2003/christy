<?php
$this->breadcrumbs=array(
	'Presses'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Press','url'=>array('index')),
	array('label'=>'Create Press','url'=>array('create')),
	array('label'=>'View Press','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Press','url'=>array('admin')),
);
?>

<h1>Update Press <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>