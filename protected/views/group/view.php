<?php
$this->breadcrumbs=array(
	Yii::t('model', 'Groups')=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('admin', 'Update {model}', array('{model}'=>Yii::t('model', 'Group'))),'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('admin', 'Delete {model}', array('{model}'=>Yii::t('model', 'Group'))),'url'=>'#','htmlOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('admin', 'Are you sure you want to delete this item?'))),
);
?>

<h1><?php echo Yii::t('admin', 'View {model}', array('{model}'=>Yii::t('model', 'Group'))); ?>  #<?php echo $model->id; ?></h1>

<?php if($model->user_id==Yii::app()->user->id){ ?>
<?php echo CHtml::link(Yii::t('admin', 'Update {model}', array('{model}'=>Yii::t('model', 'Group'))), array('group/update', 'id'=>$model->id)); ?>
<?php } ?>


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'summary',
	),
)); ?>
