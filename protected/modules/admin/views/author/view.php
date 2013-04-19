<?php
$this->breadcrumbs=array(
	'作者'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'更新作者','url'=>array('update','id'=>$model->id)),
	array('label'=>'删除作者','url'=>'#','htmlOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'你确定删除吗?')),
);
?>

<h1>查看作者 #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'destription',
	),
)); ?>
