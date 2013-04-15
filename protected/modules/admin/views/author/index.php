<?php
$this->breadcrumbs=array(
	'作者',
);

$this->menu=array(
	array('label'=>'创建作者','url'=>array('create')),
	array('label'=>'管理作者','url'=>array('admin')),
);
?>

<h1>作者</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
