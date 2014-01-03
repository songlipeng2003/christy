<?php
$this->breadcrumbs=array(
	Yii::t('model', 'BookOrders')=>array('index'),
	$model->id,
);
?>

<h1><?php echo Yii::t('admin', 'View {model}', array('{model}'=>Yii::t('model', 'BookOrder'))); ?>  #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'book_id',
		'status',
		'download_times',
		'created_at',
		'updated_at',
	),
)); ?>
