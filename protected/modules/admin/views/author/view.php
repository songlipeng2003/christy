<?php
$this->breadcrumbs=array(
	'作者'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'查看作者','url'=>array('index')),
	array('label'=>'创建作者','url'=>array('create')),
	array('label'=>'更新作者','url'=>array('update','id'=>$model->id)),
	array('label'=>'删除作者','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理作者','url'=>array('admin')),
);
?>

<h1>View Author #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'destription',
	),
)); ?>
