<?php
$this->breadcrumbs=array(
	Yii::t('model', 'Categories'),
);

$this->menu=array(
	array('label'=>Yii::t('admin', 'Create {model}', array('{model}'=>Yii::t('model', 'Category'))),'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('category-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<style type="text/css">
.grid-view .button-column{
	width: 60px;
}
</style>

<h1><?php echo Yii::t('admin', 'Create {model}', array('{model}'=>Yii::t('model', 'Category'))); ?></h1>

<p><?php echo Yii::t('admin', 'You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.'); ?></p>

<?php echo CHtml::link(Yii::t('admin', 'Advanced Search'),'#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'id',
			'type'=>'raw',
			'value'=>'CHtml::link($data->id,Yii::app()->createUrl("admin/category/view",array("id"=>$data->id)))',
		),
		'name',
		array(
			'name'=>'parent_id',
			'type'=>'raw',
			'value'=>'$data->parent()?CHtml::link($data->parent()->name, Yii::app()->createUrl("admin/category/view",array("id"=>$data->parent()->primaryKey))):""',
		),
		'created_at',
		'updated_at',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{add}{view}{update}{delete}',
            'buttons'=>array(
            	'add'=>array(
				    'label'=>'添加子类',     //Text label of the button.
				    'icon'=>'icon-plus',
				    'url'=>'Yii::app()->controller->createUrl("/admin/category/create", array("parent_id"=>$data->id))',
				    // 'imageUrl'=>'...',  //Image URL of the button.
				    // 'options'=>array(), //HTML options for the button tag.
				    // 'click'=>'...',     //A JS function to be invoked when the button is clicked.
				    // 'visible'=>'...',   //A PHP expression for determining whether the button is 
            	)
            ),
		),
	),
));?>
