<?php
$this->breadcrumbs=array(
	'作者'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'更新',
);

$this->menu=array(
	array('label'=>'显示作者','url'=>array('index')),
	array('label'=>'创建作者','url'=>array('create')),
	array('label'=>'查看作者','url'=>array('view','id'=>$model->id)),
	array('label'=>'管理作者','url'=>array('admin')),
);
?>

<h1>更新作者 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>