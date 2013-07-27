<?php
$this->breadcrumbs=array(
	Yii::t('model', 'Authors'),
);

$this->menu=array(
	array('label'=>Yii::t('admin', 'Create {model}', array('{model}'=>Yii::t('model', 'Author'))),'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('author-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('admin', 'Manage {model}', array('{model}'=>Yii::t('model', 'Author'))); ?></h1>

<p><?php echo Yii::t('admin', 'You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.'); ?></p>

<?php echo CHtml::link(Yii::t('admin', 'Advanced Search'),'#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'author-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'id',
			'type'=>'raw',
			'value'=>'CHtml::link($data->id,Yii::app()->createUrl("admin/author/view",array("id"=>$data->id)))',
		),
		'name',
		'destription',
		'created_at',
		'updated_at',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
