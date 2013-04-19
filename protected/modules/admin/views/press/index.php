<?php
$this->breadcrumbs=array(
	'Presses',
);

$this->menu=array(
	array('label'=>'Create Press','url'=>array('create')),
	array('label'=>'Manage Press','url'=>array('admin')),
);
?>

<h1>Presses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
