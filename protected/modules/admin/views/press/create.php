<?php
$this->breadcrumbs=array(
	'Presses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Press','url'=>array('index')),
	array('label'=>'Manage Press','url'=>array('admin')),
);
?>

<h1>Create Press</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>