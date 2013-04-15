<?php
$this->breadcrumbs=array(
	'作者'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'显示作者','url'=>array('index')),
	array('label'=>'管理作者','url'=>array('admin')),
);
?>

<h1>创建作者</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>