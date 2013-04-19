<?php
$this->breadcrumbs=array(
	'Books'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'更新 Book','url'=>array('update','id'=>$model->id)),
	array('label'=>'删除 Book','url'=>'#','htmlOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'你确定删除吗?')),
);
?>

<h1>查看 Book #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'author',
		'category',
		'prss',
		'isbn',
		'destription',
	),
)); ?>
